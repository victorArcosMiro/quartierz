<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
   public function login(){
    return view('login');
   }

   public function comprobarLogin(Request $request)
   {
       $correo = $request->input('correo');
       $password = $request->input('pass');

       // Buscar el cliente por correo electrónico
       $cliente = Cliente::where('correo', $correo)->first();

       // Verificar si se encontró un cliente con ese correo electrónico
       if ($cliente) {
           // Si se encontró el cliente, buscar el usuario asociado
           $usuario = Usuario::where('cliente_id', $cliente->id)->first();

           // Verificar si se encontró un usuario y si la contraseña coincide
           if ($usuario && Hash::check($password, $usuario->contraseña)) {
               // Usuario y contraseña válidos
               // Realiza cualquier acción adicional que necesites aquí, como iniciar sesión
               $_SESSION['usuario'] = "correo";
               return redirect()->route('galeria-show'); // Redirige a la página de inicio
           } else {
               // Usuario o contraseña incorrectos
               return redirect()->route('user-register')->with('error', 'Usuario o contraseña incorrectos');
           }
       } else {
           // No se encontró un cliente con ese correo electrónico
           return redirect()->route('user-register')->with('error', 'Usuario o contraseña incorrectos');
       }
   }



   public function userRegister(Request $request)
   {
       // Validar los datos del formulario
       $nombre = $request->input('nombre');
       $apellidos = $request->input('apellidos');
       $correo = $request->input('email');
       $telefono = $request->input('telefono');
       $pass1 = $request->input('pass1');

       // Comprobar si ya existe un usuario con la misma dirección de correo electrónico
       if (Cliente::where('correo', $correo)->exists()) {
           return redirect()->back()->with('error', 'Ya existe un usuario registrado con este correo electrónico.');
       }
       // Crear un nuevo usuario
       $cliente = new Cliente();
       $cliente->nombre = $nombre;
       $cliente->apellidos = $apellidos;
       $cliente->correo = $correo;
       $cliente->telefono = $telefono;
       $cliente->save();

       // Crear un nuevo usuario
       $user = new Usuario();
       $user->contraseña = Hash::make($pass1);
       $user->cliente_id = $cliente->id;
       $user->save();

       // Realiza cualquier acción adicional que necesites aquí, como iniciar sesión
       return redirect()->route('inicio-show')->with('success', '¡Registro exitoso! Inicia sesión para continuar.');
   }
}

