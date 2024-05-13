<?php
use App\Models\Pedido;
use App\Models\PedidosPorTelefono;
use Illuminate\Http\Request;

class FiltrosController extends Controller
{
    public function buscarPorNombreYApellidos($nombre, $apellidos) {
        $pedidosTelefono = PedidosPorTelefono::where('nombre', 'LIKE', "%$nombre%")
            ->where('apellidos', 'LIKE', "%$apellidos%")
            ->get();

        $pedidosCorreo = Pedido::where('nombre', 'LIKE', "%$nombre%")
            ->where('apellidos', 'LIKE', "%$apellidos%")
            ->get();

        return view('resultados_busqueda', [
            'pedidosTelefono' => $pedidosTelefono,
            'pedidosCorreo' => $pedidosCorreo
        ]);
    }

    public function buscarPorId($id) {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            $pedido = PedidosPorTelefono::find($id);
        }

        return view('resultado_id', [
            'pedido' => $pedido
        ]);
    }

    public function filtrarPedidosPorTelefono() {
        $pedidosTelefono = PedidosPorTelefono::all();
        return view('pedidos_telefono', [
            'pedidosTelefono' => $pedidosTelefono
        ]);
    }

    public function filtrarPedidosPorCorreoElectronico() {
        $pedidosCorreo = Pedido::whereNotNull('email')->get();
        return view('pedidos_correo', [
            'pedidosCorreo' => $pedidosCorreo
        ]);
    }

    public function filtrarPorEstado($estado) {
        $pedidosPorEstadoTelefono = PedidosPorTelefono::where('estado_pedido_id', $estado)->get();
        $pedidosPorEstadoCorreo = Pedido::where('estado_pedido_id', $estado)->get();

        return view('pedidos_por_estado', [
            'pedidosPorEstadoTelefono' => $pedidosPorEstadoTelefono,
            'pedidosPorEstadoCorreo' => $pedidosPorEstadoCorreo
        ]);
    }
}
