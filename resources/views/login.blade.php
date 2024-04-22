@extends('master')
@section('title, Galería')
@section('main')

<div class="flex flex-col justify-center items-center">
        <div class="mb-6 w-96">
            <h2 class="text-2xl text-center font-bold mb-2 text-white">Encantado de verte de nuevo :P</h2>
            <p class="text-white text-center">¿Eres nuevo en Quartierz? Regístrate para no perderte ningún descuento!</p>
        </div>

        <form class="w-96" action="{{route('comprobar-login')}}" method="POST">
        @method('GET')
            <div class="mb-6">
                <label for="username" class="block mb-2 text-sm text-white">Correo</label>
                <input name="correo" type="text" id="username" class="w-full p-2 border text-black border-zinc-300 rounded-lg" placeholder="Usuario">
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm text-white">Contraseña</label>
                <input type="password" name="pass" id="password" class="w-full p-2 border border-zinc-300 rounded-lg text-black" placeholder="Contraseña">
            </div>
            <div class="mb-6">
                <input value="Acceder" name="login" type="submit" class="w-full text-center cursor-pointer bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600"></input>
            </div>
        </form>

        <div class="text-center">
            <button class="text-blue-500 hover:underline">Registrarse</button>
        </div>
</div>


@endsection
