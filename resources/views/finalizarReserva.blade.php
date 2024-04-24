@extends('master')
@section('title', 'Carrito de Compras')
@section('main')
    <div class="text-center text-2xl">¡Cita reservada con éxito!</div>
    <div class="text-center text-base mt-5">Usted a seleccionado los siguientes productos para tomarse medidas el dia  <strong>{{ $datosCita['fecha'] }}</strong> a las <strong>{{ $datosCita['hora'] }}</strong></div>

    <!-- Imprimir la lista de productos del carrito -->

    <div class="flex flex-row flex-wrap justify-evenly mt-10">
            @foreach ($datosCarrito['productosCarrito'] as $producto)
            <div class="backdrop-blur-md  bg-white/10 shadow-md p-4 rounded-lg mt-5 ml-5">
                <div>
                    <img class="max-w-32 rounded-lg" src="/images/img1.jpg" alt="Imagen de producto">
                </div>
                    <div class="mt-4">
                        <strong>Nombre:</strong> {{ $producto['nombre'] }} <br>
                        <strong>Material:</strong> {{ $producto['nombre_material'] }} <br>
                        <strong>Unidad:</strong> {{ $producto['precio'] }} €<br>
                        <strong>Cantidad:</strong> {{ $producto['cantidad'] }} <br>
                        <strong>Precio lote:</strong> {{ $producto['precioTotal'] }}€ <br>
                        <!-- Agrega cualquier otro detalle que quieras mostrar -->
                    </div>
            </div>
            @endforeach
    </div>
    <div class="text-center mt-14">
        <p><strong class="">Precio Total:</strong> {{ $datosCarrito['precioTotalCarrito'] }}€</p>

        <p>El dia que se {{ $datosCita['hora'] }} solo sera necesario abonar la <strong>mitad</strong> del total: <strong>{{ $datosCarrito['precioTotalCarrito']/2 }}€</strong></p>


    </div>
@endsection
