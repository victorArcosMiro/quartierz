<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-black text-2xl text-center mt-5">Datos del pedido para modificar</div>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-6 text-gray-900 dark:text-gray-100 flex sm:flex-row flex-col justify-around">
                        <div>
                            <div class="flex flex-col items-center justify-center">
                                <div class="text-left">
                                    <p class="mt-4"><strong>ID:</strong> <input type="text" name="pedido_id" value="{{ $pedido->pedido_id }}"></p>
                                    <p class="mt-4"><strong>Fecha Cita:</strong> <input type="text" name="fecha_cita" value="{{ $pedido->fecha_cita }}"></p>

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
                                            <th class="p-4">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detallesPedido as $detalle)
                                            <tr>
                                                <td class="p-4 text-center"><input type="text" name="nombre_design[]" value="{{ $detalle->nombre_design }}"></td>
                                                <td class="p-4 text-center"><input type="text" name="nombre_material[]" value="{{ $detalle->nombre_material }}"></td>
                                                <td class="p-4 text-center"><input type="number" name="cantidad[]" value="{{ $detalle->cantidad }}"></td>
                                                <td class="p-4 text-center"><input type="number" name="precio[]" value="{{ $detalle->precio }}"></td>
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

            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-black text-2xl text-center mt-5">Datos del cliente para modificar</div>
                <form method="POST">
                    @csrf
                    @method('POST')

                    <div class="p-6 text-gray-900 dark:text-gray-100 flex sm:flex-row flex-col justify-around">
                        <div class="flex items-center justify-center">
                            <div class="text-left">
                                <p class="mt-4"><strong>Nombre:</strong>{{ $pedido->nombre_usuario }}</p>
                                <p class="mt-4"><strong>Email:</strong> <input type="text" name="email_usuario" value="{{ $pedido->email_usuario }}"></p>
                                <p class="mt-4"><strong>Teléfono:</strong> <input type="text" name="telefono_usuario" value="{{ $pedido->telefono_usuario }}"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 text-base hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer mb-5">
                            Guardar cambios del cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
