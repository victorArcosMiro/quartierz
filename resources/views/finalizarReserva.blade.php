@extends('master')
@section('title', 'Carrito de Compras')
@section('main')
    <div class="text-center text-2xl">¡Cita reservada con éxito!</div>
    <div class="text-center text-base">Resumen de reserva, usted a seleccionado los productos:</div>
    <h1>Carrito de compras</h1>

    <!-- Imprimir la lista de productos del carrito -->
    <ul>
        @foreach ($productosCarrito as $producto)
            <li>{{ $producto['nombre'] }} - Precio: {{ $producto['precio'] }}, Cantidad: {{ $producto['cantidad'] }}, Precio Total: {{ $producto['precioTotal'] }}</li>
        @endforeach
    </ul>

    <!-- Imprimir el precio total del carrito -->
    <p>Precio total del carrito: {{ $precioTotalCarrito }}</p>


@endsection
