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
                                        <button
                                            class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none 0 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600  dark:focus:ring-gray-700"
                                            type="submit">
                                            <span class="sr-only">Aumentar cantidad</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                    </form>
                                    <input type="number" id="producto_{{ $producto['id'] }}"
                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="{{ $producto['cantidad'] }}" required readonly>
                                    <form action="{{ route('aumentarCantidad') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $producto['id'] }}">
                                        <button
                                            class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none  focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600  dark:focus:ring-gray-700"
                                            type="submit">
                                            <span class="sr-only">Disminuir cantidad</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
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
                    <form action="{{ route('finalizarReserva') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="fecha" class="block text-white text-sm font-bold mb-2">Selecciona un
                                día:</label>
                            <input type="date" id="fecha" name="fecha"
                                class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:bg-white focus:border-blue-500"
                                required>
                        </div>
                        <input type="hidden" value="{{$precioTotalCarrito }}" name="precioTotalCarrito">
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
                                <button type="submit" id="reservar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reservar cita</button>
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
                                        'La fecha seleccionada es un festivo en Zaragoza o un sábado/domingo. Por favor, elige otra fecha.');
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



                </div>


            </table>
        </div>
    @else
        <p class="text-center">No hay productos en el carrito.</p>
    @endif

@endsection
