@extends('master')
@section('title, Galería')
@section('main')


            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">

<?php
/*
 <div class="flex items-center gap-12">
                        <h2 class="text-2xl font-bold text-white-800 lg:text-3xl">¿Como creamos tu diseño
                            personalizado?</h2>

                        <p class="hidden max-w-screen-sm text-white-500 md:block">
                            This is a section of some simple filler text,
                            also known as placeholder text. It shares some characteristics of a real written text.
                        </p>
                    </div>

                    <a href="#"
                        class="inline-block rounded-lg border bg-white px-4 py-2 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:px-8 md:py-3 md:text-base">
                        More
                    </a>
*/
?>

                </div>

                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
                    <!-- image - start -->
                    <a href="#"
                        class="group relative flex h-48 items-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                        <img src="/images/10.jpg" loading="lazy" alt="Photo by Magicle"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black-800 via-transparent to-transparent opacity-50">
                        </div>
                        <span
                            class="relative w-1/2 ml-5 mt-5 inline-block text-white md:text-2xl sm:text-sm lg:text-4xl">TEXTO</span>
                    </a>
                    <!-- image - end -->

                    <!-- image - start -->

                    <a href="#"
                        class="group relative flex h-48 items-start overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                        <img src="/images/10.jpg"
                            loading="lazy" alt=""
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div
                            class="pointer-events-none absolute inset-0 ">
                        </div>

                        <span
                            class="relative w-1/2 ml-5 mt-5 inline-block text-white md:text-2xl sm:text-sm lg:text-4xl">TEXTO</span>
                    </a>
                    <!-- image - end -->
                    <!-- image - start -->
                    <a href="#"
                        class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                        <img src="/images/10.jpg"
                            loading="lazy" alt="Photo by Lorenzo Herrera"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>

                        <span
                            class="relative w-1/2 ml-5 mt-5 inline-block text-white md:text-2xl sm:text-sm lg:text-4xl">TEXTO</span>
                    </a>
                    <!-- image - end -->
                    <!-- image - start -->
                    <a href="#"
                        class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                        <img src="/images/11.jpg"
                            loading="lazy" alt="Photo by Martin Sanchez"
                            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                        <div
                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                        </div>

                        <span
                            class="relative w-1/2 ml-5 mt-5 inline-block text-white md:text-2xl sm:text-sm lg:text-4xl">TEXTO</span>
                    </a>
                    <!-- image - end -->


                </div>
                <form class="grid grid-cols-2 gap-4 sm:grid-cols-1 md:gap-0 mt-4">
                    <div class="mt-10 mb-10 text-2xl font-medium">1. Introcue tus datos:</div>
                    <div class="grid-col">
                        <label for="nombre" class="block mb-2 font-medium text-white">Nombre</label>
                        <input type="text" id="firstName" name="nombre"
                            class="form-control w-full rounded-md border border-gray-300 px-2 py-2" required>
                    </div>

                    <div class="grid-col">
                        <label for="apellido" class="block mb-2 font-medium text-white">Apellidos</label>
                        <input type="text" id="firstName" name="apellido"
                            class="form-control w-full rounded-md border border-gray-300 px-2 py-2" required>
                    </div>

                    <div class="grid-col">
                        <label for="firstName" class="block mb-2 font-medium text-white">Correo electrónico</label>
                        <input type="text" id="firstName" name="firstName"
                            class="form-control w-full rounded-md border border-gray-300 px-2 py-2" required>
                    </div>

                    <div class="mt-10 mb-10 text-2xl font-medium">2. Descraga la plantilla y sube tu:</div>
                    <div class="grid-col mt-5">
                        <a class="bg-gray-200 mb-2 font-medium text-black form-control w-full rounded-md border border-gray-600 px-5 py-2"
                            href="/platilla/plantilla_grillz.pdf" download="plantilla_grillz.pdf">Descargar:
                            plantilla-grillz.pdf</a>

                    </div>



                    <div class="flex items-center justify-center w-full mt-5">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>






                    <div class="grid-col-span-2 mt-4">
                        <button type="submit" class="btn btn-primary w-full">Enviar</button>
                    </div>
                </form>



            </div>


@endsection
