<?php

namespace App\Http\Controllers;

use App\Models\Design;

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

public function mostrarDatos(){
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

        return redirect()->back()->with('success', 'Producto eliminado del carrito correctamente.');
    }

    public function vaciarCarrito()
    {
        // Vaciar completamente el carrito eliminando la variable de sesión
        session()->forget('carrito');

        return redirect()->back();
    }

    public function finalizarReserva(Request $request)
    {
        $datosCarrito = $this->mostrarDatos();

        $fecha = $request->input('hora');
        $hora  = $request->input('fecha');
        // Obtener el carrito de la sesión


        // Inicializar una variable para almacenar los datos de la cita
        $datosCita = [];

        // Agregar los datos del formulario al array de datos de la cita
        $datosCita['fecha'] = $fecha;
        $datosCita['hora']  = $hora;

        // Inicializar un array para almacenar la información de los productos en arrito junto con el precio total del carrito

        return view('finalizarReserva', compact('datosCarrito', 'datosCita'));
    }

}
