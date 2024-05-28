<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-3xl text-center mb-5 text-black mt-5">Información del Pedido</h2>
                <form action="{{ route('detalle-pedido-tlf-editar', ['id' => $pedido_tlf->id]) }}" method="POST" class="flex justify-center">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-base hover:bg-blue-700 w-40 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer mx-auto">Editar pedido</button>
                </form>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex sm:flex-row flex-col justify-around">
                    <div>
                        <div class="flex items-center justify-center">
                            <div class="text-left">
                                <p class="mt-4"><strong>ID:</strong> {{ $pedido_tlf->id }}</p>
                                <p class="mt-4"><strong>Fecha Cita:</strong> {{ $pedido_tlf->cita }}</p>
                                <p class="mt-4"><strong>Estado:</strong>
                                    @if($pedido_tlf->estado_pedido_id == 1)
                                        Pendiente de cita
                                    @elseif($pedido_tlf->estado_pedido_id == 2)
                                        Fabricando
                                    @elseif($pedido_tlf->estado_pedido_id == 3)
                                        Pendiente de entrega
                                    @elseif($pedido_tlf->estado_pedido_id == 4)
                                        Entregado
                                    @else
                                        Estado desconocido
                                    @endif
                                </p>
                                <p class="mt-4"><strong>Nombre:</strong> {{ $pedido_tlf->nombre }} {{ $pedido_tlf->apellidos }}</p>
                                <p class="mt-4"><strong>Teléfono:</strong> {{ $pedido_tlf->telefono }}</p>
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
                                            <td class="p-4 text-center">{{ $detalle->design->nombre }}</td>
                                            <td class="p-4 text-center">{{ $detalle->material->material }}</td>
                                            <td class="p-4 text-center">{{ $detalle->cantidad }}</td>
                                            <td class="p-4 text-center">{{ $detalle->precio }}€</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                <div class="text-black text-center my-5 text-xl">Precio Total del Pedido: {{ $precioTotal }}€</div>
            </div>
        </div>
    </div>
</x-app-layout>
