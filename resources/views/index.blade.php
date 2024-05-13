@extends('master')
@section('title, Galería')
@section('main')

    <div style="background-image: url('/images/10.jpg'); background-position: center;"
        class=" min-h-[700px] overflow-hidden sm:rounded-lg">


        <div class="flex  min-h-[700px] flex-col items-center justify-center px-10 gap-10 ">
            <div class="text-6xl">
                Grillz en Zaragoza

            </div>
            <div class="text-center items-center hidden sm:block">
                En nuestra marca local de Zaragoza, nos dedicamos a crear Grillz personalizados que reflejen la
                individualidad y el estilo de cada cliente. Con una atención meticulosa al detalle y materiales de
                primera calidad, estamos comprometidos a ofrecer sonrisas únicas y duraderas.
            </div>
        </div>


    </div>

    <div class="bg-black h-96 mt-5 shadow-md overflow-hidden sm:rounded-lg px-10">

        <div class=" flex flex-col h-96">

            <div class="flex h-96 items-center">

                <div class="text-center mx-6 hidden sm:block flex-1 w-32 ...">
                    Descubre una amplia variedad de diseños disponibles en nuestra galería. Desde elegantes piezas de
                    cromo hasta exquisitas creaciones en oro de 9 y 18 kilates.
                </div>

                <div class="text-center text-6xl flex-1 w-64 ...">
                    Explora nuestros diseños.<br>
                    <form action="{{ route('galeria-show') }}">
                        <input type="submit"
                            class="bg-blue-500 text-base hover:bg-blue-700 w-40 top-40 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer"
                            value="Acceder"></input>
                    </form>
                </div>


            </div>

        </div>

    </div>

    <div class="bg-black h-96 mt-5 shadow-md overflow-hidden sm:rounded-lg px-10">

        <div class=" flex flex-col h-96">

            <div class="flex  h-96 items-center">

                <div class="text-center text-6xl mx-6 flex-1 w-32 ...">
                    Crea tus grillz <i>Custom.</i><br>
                    <form action="{{ route('custom-show') }}">
                        <input type="submit"
                            class="bg-blue-500 text-base hover:bg-blue-700 w-40 top-40 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer"
                            value="Acceder"></input>
                    </form>
                </div>

                <div class="text-center hidden sm:block text-base flex-1 w-64 ...">
                    ¿No ves el diseño para ti? <i>Custom</i> es la sección para las personas que quieran un diseño
                    totalmente personalizado. Accede a la seccion para ver mas informacion de como es el proceso.

                </div>


            </div>

        </div>

    </div>



    <?php
    /*

CARROUSEL ___ !!NO ES PARA EL PROYECTO!!

<div class="h-96 mt-5 backdrop-blur-md  bg-white/10 shadow-md overflow-hidden sm:rounded-lg">

            <div class="text-center mt-4 text-2xl">Conoce nuestros diseños</div>
            <!-- Component: Logos carousel -->
            <div class="relative w-full glide-09">
                <!-- Slides -->
                <div data-glide-el="track">
                    <ul
                        class="whitespace-no-wrap flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform] relative flex w-full overflow-hidden p-0 pb-12 mt-8">
                        <li>
                            <img src="/images/sobre-nosotros/goteo-pulido.png"
                                class="w-auto h-72 max-w-full max-h-full m-auto rounded-xl" />
                        </li>
                        <li>
                            <img src="/images/sobre-nosotros/grillz-oro.jpg"
                                class="w-auto h-72 max-w-full max-h-full m-auto rounded-xl" />
                        </li>
                        <li>
                            <img src="/images/img2.jpg" class="w-auto h-72 max-w-full max-h-full m-auto rounded-xl" />
                        </li>
                        <li>
                            <img src="/images/sobre-nosotros/grillz-pulido.jpg"
                                class="w-auto h-72 max-w-full max-h-full m-auto rounded-xl" />
                        </li>
                        <li>
                            <img src="/images/11.jpg" class="w-auto h-72 max-w-full max-h-full m-auto rounded-xl" />
                        </li>
                        <li>
                            <img src="/images/img1.jpg" class="w-auto h-72 max-w-full max-h-full m-auto rounded-xl" />
                        </li>

                    </ul>
                </div>
            </div>
            <div>
                <button {{ route('galeria-show') }} type="submit"
                    class="bg-blue-500 hover:bg-blue-700 w-40 top-40 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4">Reservar
                    cita</button>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>

            <script>
                var glide09 = new Glide('.glide-09', {
                    type: 'carousel',
                    autoplay: 1,
                    animationDuration: 4500,
                    animationTimingFunc: 'linear',
                    perView: 3,
                    classes: {
                        activeNav: '[&>*]:bg-slate-700',
                    },
                    breakpoints: {
                        1024: {
                            perView: 2
                        },
                        640: {
                            perView: 1,
                            gap: 36
                        }
                    },
                });

                glide09.mount();
            </script>

        </div>
*/
    ?>

    </script>


@endsection
