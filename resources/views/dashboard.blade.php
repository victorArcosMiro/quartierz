<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <h1 class="text-center text-3xl mt-5">Historial de pedidos Web</h1>
                    @include('includes.btn-web-tlf-historial')
                    <form method="POST" id="filterForm" class="" action="{{ route('historial-pedidos-f') }}">
                        @csrf
                        @method('POST')
                        <div style="display: none">
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
                            <label for="inputField">Ingrese el valor:</label>
                            <input id="inputField" name="inputField" type="text">
                            <button type="submit"
                                class="bg-blue-500 text-base hover:bg-blue-700 w-20 top-40 text-white font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline mt-4 cursor-pointer">Enviar</button>
                        </div>
                    </form>

                    @if ($pedidos->isEmpty())
                        <p>No hay pedidos disponibles.</p>
                    @else
                        <div class="grid justify-center mx-auto">
                            <table id="div1" class="m-5">
                                <thead>
                                    <tr>
                                        <th class="p-4 cursor-pointer underline" onclick="showFilterInput('id')">Pedido
                                            ID</th>
                                        <th class="p-4 cursor-pointer underline" onclick="showFilterInput('nombre')">
                                            Nombre</th>
                                        <th class="p-4 cursor-pointer underline" onclick="showFilterInput('apellido')">
                                            Apellido
                                        </th>
                                        <th class="p-4 cursor-pointer underline" onclick="showFilterInput('telefono')">Email</th>
                                        <th class="p-4 cursor-pointer underline" onclick="showFilterInput('telefono')">
                                            Teléfono</th>
                                        <th class="p-4 cursor-pointer underline" onclick="showDateRangeInput()">Fecha Cita</th>

                                        <th class="p-4 cursor-pointer " onclick="showEstadoFilter()">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr class="
                                            @if ($pedido->estado->id == 1) bg-yellow-200
                                            @elseif ($pedido->estado->id == 2) bg-blue-400
                                            @elseif ($pedido->estado->id == 3) bg-purple-400
                                            @elseif ($pedido->estado->id == 4) bg-green-200 @endif
                                        "
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
                                                    <select name="estado_pedido"
                                                        onchange="updateEstado('{{ $pedido->id }}', this.value)">
                                                        <option value="1"
                                                            @if ($pedido->estado->id == 1) selected @endif>Pendiente
                                                            de cita</option>
                                                        <option value="2"
                                                            @if ($pedido->estado->id == 2) selected @endif>Fabricando
                                                        </option>
                                                        <option value="3"
                                                            @if ($pedido->estado->id == 3) selected @endif>Pendiente
                                                            de entrega</option>
                                                        <option value="4"
                                                            @if ($pedido->estado->id == 4) selected @endif>Entregado
                                                        </option>
                                                    </select>
                                                </td>
                                                <input type="hidden" name="pedido_id"
                                                    value="{{ $pedido->pedido_id }}">
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

    <!-- Input oculto -->
    <div id="filterInputContainer" style="display: none;"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg flex flex-row">
            <div class="mt-3">
                <label for="filterInput" class="text-black">Ingrese el valor:</label>
                <input id="filterInput" type="text" class="border p-2 text-black" onkeypress="handleKeyPress(event)">
            </div>
            <button type="button" onclick="hideFilterInput()"
                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 ml-4">
                <span class="sr-only">Cerrar</span>
                <!-- Icono X -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Select de filtro de estado -->
    <div id="estadoFilterContainer" style="display: none;"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg">
            <label for="estadoFilter" class="text-black">Filtrar por Estado:</label>
            <select id="estadoFilter" class="text-black" onchange="filterByEstado(this.value)">
                <option value="">Todos</option>
                <option value="1">Pendiente de cita</option>
                <option value="2">Fabricando</option>
                <option value="3">Pendiente de entrega</option>
                <option value="4">Entregado</option>
            </select>
        </div>
    </div>

    <!-- Contenedor de entrada de rango de fechas -->


    ----

    <div id="dateRangeInputContainer" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg">
            <label for="fechaInicio" class="text-black">Fecha Inicio:</label>
            <input id="fechaInicio" type="date" class="border p-2 text-black">
            <label for="fechaFin" class="text-black">Fecha Fin:</label>
            <input id="fechaFin" type="date" class="border p-2 text-black">
            <button type="button" onclick="filterByDateRange()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded mt-2">Filtrar</button>
            <button type="button" onclick="hideDateRangeInput()" class="bg-gray-500 text-white font-bold py-2 px-4 rounded mt-2">Cerrar</button>
        </div>
    </div>

    <script>
        function showFilterInput(column) {
            document.getElementById('filterInputContainer').style.display = 'flex';
            document.getElementById('filterInput').dataset.column = column;
        }

        function hideFilterInput() {
            document.getElementById('filterInputContainer').style.display = 'none';
        }

        function showDateRangeInput() {
            document.getElementById('dateRangeInputContainer').style.display = 'flex';
        }

        function filterByDateRange() {
            const fechaInicio = document.getElementById('fechaInicio').value;
            const fechaFin = document.getElementById('fechaFin').value;

            if (fechaInicio && fechaFin) {
                document.getElementById('opciones').value = 'fecha';
                document.getElementById('inputField').value = fechaInicio + ',' + fechaFin;
                document.getElementById('filterForm').submit();
            } else {
                alert('Por favor, seleccione tanto la fecha de inicio como la fecha de fin.');
            }
        }

        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                const column = event.target.dataset.column;
                const value = event.target.value;
                document.getElementById('opciones').value = column;
                document.getElementById('inputField').value = value;
                document.getElementById('filterForm').submit();
            }
        }

        function updateEstado(pedidoId, estadoId) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('actualizar-estado-pedido') }}';
            form.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="pedido_id" value="${pedidoId}">
                              <input type="hidden" name="estado_id" value="${estadoId}">`;
            document.body.appendChild(form);
            form.submit();
        }

        function updateEstadoTlf(pedidoTlfId, estadoId) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('actualizar-estado-pedido-tlf') }}';
            form.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="pedido_tlf_id" value="${pedidoTlfId}">
                              <input type="hidden" name="estado_id" value="${estadoId}">`;
            document.body.appendChild(form);
            form.submit();
        }

        function showEstadoFilter() {
            document.getElementById('estadoFilterContainer').style.display = 'flex';
        }

        function filterByEstado(estadoId) {
            document.getElementById('opciones').value = 'estado';
            document.getElementById('inputField').value = estadoId;
            document.getElementById('filterForm').submit();
        }
    </script>
</x-app-layout>
