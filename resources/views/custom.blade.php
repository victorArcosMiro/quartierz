@extends('master')
@section('title, Galería')
@section('main')


    <div class="text-6xl text-center mb-6">Echale un vistazo a los diseños <i>Custom</i> que hemos creado.</div>
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
        <a href="#" class="group relative flex h-48 items-start overflow-hidden rounded-lg md:col-span-2 md:h-80">
            <img src="/images/custom/varios-disenos.jpg" loading="lazy" alt="Photo by Magicle"
                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
        </a>
        <a href="#" class="group relative flex h-48 items-start overflow-hidden rounded-lg  md:h-80">
            <img src="/images/custom/grillz-1pieza-ventana-BUENAFOTO.jpg" loading="lazy" alt=""
                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
        </a>
        <a href="#" class="group relative flex h-48 items-end overflow-hidden rounded-lg  md:h-80">
            <img src="/images/custom/X-palas-cromo-zoom.jpeg" loading="lazy" alt="Photo by Lorenzo Herrera"
                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
        </a>

        <a href="#" class="group relative flex h-48 items-end overflow-hidden rounded-lg  md:col-span-2 md:h-80">
            <img src="/images/11.jpg" loading="lazy" alt="Photo by Martin Sanchez"
                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
        </a>
    </div>


    <div class="mb-4 flex flex-col items-center justify-between gap-8 sm:mb-8 md:mb-12 mt-10">
        <button id="alternarColapso1" class="text-white bg-blue-500 px-40 py-2 rounded-md">¿Como creamos tu deseño personalizado?</button>

        <div id="colapsoPreguntasFrecuentes1" class="hidden">
            <div class="flex flex-col md:flex-row md:items-center md:gap-12">
                <h2 class="text-2xl font-bold text-white md:text-3xl md:w-1/3">1. Consigue la plantilla.</h2>
                <p class="max-w-screen-sm text-white md:w-2/3">
                    Accediendo a este <a href="https://drive.google.com/file/d/1_mK_Wm4Trxab3PffHRq9VQzHOhbUv9yI/view?usp=sharing" class="underline">link</a> descarga la plantilla.
                </p>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:gap-12">
                <h2 class="text-2xl font-bold textwhite md:text-3xl md:w-1/3">2. Diseña.</h2>
                <p class="max-w-screen-sm text-white md:w-2/3 mt-2 ">
                    Con la plantilla podras plasmar tu diseño, elegir materiales y darnos las indicaciones que creas convenientes.
                </p>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:gap-12">
                <h2 class="text-2xl font-bold text-white md:text-3xl md:w-1/3">3. Sube tu plantilla.</h2>
                <p class="max-w-screen-sm textwhite md:w-2/3 mt-4">
                    Sube tu plantilla a cualquier plataforma como Drive, Dropbox o la que mas te guste y compartenos el diseño. En cuanto recibamos tu diseño contactaremos contigo para reservar una fecha y hora para tomarte las medidias de tus dientes.
                </p>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:gap-12">
                <h2 class="text-2xl font-bold text-white md:text-3xl md:w-1/3">4. Relajate.</h2>
                <p class="max-w-screen-sm textwhite md:w-2/3 mt-4">
                    Ahora puedes relajarte, todo esta en nuestras manos. Cuando el pedido este completado podras pasar por la tienda para pasar a recopgerlo.
                </p>
            </div>
        </div>
    </div>

    <div class="mb-4 flex flex-col items-center justify-between gap-8 sm:mb-8 md:mb-12 mt-10">
        <button id="alternarColapso2" class="text-white bg-blue-500 px-60 py-2 rounded-md">
            Preguntas frecuentes</button>

        <div id="colapsoPreguntasFrecuentes2" class="hidden">
            <div class="flex flex-col md:flex-row md:items-center md:gap-12">
                <h2 class="text-2xl font-bold text-white md:text-3xl md:w-1/3">¿Cómo te muestro mi idea?</h2>
                <p class="max-w-screen-sm text-white md:w-2/3">
                   Puedes acceder a la plantilla desde el boton que esta enciam de esta seccion.
                </p>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:gap-12">
                <h2 class="text-2xl font-bold textwhite md:text-3xl md:w-1/3">¿La plantilla no es suficiente...?</h2>
                <p class="max-w-screen-sm text-white md:w-2/3 mt-2">
                    No te preocupes, para nosotros tampoco es suficiente y por eso te ofrecemos que nos contactes para que nos comentes todos los detalles del diseño. Además podrás contarnos y preguntar cualquier cosa sobre el producto el día que vengas a consulta para tomarte medidas.
                </p>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:gap-12">
                <h2 class="text-2xl font-bold text-white md:text-3xl md:w-1/3">No estoy seguro del todo...</h2>
                <p class="max-w-screen-sm textwhite md:w-2/3 mt-2">
                    Tranquilo, yo tampoco estaba seguro mi primera vez... Ponte en contacto con nosotros para cualquier tipo de consulta que tengas ya sea mediante WhatsApp, Instagram, Twitter, correo electrónico...
                </p>
            </div>
        </div>
    </div>


    <script>
        const alternarColapso1 = document.getElementById('alternarColapso1');
        const colapsoPreguntasFrecuentes1 = document.getElementById('colapsoPreguntasFrecuentes1');

        alternarColapso1.addEventListener('click', function() {
            colapsoPreguntasFrecuentes1.classList.toggle('hidden');
        });

        const alternarColapso2 = document.getElementById('alternarColapso2');
        const colapsoPreguntasFrecuentes2 = document.getElementById('colapsoPreguntasFrecuentes2');

        alternarColapso2.addEventListener('click', function() {
            colapsoPreguntasFrecuentes2.classList.toggle('hidden');
        });
    </script>


    <form class="grid grid-cols-2 gap-4 sm:grid-cols-1 md:gap-0 mt-4">
        <div class="mt-10 mb-10 text-2xl font-medium">1. <a class="underline" href="{{ route('login') }}">Inicia sesión</a>
            o <a class="underline" href="{{ route('register') }}">registrate</a> si no lo estás.</div>


        <div class="mt-10 mb-10 text-2xl font-medium">2. Descraga la plantilla y compartenos tu diseño:</div>
        <div>1º Primero <a class="underline" href="">accede a la plantilla</a> y haz una copia.</div>
        <div>2º Realiza tu diseño sobre la plantilla.</div>
        <div>3º Compartenos el link del diseño, asegurate de que esta público o compartelo con nuestro correo
            (quartierz@gmail.com).</div>

        <div class="mt-10 mb-10 text-2xl font-medium">3. Compartenos tu deseño y elige un dia para tomarte las medidas:
        </div>

        <form action="{{ route('finalizarReserva') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="fecha" class="block text-white text-sm font-bold mb-2">Pega el link del diseño:</label>
                <input type="text" id="link-design" name="link-design"
                    class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:bg-white focus:border-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="fecha" class="block text-white text-sm font-bold mb-2">Selecciona un
                    día:</label>
                <input type="date" id="fecha" name="fecha"
                    class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:bg-white focus:border-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="hora" class="block text-white text-sm font-bold mb-2">Selecciona una
                    hora:</label>
                <select id="hora" name="hora"
                    class="text-black w-full bg-gray-200 border border-gray-400 rounded px-3 py-2 focus:outline-none focus:bg-white focus:border-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona una hora</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="10:30">10:30 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="11:30">11:30 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="12:30">12:30 PM</option>
                    <option value="13:00">01:00 PM</option>
                </select>
            </div>
            <div>
                <button type="submit" id="reservar"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reservar
                    cita</button>
            </div>
        </form>
        <script>
            //Script para restringir al usuario seleccionar sabados o domingos
            document.addEventListener('DOMContentLoaded', function() {
                var fechaInput = document.getElementById('fecha');
                var horaSelect = document.getElementById('hora');
                var reservaBoton = document.getElementById('reservar');

                fechaInput.addEventListener('change', function() {
                    var fechaSeleccionada = new Date(this.value);
                    var diaSemana = fechaSeleccionada
                        .getDay(); // Obtiene el día de la semana (0 para Domingo, 1 para Lunes, ..., 6 para Sábado)

                    // Array de festivos en Zaragoza 2024 (formato: mes-día)
                    var festivos = ['01-01', '01-06', '03-28', '03-29', '04-23', '05-01', '08-15', '10-12',
                        '11-01', '12-06', '12-09', '12-25'
                    ];

                    // Formatea la fecha seleccionada en formato mes-día (MM-DD)
                    var fechaFormateada = ('0' + (fechaSeleccionada.getMonth() + 1)).slice(-2) + '-' + ('0' +
                        fechaSeleccionada.getDate()).slice(-2);

                    // Verifica si la fecha seleccionada es un sábado (6) o un domingo (0), o si es un festivo en Zaragoza 2024
                    if (diaSemana === 0 || diaSemana === 6 || festivos.includes(fechaFormateada)) {
                        alert(
                            'La fecha seleccionada es un festivo en Zaragoza o un sábado/domingo. Por favor, elige otra fecha.'
                        );
                        horaSelect.disabled = true;
                        reservaBoton.setAttribute("disabled", "true");
                        horaSelect.value = ''; // Resetea la selección de hora
                    } else {
                        horaSelect.disabled = false;
                        reservaBoton.removeAttribute("disabled");
                    }
                });
            });
        </script>




    </form>





@endsection
