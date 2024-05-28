<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidosPorTelefono;
use App\Models\PedidoDesignCantidad;
use Illuminate\Http\Request;

class FiltrosPedidosController extends Controller
{
    public function historialPedidos()
    {
        // Obtener pedidos con las relaciones user y estado
        $pedidos = Pedido::with(['user', 'estado'])
            ->orderBy('id', 'asc')
            ->get();
        // Devolver la vista con los datos necesarios
        return view('dashboard', compact('pedidos'));
    }

    public function historialPedidosTlf()
    {
        // Obtener pedidos por teléfono con la relación estado
        $pedidos_tlf = PedidosPorTelefono::with(['estado'])
            ->orderBy('id', 'asc')
            ->get();
        // Devolver la vista con los datos necesarios
        return view('historial-pedidos-tlf', compact('pedidos_tlf'));
    }

    public function mostrarDetallesPedido($id)
    {
        $pedido = Pedido::with(['user', 'estado'])
            ->where('id', $id)
            ->firstOrFail();

        $detallesPedido = PedidoDesignCantidad::with(['design', 'material'])
            ->where('pedido_id', $id)
            ->where('pedido_tlf', false)
            ->get();

        $precioTotal = $detallesPedido->sum('precio');

        return view('detalle-pedido', compact('pedido', 'detallesPedido', 'precioTotal'));
    }
    // Método en el controlador para mostrar los detalles de un pedido por teléfono
    public function mostrarDetallesPedidoTlf($id)
    {
        $pedido_tlf = PedidosPorTelefono::with(['estado'])
            ->where('id', $id)
            ->firstOrFail();

        $detallesPedido = PedidoDesignCantidad::with(['design', 'material'])
            ->where('pedido_id', $id)
            ->where('pedido_tlf', true)
            ->get();

        $precioTotal = $detallesPedido->sum('precio');

        return view('detalle-pedido-tlf', compact('pedido_tlf', 'detallesPedido', 'precioTotal'));
    }

    public function mostrarDetallesPedidoEditar($id)
    {
        $pedido = Pedido::with(['user', 'estado'])
            ->where('id', $id)
            ->firstOrFail();

        $detallesPedido = PedidoDesignCantidad::with(['design', 'material'])
            ->where('pedido_id', $id)
            ->where('pedido_tlf', false)
            ->get();

        $precioTotal = $detallesPedido->sum('precio');

        return view('detalle-pedido-editar', compact('pedido', 'detallesPedido', 'precioTotal'));
    }

    public function mostrarDetallesPedidoTlfEditar($id)
    {
        $pedido_tlf = Pedido::with(['estado'])
            ->where('id', $id)
            ->firstOrFail();

        $detallesPedido = PedidoDesignCantidad::with(['design', 'material'])
            ->where('pedido_id', $id)
            ->where('pedido_tlf', false)
            ->get();

        $precioTotal = $detallesPedido->sum('precio');

        return view('detalle-pedido-tlf-editar', compact('pedido_tlf', 'detallesPedido', 'precioTotal'));
    }

    public function mostrarPedidosFiltrados(Request $request)
    {
        $request->validate([
            'opciones'   => 'required',
            'inputField' => 'required',
        ]);

        $opcion = $request->input('opciones');
        $valor  = $request->input('inputField');

        $query = Pedido::with(['user', 'estado']); // Precargar la relación 'estado'

        // Aplicar el filtro según la opción seleccionada
        switch ($opcion) {
            case 'fecha':
                // Asumimos que el valor será un rango de fechas en el formato 'yyyy-mm-dd,yyyy-mm-dd'
                $fechas = explode(',', $valor);
                $fechaInicio = $fechas[0];
                $fechaFin = $fechas[1];
                $query->whereBetween('cita', [$fechaInicio, $fechaFin]);
                break;
            case 'nombre':
                $query->whereHas('user', function ($q) use ($valor) {
                    $q->where('name', 'like', '%' . $valor . '%');
                });
                break;
            case 'apellido':
                $query->whereHas('user', function ($q) use ($valor) {
                    $q->where('surname', 'like', '%' . $valor . '%');
                });
                break;
            case 'id':
                $query->where('id', $valor);
                break;
            case 'telefono':
                $query->whereHas('user', function ($q) use ($valor) {
                    $q->where('phone', 'like', '%' . $valor . '%');
                });
                break;
            case 'email':
                $query->whereHas('user', function ($q) use ($valor) {
                    $q->where('email', 'like', '%' . $valor . '%');
                });
                break;
            case 'estado':
                $query->whereHas('estado', function ($q) use ($valor) {
                    $q->where('id', $valor);
                });
                break;
        }

        $pedidos = $query->get();

        return view('dashboard', compact('pedidos'));
    }

    public function mostrarPedidosTlfFiltrados(Request $request)
    {
        $request->validate([
            'opciones'   => 'required',
            'inputField' => 'required',
        ]);

        $opcion = $request->input('opciones');
        $valor  = $request->input('inputField');

        $query = PedidosPorTelefono::with(['estado']); // Precargar la relación 'estadoPedido'

        // Aplicar el filtro según la opción seleccionada
        switch ($opcion) {
            case 'fecha':
                $fechas = explode(',', $valor);
                if (count($fechas) == 2) {
                    $query->whereBetween('cita', [$fechas[0], $fechas[1]]);
                } else {
                    $query->whereDate('cita', $valor);
                }
                break;
            case 'nombre':
                $query->where('nombre', 'like', '%' . $valor . '%');
                break;
            case 'apellido':
                $query->where('apellidos', 'like', '%' . $valor . '%');
                break;
            case 'id':
                $query->where('id', $valor);
                break;
            case 'telefono':
                $query->where('telefono', 'like', '%' . $valor . '%');
                break;
            case 'estado':
                $query->whereHas('estado', function ($q) use ($valor) {
                    $q->where('id', $valor);
                });
                break;
        }

        $pedidos_tlf = $query->get();

        return view('historial-pedidos-tlf', compact('pedidos_tlf'));
    }


}
