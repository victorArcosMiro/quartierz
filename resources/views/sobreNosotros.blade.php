@extends('master')
@section('title, Sobre nosotros')
@section('main')
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="w-full  text-center p-14">
            <div class="text-5xl mb-10">Sobre Nosotros</div>
            <div>En Quartierz, somos un equipo apasionado por la creación de grillz personalizados de la más alta calidad.
                Nuestra misión es ofrecer a nuestros clientes productos únicos que reflejen su estilo personal y resalten su
                sonrisa. Con un equipo de expertos en diseño y fabricación, nos dedicamos a brindar un servicio excepcional
                y a superar las expectativas de nuestros clientes en cada etapa del proceso.</div>
        </div>

        <div class="w-full p-14 mt-5 flex flex-row">
            <div class="text-center">
                <div class="text-5xl mb-10">Nuestra Misión</div>
                <div>En Quartierz, nuestra misión es transformar sonrisas a través de la creación de grillz personalizados
                    que combinan arte y precisión. Nos comprometemos a utilizar materiales de la más alta calidad y técnicas
                    avanzadas de fabricación para crear piezas únicas que nuestros clientes puedan lucir con orgullo.
                    Nuestra dedicación a la excelencia y a la innovación nos impulsa a mejorar constantemente nuestros
                    procesos y productos, asegurando que cada grillz que producimos sea una obra maestra.</div>
            </div>
        </div>
        <div class="text-center text-5xl mt-20">Conoce todo el proceso</div>

        <div class=" flex flex-col">
            <div class="flex h-96 items-center">
                <div class="text-center text-3xl mx-6 flex-1 w-32 ...">
                    1. Toma de medidas. <br>
                    <div class="text-base mt-4"> Tomamos medidas precisas para garantizar que cada grill
                        se ajuste perfectamente y sea cómodo, utilizando técnicas profesionales y materiales de alta
                        calidad.</div>
                </div>
                <div class="text-center hidden md:block text-base flex-none">
                    <img class="rounded-xl h-80 flex-nowrap" src="/images/sobre-nosotros/moldes-yeso.jpg"
                        alt="imagen tomandse mediadas">
                </div>
            </div>
        </div>

        <div class=" flex flex-col">
            <div class="flex  h-96 items-center">
                <div class="text-center hidden md:block text-base flex-none">
                    <img class="rounded-xl h-80 flex-nowrap" src="/images/sobre-nosotros/moldes-yeso.jpg" alt="">
                </div>
                <div class="text-center text-3xl mx-6 flex-1 w-64 ...">
                    2. Moldes de yeso <br>
                    <div class="text-base mt-4">Rellenamos los moldes con yeso para asegurar que el
                        resultado
                        final se adapte perfectamente a la forma de los dientes.</div>
                </div>
            </div>
        </div>

        <div class=" flex flex-col">
            <div class="flex  h-96 items-center">
                <div class="text-center text-3xl mx-6 flex-1 w-32 ...">
                    3. Modelado en cera<br>
                    <div class="text-base mt-4">Los artesanos dan forma a los grillz con cera sobre el
                        molde de yeso, permitiendo un diseño personalizado y flexible antes de la producción final.
                    </div>
                </div>
                <div class="text-center hidden md:block text-base flex-none">
                    <img class="rounded-xl h-72 flex-nowrap" src="/images/sobre-nosotros/goteo-cera.png"
                        alt="imagen tomandse mediadas">
                </div>
            </div>
        </div>

        <div class=" flex flex-col">
            <div class="flex h-96 items-center">
                <div class="text-center hidden md:block text-base flex-none">
                    <img class="rounded-xl h-72 flex-nowrap" src="/images/11.jpg" alt="">
                </div>
                <div class="text-center text-3xl mx-6 flex-1 w-64 ...">
                    4. Prueba en cera<br>
                    <div class="text-base mt-4">Se realiza una prueba de ajuste meticulosa con el
                        cliente
                        antes de continuar para identificar y ajustar posibles puntos de contacto que puedan causar
                        molestias, garantizando un ajuste cómodo.</div>
                </div>
            </div>
        </div>

        <div class=" flex flex-col ">
            <div class="flex h-96 items-center">
                <div class="text-center items-center text-3xl mx-6 flex-1 w-32 ...">
                    5. Producción y acabado<br>
                    <div class="text-base mt-4">Utlizamos materales de alta calidad para darle forma a
                        tus
                        grillz y someterlos a un proceso de pulido para darle brillo a la pieza.</div>
                </div>
                <div class="text-center hidden md:block text-base flex-none">
                    <img class="rounded-xl h-80 flex-nowrap" src="/images/sobre-nosotros/goteo-pulido.png"
                        alt="imagen tomandse mediadas">
                </div>
            </div>
        </div>

        <div class=" flex flex-col">
            <div class="flex  h-96 items-center">
                <div class="text-center text-3xl flex-1 w-64 ...">
                    6. Entrega y satisfacción del cliente<br>
                    <div class=" text-base mt-4">Finalmente, entregamos tu grill personalizado con
                        la garantía
                        de que cada detalle ha sido cuidadosamente elaborado para satisfacer tus expectativas. Nos
                        enorgullecemos de ofrecer productos de calidad y un servicio excepcional a cada uno de
                        nuestros
                        clientes, asegurando una experiencia sin igual en el mundo de los grillz. Recuerda mantener
                        tus
                        grillz siempre limpios, no comer con ellos y enseñarselos a tus colegas :P</div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center mb-6"> <!-- Contenedor centrado -->
            <img class="rounded-xl h-96" src="/images/sobre-nosotros/grillz-oro.jpg" alt="imagen tomandse mediadas">
        </div>
    </div>
@endsection
