@extends('master')
@section('title, Info de diseño')
@section('main')


<div class="flex flex-col justify-center items-center">
    <img src="/images/{{$design->imagen_design}}" alt="Product Image" class="w-full md:w-1/3 rounded-lg rounded-r-none">
    <div class="p-4 md:w-2/3 flex flex-col justify-center items-center">
        <h2 class="text-xl text-center font-bold mb-2">{{ $design->nombre}}</h2>
        <p class="text-white mb-4 text-center">{{{$design->material->descripcion}}}</p>
        <a href="" class="bg-blue-500 text-white p-2 rounded-lg ">Comprar</a>
    </div>
</div>

@endsection
