<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-3xl mt-5">Historial de Pedidos</h1>
                    <form method="POST" class="flex flex-row justify-center my-7" action="{{ route('historial-pedidos-f') }}">
                        @csrf
                        <label for="opciones">Filtrar por:</label>
                        <select id="opciones" name="opciones" onchange="updateInput()">
                            <option value="">Seleccione</option>
                            <option value="todos">Todos</option>
                            <option value="fecha">Fecha</option>
                            <option value="nombre">Nombre</option>
                            <option value="apellido">Apellido</option>
                            <option value="id">ID</option>
                            <option value="telefono">Teléfono</option>
                        </select>
                        <br><br>
                        <label for="inputField">Ingrese el valor:</label>
                        <input id="inputField" name="inputField" type="text">
                        <br><br>
                        <button type="submit" class="bg-blue-500 text-base hover:bg-blue-700 w-20 top-40 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer">Enviar</button>
                    </form>

                    @if ($pedidos->isEmpty())
                        <p>No hay pedidos disponibles.</p>
                    @else
                    <div class="grid justify-center mx-auto">
                        <table class="m-5">
                            <thead>
                                <tr>
                                    <th class="p-4">Pedido ID</th>
                                    <th class="p-4">Nombre</th>
                                    <th class="p-4">Apellido</th>
                                    <th class="p-4">Email</th>
                                    <th class="p-4">Telefono</th>
                                    <th class="p-4">Fecha Cita</th>
                                    <th class="p-4">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $pedido)
                                    <tr class="cursor-pointer"
                                        onclick="if (event.target.tagName.toLowerCase() !== 'select') { event.preventDefault(); document.getElementById('detalle-form-{{ $pedido->id }}').submit(); }">
                                        <form id="detalle-form-{{ $pedido->id }}"
                                            action="{{ route('detalle-pedido', ['id' => $pedido->id]) }}"
                                            method="GET">
                                            <td class="p-4">{{ $pedido->id }}</td>
                                            <td class="p-4">{{ $pedido->user->name }}</td>
                                            <td class="p-4">{{ $pedido->user->surname }}</td>
                                            <td class="p-4">{{ $pedido->user->email }}</td>
                                            <td class="p-4">{{ $pedido->user->phone }}</td>
                                            <td class="p-4">{{ $pedido->cita }}</td>

                                            <td>
                                                <select name="estado_pedido">
                                                    <option value="1" @if($pedido->estado->id == 1) selected @endif>Pendiente de cita</option>
                                                    <option value="2" @if($pedido->estado->id == 2) selected @endif>Fabricando</option>
                                                    <option value="3" @if($pedido->estado->id == 3) selected @endif>Pendiente de entrega</option>
                                                    <option value="4" @if($pedido->estado->id == 4) selected @endif>Entregado</option>
                                                </select>

                                            </td>
                                            <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

