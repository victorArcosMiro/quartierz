@extends('master')
@section('title', 'Carrito de Compras')
@section('main')

    @if (count($productosCarrito) > 0)
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="items-center text-xl text-white ">
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
                                <img src="images/img3.jpg" class="w-16 rounded-lg md:w-32 max-w-full max-h-full"
                                    alt="imagen de {{ $producto['nombre'] }} de {{ $producto['nombre_material'] }}">
                            </td>
                            <td class="px-6 py-4 font-semibold text-white text-xl">
                                {{ $producto['nombre'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-white text-xl">
                                {{ $producto['nombre_material'] }}
                            </td>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <form action="{{ route('disminuirCantidad') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto['id'] }}">
                                        @include('includes/boton_menos')
                                    </form>
                                    <input type="number" id="producto_{{ $producto['id'] }}"
                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="{{ $producto['cantidad'] }}" required readonly>
                                    <form action="{{ route('aumentarCantidad') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto['id'] }}">
                                        @include('includes/boton_mas')
                                    </form>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-white text-xl">
                                {{ $producto['precioTotal'] }}€
                            </td>
                            <td class="px-6 py-4 font-semibold text-white text-xl ">
                                <form action="{{ route('eliminar-fila-carrito') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="producto_id" value="{{ $producto['id'] }}">
                                    <button type="submit"
                                        class="mr-8 flex flex-wrap float-end focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Eliminar</button>
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
                        </th>


                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only"> Accion</span>
                        </th>
                    </tr>

                </tbody>

            </table>
            <div class="flex flex-row justify-end gap-10 mt-10  mb-10">
                <div>
                    <p class="text-white flex justify-center text-right text-xl underline">PRECIO TOTAL DEL CARRITO:
                        {{ $precioTotalCarrito }}€</p>
                </div>


                <form action="{{ route('vaciar-Carrito') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit"
                        class="mr-8 flex flex-wrap float-end focus:outline-none text-white bg-red-700 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Vaciar
                        carrito</button>
                </form>
            </div>
        </div>
        <div class="mt-10 relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right mb-10">
                <div class="max-w-md mx-auto">

                    @if (Session::has('success'))
                        <div class="bg-green-500 text-black p-4 rounded mb-6">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="bg-red-500 text-black p-4 rounded mb-6">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('finalizarReserva') }}" method="POST">
                        @csrf
                        @include('includes.fecha-hora')
                        <input name="precioTotalCarrito" class="hidden" type="text" value="{{ $precioTotalCarrito }}">
                    </form>
                    @include('includes.js-fecha-hora')
                </div>

            </table>
        </div>
    @else
        <p class="text-center">No hay productos en el carrito.</p>
    @endif

@endsection
