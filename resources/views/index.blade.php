@extends('master')
@section('title, Galería')
@section('main')
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div style="background-image: url('/images/10.jpg'); background-position: center;"
            class="bg-cover w-auto h-80 min-h-96 text-center grid  grid-cols-2 grid-rows-5 gap-4 rounded-xl p-4">

            <div class="mt-5 mb-5 col-span-1 row-span-2 relative text-center text-4xl">
                Grillz a medida en Zaragoza
            </div>
            <div class="mt-5 mb-5 col-span-1 row-span-2 relative text-center">
                <span></span>
            </div>
            <div class="col-span-1 row-span-1 relative text-center flex flex-col items-center">
                <div class="hidden md:block">
                    En nuestra marca local de Zaragoza, nos dedicamos a crear Grillz personalizados que reflejen la
                    individualidad y el estilo de cada cliente. Con una atención meticulosa al detalle y materiales de
                    primera calidad, estamos comprometidos a ofrecer sonrisas únicas y duraderas.
                </div>
                <button {{ route('galeria-show') }} type="submit"
                    class="bg-blue-500 hover:bg-blue-700 w-40 top-40 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4">Reservar
                    cita</button>
            </div>

        </div>

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
    </div>

@endsection
