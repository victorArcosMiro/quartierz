<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidosController extends Controller
{
    /**
     * Confirma la reserva de la cita y guarda los detalles del pedido.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmarReserva(Request $request)
    {
        // Obtener los datos del carrito y la cita del request
        $datosCarrito = $request->session()->get('datosCarrito');
        $datosCita = $request->session()->get('datosCita');

        // Crear un nuevo pedido con los datos obtenidos
        $pedido = new Pedido();
        $pedido->users_id = auth()->id(); // ID del usuario autenticado
        // Supongamos que el material y el diseño siempre son los mismos para todos los productos en el carrito
        $pedido->material_id = 1; // ID del material
        $pedido->design_id = 1; // ID del diseño
        $pedido->cita = $datosCita['fecha'] . ' ' . $datosCita['hora']; // Combinar la fecha y la hora de la cita
        // Calcular la cantidad total de productos en el carrito
        $pedido->cantidad = collect($datosCarrito['productosCarrito'])->sum('cantidad');
        $pedido->precio_total = $datosCarrito['precioTotalCarrito']; // Precio total del carrito
        $pedido->save(); // Guardar el pedido en la base de datos

        // También puedes insertar los productos individuales del carrito como registros relacionados en otra tabla si es necesario

        // Redireccionar o retornar la respuesta según sea necesario
        return redirect()->route('ruta_de_redireccion');
    }
}
