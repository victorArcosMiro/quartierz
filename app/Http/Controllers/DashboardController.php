<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;  // Asegúrate de que esta línea apunte a tu modelo Pedido

class DashboardController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            // Si el usuario es administrador, muestra todos los pedidos
            $pedidos = Pedido::all();
        } else {
            // Si el usuario no es administrador, muestra solo sus pedidos
            $pedidos = Pedido::where('user_id', $user->id)->get();
        }

        return view('dashboard', ['pedidos' => $pedidos]);
    }
}
