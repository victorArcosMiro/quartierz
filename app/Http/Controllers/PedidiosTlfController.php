<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\PedidoDesignCantidad;
use App\Models\PedidosPorTelefono;
use App\Models\Pedido;
use Carbon\Carbon;

class PedidiosTlfController extends Controller
{
    public function addProductoTlf(Request $request)
    {
        $material = $request->input('material');
        $npiezas  = $request->input('npiezas');

        // Buscar el diseño que coincida con el material y el número de piezas
        $design = DB::table('design')
                    ->where('material_id', $material)
                    ->where('n_piezas', $npiezas)
                    ->first();

        if ($design) {
            $id = $design->id;

            // Obtener la variable de sesión existente o inicializarla si no existe
            $designIds = session()->get('design_ids', []);

            // Añadir el nuevo id al array
            $designIds[] = $id;

            // Guardar el array actualizado en la sesión
            session(['design_ids' => $designIds]);

            return view('pedido-telefono', ['design' => $design]);
        }
        // Manejar el caso donde no se encuentra el diseño
        return redirect()->route('pedido-telefono');

    }

    public function eliminarProductoTlf(Request $request)
    {
        // Obtener la variable de sesión existente o inicializarla si no existe
        $designIds = session()->get('design_ids', []);

        // Eliminar el último id del array si existe
        if (!empty($designIds)) {
            array_pop($designIds);
            session(['design_ids' => $designIds]);
        }

        // Redirigir de vuelta a la vista
        return redirect()->route('pedido-telefono');
    }

    public function vaciarProductosTlf()
    {
        // Vaciar la variable de sesión
        session()->forget('design_ids');

        // Redirigir de vuelta a la vista
        return redirect()->route('pedido-telefono');
    }

    public function guardarPedido(Request $request)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono'  => 'required|numeric',
            'fecha'     => 'required|date',
            'hora'      => 'required|string',
        ]);
       // Verificar disponibilidad de día y hora
    $fechaHora = Carbon::parse($request->fecha . ' ' . $request->hora);

    // Verificar si ya existe un pedido para la misma fecha y hora
    $pedidoExistente = Pedido::where('cita', $fechaHora)->exists();
    $pedidoExistenteTlf = PedidosPorTelefono::where('cita', $fechaHora)->exists();

    // Si ya existe un pedido para la misma fecha y hora, retornar con un mensaje de error
    if ($pedidoExistente || $pedidoExistenteTlf) {
        return back()->with('error', 'Ya hay un pedido registrado para la misma fecha y hora.');
    }

    // Verificar si la fecha es anterior a la fecha actual o es el mismo día actual
    $fechaActual = Carbon::now();
    if ($fechaHora->isPast() || $fechaHora->isSameDay($fechaActual)) {
        return back()->withErrors(['error' => 'La fecha del pedido no puede ser un día pasado o el mismo día actual.']);
    }

        // Obtener los IDs de diseño de la sesión
        $designIds = session('design_ids', []);

        if (count($designIds) === 0) {
            return back()->withErrors(['error' => 'No hay diseños en el carrito.']);
        }

        // Crear la cita combinando fecha y hora
        $cita = Carbon::parse($request->fecha . ' ' . $request->hora);

        // Crear el pedido en la base de datos
        $pedido = PedidosPorTelefono::create([
            'nombre'           => $request->nombre,
            'apellidos'        => $request->apellidos,
            'telefono'         => $request->telefono,
            'cita'             => $cita,
            'estado_pedido_id' => 1, // Asumiendo que el estado inicial es 1
            'precio_total'     => 0, // Se calculará más adelante
        ]);

        $precioTotal = 0;

        // Calcular la cantidad de cada diseño y el precio total
        $designCount = array_count_values($designIds);

        foreach ($designCount as $designId => $cantidad) {
            $design = DB::table('design')->find($designId);
            if ($design) {
                $precio = $design->precio * $cantidad;

                // Crear la entrada en PedidoDesignCantidad
                PedidoDesignCantidad::create([
                    'pedido_id'   => $pedido->id,
                    'material_id' => $design->material_id,
                    'design_id'   => $designId,
                    'pedido_tlf'  => true,
                    'cantidad'    => $cantidad,
                    'precio'      => $precio,
                ]);

                $precioTotal += $precio;
            }
        }

        // Actualizar el precio total del pedido
        $pedido->update(['precio_total' => $precioTotal]);

        // Limpiar los IDs de diseño de la sesión
        session()->forget('design_ids');

        // Redirigir al historial de pedidos
        return redirect()->route('historial-pedidos');
    }

}
