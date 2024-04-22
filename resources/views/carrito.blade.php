@extends('master')
@section('title', 'Carrito de Compras')
@section('main')

@if (count($productosCarrito) > 0)
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="items-center text-xl text-gray-400">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Imagen</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Material
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productosCarrito as $producto)
                    <tr class=" dark:border-gray-700 ">
                        <td class="p-4">
                            <img src="images/img3.jpg" class="w-16 rounded-lg md:w-32 max-w-full max-h-full" alt="imagen de {{ $producto['nombre'] }} de {{ $producto['nombre_material'] }}">
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $producto['nombre'] }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $producto['nombre_material'] }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <form action="{{ route('disminuirCantidad') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $producto['id'] }}">
                                    <button class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none 0 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600  dark:focus:ring-gray-700" type="submit">
                                        <span class="sr-only">Aumentar cantidad</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                </form>
                                <input type="number" id="producto_{{ $producto['id'] }}" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto['cantidad'] }}" required readonly>
                                <form action="{{ route('aumentarCantidad') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $producto['id'] }}">
                                    <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none  focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600  dark:focus:ring-gray-700" type="submit">
                                        <span class="sr-only">Disminuir cantidad</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-white">
                            {{ $producto['precioTotal'] }}€
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('eliminar-fila-carrito') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="producto_id" value="{{ $producto['id'] }}">
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Imagen</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                       <span class="sr-only"> Producto</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only"> Material</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only"> Cantidad</span>
                       <p class="text-white text-right">PRECIO TOTAL DEL CARRITO</p>
                    </th>
                    <th scope="col" class="px-6 py-3">
                       <p  class="text-white">{{$precioTotalCarrito}}€</p>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only"> Accion</span>
                    </th>
                </tr>

            </tbody>

        </table>
   <div class="flex flex-col mt-10">

    <form action="{{ route('vaciar-Carrito') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="mr-8 flex flex-wrap float-end focus:outline-none text-white bg-red-700 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Vaciar carrito</button>
    </form>

    <form action="{{ route('vaciar-Carrito') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="mr-8 flex flex-wrap float-end focus:outline-none text-white bg-cyan-600 hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Continuar</button>
    </form>

   </div>
    </div>
@else
    <p class="text-center">No hay productos en el carrito.</p>
@endif

@endsection
