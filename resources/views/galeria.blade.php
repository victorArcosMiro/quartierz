@extends('master')
@section('title, Galería')
@section('main')


<div class="text-center text-5xl mb-10">Galería de productos</div>

        @include('/includes/filtros')

        <div class="product-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 ">



            @foreach ($productsList as $product)
            <div class="product-card border border-zinc-300 p-2 bg-white rounded-lg">
                <a href="{{ route('producto.show', [$product->id]) }}">

                    <img src="/images/img1.jpg" alt="Product Image" class="w-full h-auto rounded-lg" crossorigin="anonymous" />

                    <div class="flex flex-row items-center justify-around">
                    <h4 class=" text-lg font-semibold text-black">{{ $product->nombre }}</h4>

                        <div>
                            <p class="text-sm text-black">{{ $product->precio }}€</p>
                            <p class="text-sm text-black">{{ $product->nombre_material }}</p>
                        </div>

                        <form action="{{ route('carrito.agregar') }}" method="POST">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="producto_id" value="{{ $product->id }}">
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg"><img class="h-5" src="/images/cart.svg" alt=""></button>
                        </form>


                    </div>

                </a>
            </div>
            @endforeach

    @endsection
