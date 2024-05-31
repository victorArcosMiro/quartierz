<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-black text-2xl text-center mt-5">Datos del pedido para modificar</div>
                @php
                    $fechaCita = new DateTime($pedido_tlf->cita);
                    $hoy = new DateTime();
                    $disableModifications = $fechaCita <= $hoy;
                @endphp
                <form action="{{ route('actualizar-pedido-tlf', ['id' => $pedido_tlf->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-6 text-gray-900 dark:text-gray-100 flex sm:flex-row flex-col justify-around">
                        <div>
                            <div class="flex flex-col items-center justify-center">
                                <div class="text-left flex flex-col  justify-center">
                                    <p class="mt-4 text-xl"><strong>Datos del cliente</strong></p>
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" value="{{ $pedido_tlf->nombre }}"
                                        class="w-60 bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                                    <label for="nombre">Apellidos</label>
                                    <input type="text" name="apellidos" value="{{ $pedido_tlf->apellidos }}"
                                        class="w-60 bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="number" name="telefono" value="{{ $pedido_tlf->telefono }}"
                                        class="w-60 bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500">

                                    <p class="mt-4 text-xl"><strong>Datos del pedido</strong></p>
                                    <p class="mt-4"><strong>ID:</strong> {{ $pedido_tlf->id }}</p>
                                    <div class="mb-4">
                                        <label for="fecha" class="mb-2">Selecciona un día:</label>
                                        <input type="date" id="fecha" name="fecha" class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500" value="{{ $fechaCita->format('Y-m-d') }}" required @if($disableModifications) disabled @endif>
                                    </div>
                                    <div class="mb-4">
                                        <label for="hora" class="mb-2">Selecciona una hora:</label>
                                        <select id="hora" name="hora" class="text-black w-full bg-gray-200 border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500" required @if($disableModifications) disabled @endif>
                                            <option value="" disabled>Selecciona una hora</option>
                                            <option value="16:00" {{ $fechaCita->format('H:i') == '16:00' ? 'selected' : '' }}>04:00 PM</option>
                                            <option value="16:30" {{ $fechaCita->format('H:i') == '16:30' ? 'selected' : '' }}>04:30 PM</option>
                                            <option value="17:00" {{ $fechaCita->format('H:i') == '17:00' ? 'selected' : '' }}>05:00 PM</option>
                                            <option value="17:30" {{ $fechaCita->format('H:i') == '17:30' ? 'selected' : '' }}>05:30 PM</option>
                                            <option value="18:00" {{ $fechaCita->format('H:i') == '18:00' ? 'selected' : '' }}>06:00 PM</option>
                                            <option value="18:30" {{ $fechaCita->format('H:i') == '18:30' ? 'selected' : '' }}>06:30 PM</option>
                                            <option value="19:00" {{ $fechaCita->format('H:i') == '19:00' ? 'selected' : '' }}>07:00 PM</option>
                                            <option value="19:30" {{ $fechaCita->format('H:i') == '19:30' ? 'selected' : '' }}>07:30 PM</option>
                                            <option value="20:00" {{ $fechaCita->format('H:i') == '20:00' ? 'selected' : '' }}>08:00 PM</option>
                                        </select>
                                    </div>
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
                                        <input type="hidden" name="detalle_id[]" value="{{ $detalle->id }}">
                                            <tr>
                                                <td class="p-4 text-center">
                                                    <select name="diseno[]"
                                                        class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                                                        <option value="1"
                                                            {{ $detalle->design->n_piezas == '1' ? 'selected' : '' }}>
                                                            Una pieza</option>
                                                        <option value="2"
                                                            {{ $detalle->design->n_piezas == '2' ? 'selected' : '' }}>
                                                            Dos piezas</option>
                                                        <option value="3"
                                                            {{ $detalle->design->n_piezas == '3' ? 'selected' : '' }}>
                                                            Tres piezas</option>
                                                        <option value="4"
                                                            {{ $detalle->design->n_piezas == '4' ? 'selected' : '' }}>
                                                            Cuatro piezas</option>
                                                        <option value="6"
                                                            {{ $detalle->design->n_piezas == '6' ? 'selected' : '' }}>
                                                            Seis piezas</option>
                                                        <option value="8"
                                                            {{ $detalle->design->n_piezas == '8' ? 'selected' : '' }}>
                                                            Ocho piezas</option>
                                                    </select>
                                                </td>
                                                <td class="p-4 text-center">
                                                    <select name="material[]"
                                                        class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                                                        <option value="1"
                                                            {{ $detalle->material_id == 1 ? 'selected' : '' }}>Oro 18
                                                            quilates</option>
                                                        <option value="2"
                                                            {{ $detalle->material_id == 2 ? 'selected' : '' }}>Oro 9
                                                            quilates</option>
                                                        <option value="3"
                                                            {{ $detalle->material_id == 3 ? 'selected' : '' }}>Cromo
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="p-4 text-center">
                                                    <input type="number" name="cantidad[]"
                                                        value="{{ $detalle->cantidad }}"
                                                        class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-500 text-base hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer mb-5">
                            Guardar cambios del pedido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
