<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Pedido;
use App\Models\PedidoDesignCantidad;

use App\Models\PedidosPorTelefono;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregarProducto(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Obtener el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

        // Agregar el producto al carrito
        $carrito[$productoId] = isset($carrito[$productoId]) ? $carrito[$productoId] + 1 : 1;

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito correctamente.');
    }

    public function mostrarCarrito()
    {
        // Llamar a la función mostrarDatos() y asignar su resultado a una variable
        $datosCarrito = $this->mostrarDatos();

        // Pasar la información a la vista del carrito junto con el precio total del carrito
        return view('carrito', $datosCarrito);
    }

    public function mostrarDatos()
    {
        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);

        // Inicializar un array para almacenar la información de los productos en el carrito
        $productosCarrito = [];

        // Inicializar el precio total del carrito
        $precioTotalCarrito = 0;

        // Recorrer cada elemento del carrito
        foreach ($carrito as $productoId => $cantidad) {
            // Obtener el producto de la tabla Design utilizando su ID
            $producto = Design::findOrFail($productoId);

            // Calcular el precio total del producto (precio por cantidad)
            $precioTotalProducto = $producto->precio * $cantidad;

            // Agregar la información del producto al array de productos del carrito
            $productosCarrito[] = [
                'id'              => $producto->id,
                'nombre'          => $producto->nombre,
                'nombre_material' => $producto->nombre_material,
                'imagen'          => $producto->imagen_design,
                'precio'          => $producto->precio,
                'cantidad'        => $cantidad,
                'precioTotal'     => $precioTotalProducto,
            ];

            // Sumar el precio total del producto al precio total del carrito
            $precioTotalCarrito += $precioTotalProducto;
        }

        // Devolver un array asociativo con los datos del carrito
        return compact('productosCarrito', 'precioTotalCarrito');
    }

    public function aumentarCantidad(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Obtener el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

        // Aumentar la cantidad del producto en 1
        if (isset($carrito[$productoId])) {
            $carrito[$productoId]++;
        }

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        return redirect()->back();
    }

    public function disminuirCantidad(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Obtener el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

        // Disminuir la cantidad del producto en 1
        if (isset($carrito[$productoId]) && $carrito[$productoId] > 1) {
            $carrito[$productoId]--;
        } elseif (isset($carrito[$productoId]) && $carrito[$productoId] == 1) {
            // Si la cantidad es 1, eliminar el producto del carrito
            unset($carrito[$productoId]);
        }

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        return redirect()->back();
    }

    public function eliminarFilaCarrito(Request $request)
    {
        $productoId = $request->input('producto_id');

        // Obtener el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

        // Si la cantidad es 1, eliminar el producto del carrito
        if (isset($carrito[$productoId]) && $carrito[$productoId] >= 1) {
            unset($carrito[$productoId]);
        }

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        return redirect()->back();
    }

    public function vaciarCarrito()
    {
        // Vaciar completamente el carrito eliminando la variable de sesión
        session()->forget('carrito');

        return redirect()->back();
    }

    public function finalizarReserva(Request $request)
    {
        if (!auth()->check()) {
            // Redirigir a la vista de login si el usuario no está autenticado
            return redirect()->route('login');
        }

        // Obtener la fecha y hora del request
        $fechaHora = $request->input('fecha') . ' ' . $request->input('hora');

        // Verificar si ya existe un pedido para la misma fecha y hora
        $pedidoExistente = Pedido::where('cita', $fechaHora)->exists();
        $pedidoExistenteTlf = PedidosPorTelefono::where('cita', $fechaHora)->exists();

        // Si ya existe un pedido para la misma fecha y hora, retornar con un mensaje de error
        if ($pedidoExistente || $pedidoExistenteTlf) {
            return back()->with('error', 'Hora no disponible!');;
        }

        // Obtener el ID del usuario autenticado
        $userId = auth()->id();

        // Crear un nuevo registro en la tabla 'pedidos'
        $pedido = new Pedido();
        $pedido->user_id = $userId;
        $pedido->cita = $fechaHora;
        $pedido->estado_pedido_id = 1;
        $pedido->cantidad_total = $request->input('precioTotalCarrito');
        // Guardar el pedido para obtener su ID
        $pedido->save();

        // Obtener el ID del pedido recién creado
        $pedidoId = $pedido->id;
        // Obtener los datos del carrito de la sesión
        $datosCarrito = $this->mostrarDatos();
        // Inicializar la cantidad total del pedido
        // Iterar sobre los productos del carrito y crear un nuevo registro en la tabla 'pedido_design_cantidad' para cada producto
        foreach ($datosCarrito['productosCarrito'] as $producto) {
            // Crear un nuevo registro en la tabla 'pedido_design_cantidad'
            $pedidoDesignCantidad = new PedidoDesignCantidad();
            $pedidoDesignCantidad->pedido_id = $pedidoId;
            $pedidoDesignCantidad->design_id = $producto['id']; // Supongamos que 'id' es el ID del diseño del producto
            $pedidoDesignCantidad->cantidad = $producto['cantidad'];

            // Obtener el precio del diseño en función de su design_id
            $design = Design::find($producto['id']);

            // Obtener el material_id del diseño
            $materialId = $design->material_id;
            $pedidoDesignCantidad->material_id = $materialId;

            // Guardar el registro en la tabla 'pedido_design_cantidad'
            $pedidoDesignCantidad->precio = $design->precio;

            $pedidoDesignCantidad->save();
        }
        // Crear un array con los datos de la cita para pasarlos a la vista
        $datosCita = [
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
        ];

        // Retornar la vista finalizarReserva con los datos del carrito y la cita
        return view('finalizarReserva', compact('datosCarrito', 'datosCita'));
    }


}
