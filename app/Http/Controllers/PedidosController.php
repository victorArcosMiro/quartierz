<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoDesignCantidad;
use App\Models\PedidosPorTelefono;

class PedidosController extends Controller
{
    /**
     * Actualiza los detalles del pedido y la cita en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizarPedido(Request $request, $id)
    {
        // Validar los datos recibidos si es necesario

        // Buscar el pedido por su ID
        $pedido = Pedido::find($id);

        // Actualizar los detalles del pedido
        $detallesPedido = $request->input('detallesPedido');

        if ($detallesPedido) {
            foreach ($detallesPedido as $idDetalle => $detalle) {
                // Buscar el detalle del pedido por su ID
                $detallePedido = PedidoDesignCantidad::find($idDetalle);

                if ($detallePedido) {
                    // Actualizar la cantidad del detalle del pedido
                    $detallePedido->cantidad = $detalle['cantidad'];
                    $detallePedido->save();
                }
            }
        }

        // Redireccionar a la vista de detalles del pedido actualizado
        return redirect()->route('detalle-pedido-editar', ['id' => $pedido->id]);
    }

    public function actualizarEstado(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'estado_id' => 'required|exists:estados_pedido,id',
        ]);

        $pedido = Pedido::findOrFail($request->pedido_id);
        $pedido->estado_pedido_id = $request->estado_id;
        $pedido->save();

        return redirect()->back();
    }
    public function actualizarEstadoTlf(Request $request)
    {
        // Validar los datos recibidos en la solicitud
        $request->validate([
            'pedido_tlf_id' => 'required|exists:pedido,id',
            'estado_id' => 'required|exists:estados_pedido,id',
        ]);

        // Encontrar el pedido telefónico por su ID
        $pedidoTlf = PedidosPorTelefono::findOrFail($request->pedido_tlf_id);

        // Actualizar el estado del pedido telefónico
        $pedidoTlf->estado_pedido_id = $request->estado_id;
        $pedidoTlf->save();

        // Redirigir de vuelta a la página anterior
        return redirect()->back();
    }
    public function actualizarPedidoTlf(Request $request, $id)
    {
        $pedido_tlf = PedidosPorTelefono::findOrFail($id);
        $pedido_tlf->cita = $request->input('fecha_cita');
        $pedido_tlf->save();

        $detallesPedido = $request->input('detallesPedido');

        foreach ($detallesPedido as $detalleData) {
            $detalle = PedidoDesignCantidad::findOrFail($detalleData['id']);
            $detalle->cantidad = $request->input('cantidad')[$detalleData['id']];
            $detalle->save();
        }

        return redirect()->route('detalle-pedido-tlf', ['id' => $id])->with('success', 'Pedido actualizado correctamente');
    }
}
