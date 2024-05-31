<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-black text-2xl text-center mt-5">Datos del pedido para modificar</div>
                <form action="{{ route('actualizar-pedido', ['id' => $pedido->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-6 text-gray-900 dark:text-gray-100 flex sm:flex-row flex-col justify-around">
                        <div>
                            <div class="flex flex-col items-center justify-center">
                                <div class="text-left">
                                    <p class="mt-4 text-xl"><strong>Datos del cliente</strong></p>

                                    <p class="mt-4"><strong>Nombre: </strong>{{ $pedido->user->nombre }} {{ $pedido->user->apellidos }}</p>
                                    <p class="mt-4"><strong>Teléfono:</strong>{{ $pedido->user->telefono }}</p>
                                    <p class="mt-4 text-xl"><strong>Datos del pedido</strong></p>
                                    <p class="mt-4"><strong>ID:</strong> {{ $pedido->id }}</p>
                                    <p class="mt-4"><strong>Fecha Cita:</strong> <input type="text" name="fecha_cita" value="{{ $pedido->cita }}"></p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            @if ($detallesPedido->isEmpty())
                                <p>No hay detalles disponibles para este pedido.</p>
                            @else
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="p-4">Diseño</th>
                                            <th class="p-4">Material</th>
                                            <th class="p-4">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detallesPedido as $detalle)
                                            <tr>
                                                <td class="p-4 text-center"><input type="text" name="nombre_design[]" value="{{ $detalle->design->nombre }}"></td>
                                                <td class="p-4 text-center"><input type="text" name="nombre_material[]" value="{{ $detalle->material->material }}"></td>
                                                <td class="p-4 text-center"><input type="number" name="cantidad[]" value="{{ $detalle->cantidad }}"></td>
                                                <!-- Campos ocultos para detalles del pedido -->
                                                <input type="hidden" name="detallesPedido[{{ $detalle->id }}][id]" value="{{ $detalle->id }}">
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 text-base hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer mb-5">
                            Guardar cambios del pedido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
