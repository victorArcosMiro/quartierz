@extends('master')
@section('title', 'Registo')
@section('main')
<h1 class="text-center text-4xl font-bold">
    Registrate para ser una fokin´ bestia!
</h1>
<form action="{{route('comprobar-registro')}}" method="POST">
    @csrf
    @method('GET')
    <div class="grid gap-6 mb-6 md:grid-cols-2 p-10">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-white">Nombre</label>
            <input type="text" name="nombre" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-white">Apellidos</label>
            <input type="text" name="apellidos" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
        </div>
        <div>
            <label for="company" class="block mb-2 text-sm font-medium text-white">Correo electrónico</label>
            <input type="text" name="email" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
        </div>
        <div>
            <label for="phone" class="block mb-2 text-sm font-medium text-white">Contraseña</label>
            <input type="password" name="pass1" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div>
            <label for="website" class="block mb-2 text-sm font-medium text-white">Confirmar contraseña</label>
            <input type="password" name="pass2" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div>
            <label for="website" class="block mb-2 text-sm font-medium text-white">Numero de teléfono</label>
            <input type="number" name="telefono" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div class="items-center p-4">
            <div class="flex items-start mb-2">
                <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-white">Acepto los <a href="#" class="text-blue-600 hover:underline">terminos y condiciones</a>.</label>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Registrarse</button>
        </div>
    </div>
</form>
@endsection
