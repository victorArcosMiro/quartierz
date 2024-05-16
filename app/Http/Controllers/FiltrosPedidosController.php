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
        $pedidos = Pedido::select(
            'pedido.id as pedido_id',
            'pedido.cita as fecha_cita',
            'estados_pedido.nombre as estado_pedido',
            'users.name as nombre_usuario',
            'users.email as email_usuario',
            'datos_user.telefono as telefono_usuario',
            'datos_user.apellido as apellido_usuario'
        )
        ->join('users', 'pedido.user_id', '=', 'users.id')
        ->leftJoin('datos_user', 'users.id', '=', 'datos_user.user_id')
        ->join('estados_pedido', 'pedido.estado_pedido_id', '=', 'estados_pedido.id')
        ->orderBy('pedido.cita', 'asc')
        ->get();

        return view('dashboard', compact('pedidos'));
    }

    public function mostrarDetallesPedido($id)
    {
        $pedido = Pedido::select(
            'pedido.id as pedido_id',
            'pedido.cita as fecha_cita',
            'estados_pedido.nombre as estado_pedido',
            'users.name as nombre_usuario',
            'users.email as email_usuario',
            'datos_user.telefono as telefono_usuario',
            'datos_user.apellido as apellido_usuario'
        )
        ->join('users', 'pedido.user_id', '=', 'users.id')
        ->leftJoin('datos_user', 'users.id', '=', 'datos_user.user_id')
        ->join('estados_pedido', 'pedido.estado_pedido_id', '=', 'estados_pedido.id')
        ->where('pedido.id', $id)
        ->first();

        // Ahora, obtén los detalles específicos del pedido
        $detallesPedido = PedidoDesignCantidad::select(
            'design.nombre as nombre_design',
            'design.nombre_material as nombre_material',
            'material.material as material',
            'pedido_design_cantidad.cantidad as cantidad',
            'pedido_design_cantidad.precio as precio'
        )
        ->join('design', 'pedido_design_cantidad.design_id', '=', 'design.id')
        ->join('material', 'pedido_design_cantidad.material_id', '=', 'material.id')
        ->where('pedido_design_cantidad.pedido_id', $id)
        ->get();
         // Calcular el precio total del pedido

    // Calcular el precio total del pedido
    $precioTotal = $detallesPedido->sum('precio');

        return view('detalle-pedido', compact('pedido', 'detallesPedido','precioTotal'));
    }

    public function mostrarDetallesPedidoEditar($id)
    {
        $pedido = Pedido::select(
            'pedido.id as pedido_id',
            'pedido.cita as fecha_cita',
            'estados_pedido.nombre as estado_pedido',
            'users.name as nombre_usuario',
            'users.email as email_usuario',
            'datos_user.telefono as telefono_usuario',
            'datos_user.apellido as apellido_usuario'
        )
        ->join('users', 'pedido.user_id', '=', 'users.id')
        ->leftJoin('datos_user', 'users.id', '=', 'datos_user.user_id')
        ->join('estados_pedido', 'pedido.estado_pedido_id', '=', 'estados_pedido.id')
        ->where('pedido.id', $id)
        ->first();

        // Ahora, obtén los detalles específicos del pedido
        $detallesPedido = PedidoDesignCantidad::select(
            'design.nombre as nombre_design',
            'design.nombre_material as nombre_material',
            'material.material as material',
            'pedido_design_cantidad.cantidad as cantidad',
            'pedido_design_cantidad.precio as precio'
        )
        ->join('design', 'pedido_design_cantidad.design_id', '=', 'design.id')
        ->join('material', 'pedido_design_cantidad.material_id', '=', 'material.id')
        ->where('pedido_design_cantidad.pedido_id', $id)
        ->get();
         // Calcular el precio total del pedido

    // Calcular el precio total del pedido
    $precioTotal = $detallesPedido->sum('precio');

        return view('detalle-pedido-editar', compact('pedido', 'detallesPedido','precioTotal'));
    }
    public function mostrarPedidosFiltrados(Request $request)
    {
        $request->validate([
            'opciones' => 'required',
            'inputField' => 'required',
        ]);

        $opcion = $request->input('opciones');
        $valor = $request->input('inputField');

        $query = Pedido::select(
            'pedido.id as pedido_id',
            'pedido.cita as fecha_cita',
            'estados_pedido.nombre as estado_pedido',
            'users.name as nombre_usuario',
            'users.email as email_usuario',
            'datos_user.telefono as telefono_usuario',
            'datos_user.apellido as apellido_usuario'
        )
        ->join('users', 'pedido.user_id', '=', 'users.id')
        ->leftJoin('datos_user', 'users.id', '=', 'datos_user.user_id')
        ->join('estados_pedido', 'pedido.estado_pedido_id', '=', 'estados_pedido.id');

        // Aplicar el filtro según la opción seleccionada
        switch ($opcion) {
            case 'fecha':
                $query->whereDate('pedido.cita', $valor);
                break;
            case 'nombre':
                $query->where('users.name', 'like', '%' . $valor . '%');
                break;
            case 'apellido':
                $query->where('datos_user.apellido', 'like', '%' . $valor . '%');
                break;
            case 'id':
                $query->where('pedido.id', $valor);
                break;
            case 'telefono':
                $query->where('datos_user.telefono', 'like', '%' . $valor . '%');
                break;

        }

        $pedidos = $query->get();

        return view('dashboard', compact('pedidos'));
    }


}
