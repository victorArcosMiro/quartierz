<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoDesignCantidad;
use App\Models\PedidosPorTelefono;
use App\Models\Design;

class PedidosController extends Controller
{
    /**
     * Actualiza los detalles del pedido y la cita en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function mostrarDetallesPedidoEditar(Request $request, $pedidoId)
{
    // Validar la solicitud
    $request->validate([
        'fecha'      => 'required|date',
        'hora'       => 'required',
        'diseno_*'   => 'required|string',
        'material_*' => 'required|string',
        'cantidad_*' => 'required|integer',
    ]);

    // Obtener el pedido
    $pedido = Pedido::find($pedidoId);

    // Actualizar la fecha y la hora de la cita
    $pedido->cita = $request->input('fecha') . ' ' . $request->input('hora');
    $pedido->save();

    // Inicializar el precio total
    $precioTotal = 0;

    // Recorrer los detalles del pedido y actualizar el design_id
    foreach ($pedido->detalles as $detalle) {
        $nPiezas    = $request->input('diseno_' . $detalle->id);
        $materialId = $request->input('material_' . $detalle->id);
        $cantidad = $request->input('cantidad_' . $detalle->id);

        // Calcular el design_id
        $design = Design::where('n_piezas', $nPiezas)
                        ->where('material_id', $materialId)
                        ->first();

        if ($design) {
            $detalle->design_id = $design->id;
            $detalle->material_id = $materialId;
            $detalle->precio = $design->precio * $cantidad; // Calcular el precio basado en la cantidad
            $detalle->cantidad = $cantidad;
            $detalle->save();

            // Sumar el precio del detalle al precio total
            $precioTotal += $detalle->precio;
        }
    }

    // Manejar nuevos detalles
    $nuevosDiseños = $request->input('diseno_nuevo', []);
    $nuevosMateriales = $request->input('material_nuevo', []);
    $nuevasCantidades = $request->input('cantidad_nuevo', []);

    for ($i = 0; $i < count($nuevosDiseños); $i++) {
        $nPiezas = $nuevosDiseños[$i];
        $materialId = $nuevosMateriales[$i];
        $cantidad = $nuevasCantidades[$i];

        // Calcular el design_id para el nuevo detalle
        $design = Design::where('n_piezas', $nPiezas)
                        ->where('material_id', $materialId)
                        ->first();

        if ($design) {
            $nuevoDetalle = new PedidoDesignCantidad();
            $nuevoDetalle->pedido_id = $pedido->id;
            $nuevoDetalle->design_id = $design->id;
            $nuevoDetalle->material_id = $materialId;
            $nuevoDetalle->precio = $design->precio * $cantidad;
            $nuevoDetalle->cantidad = $cantidad;
            $nuevoDetalle->save();

            // Sumar el precio del nuevo detalle al precio total
            $precioTotal += $nuevoDetalle->precio;
        }
    }

    // Actualizar la cantidad_total del pedido
    $pedido->cantidad_total = $precioTotal;
    $pedido->save();

    // Recargar los datos del pedido y sus detalles
    $pedido = Pedido::with(['user', 'estado'])
                    ->where('id', $pedido->id)
                    ->firstOrFail();

    // Obtener los detalles actualizados del pedido
    $detallesPedido = PedidoDesignCantidad::with(['design', 'material'])
                        ->where('pedido_id', $pedido->id)
                        ->where('pedido_tlf', false)
                        ->get();

    // Retornar la vista con los datos actualizados
    return response()->view('detalle-pedido', compact('pedido', 'detallesPedido', 'precioTotal'));
}

public function actualizarPedidoTlf(Request $request, $id)
{
    // Validar los datos del formulario si es necesario
    $fecha = $request->input('fecha');
    $hora = $request->input('hora');
    $fechaYhora = $fecha . ' ' . $hora;

    // Actualizar los datos del pedido telefónico
    $pedidoTelefono = PedidosPorTelefono::findOrFail($id);
    $pedidoTelefono->nombre = $request->input('nombre');
    $pedidoTelefono->apellidos = $request->input('apellidos');
    $pedidoTelefono->telefono = $request->input('telefono');
    $pedidoTelefono->cita = $fechaYhora;
    $pedidoTelefono->save();

    // Actualizar los detalles del pedido
    $detallesId = $request->input('detalle_id');
    $disenos = $request->input('diseno');
    $materiales = $request->input('material');
    $cantidades = $request->input('cantidad');

    for ($i = 0; $i < count($detallesId); $i++) {
        $detallePedido = PedidoDesignCantidad::findOrFail($detallesId[$i]);
        $detallePedido->design_id = $disenos[$i];
        $detallePedido->material_id = $materiales[$i];
        $detallePedido->cantidad = $cantidades[$i];
        $detallePedido->save();
    }

    return redirect()->back();
}


    public function actualizarEstado(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'estado_id' => 'required|exists:estados_pedido,id',
        ]);

        $pedido                   = Pedido::findOrFail($request->pedido_id);
        $pedido->estado_pedido_id = $request->estado_id;
        $pedido->save();

        return redirect()->back();
    }
    public function actualizarEstadoTlf(Request $request)
    {
        // Validar los datos recibidos en la solicitud
        $request->validate([
            'pedido_tlf_id' => 'required|exists:pedido,id',
            'estado_id'     => 'required|exists:estados_pedido,id',
        ]);

        // Encontrar el pedido telefónico por su ID
        $pedidoTlf = PedidosPorTelefono::findOrFail($request->pedido_tlf_id);

        // Actualizar el estado del pedido telefónico
        $pedidoTlf->estado_pedido_id = $request->estado_id;
        $pedidoTlf->save();

        // Redirigir de vuelta a la página anterior
        return redirect()->back();
    }


}
