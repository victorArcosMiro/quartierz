<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoDesignCantidad;

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
        // Lógica de validación de datos recibidos

        // Actualizar el pedido en la base de datos
        $pedido = Pedido::find($id);
        $pedido->cita = $request->input('fecha_cita');
        $pedido->save();

        // Actualizar los detalles del pedido en la base de datos
        $detallesPedido = $request->input('detallesPedido');
        if ($detallesPedido) {
            foreach ($detallesPedido as $idDetalle => $detalle) {
                $detallePedido = PedidoDesignCantidad::find($idDetalle);
                if ($detallePedido) {
                    $detallePedido->cantidad = $detalle['cantidad'];
                    // Actualizar otros campos del detalle del pedido según sea necesario
                    $detallePedido->save();
                }
            }
        }

        // Redireccionar a una vista de confirmación o a la página de detalles del pedido actualizado
        return redirect()->route('detalle-pedido-editar', ['id' => $pedido->id]);
    }
}
