<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="text-black text-2xl text-center">Añade los productos</div>
                <!-- Formulario para agregar producto -->
                <form action="{{ route('add-producto-tlf') }}" method="POST" class="">
                    @csrf
                    @method('POST')
                    <label class="text-black" for="material">Material:</label>
                    <select name="material" id="material" class="w-56 text-black">
                        <option class="text-black" value="1">Oro 18k</option>
                        <option class="text-black" value="2">Oro 9k</option>
                        <option class="text-black" value="3">Cromo</option>
                    </select>

                    <label class="text-black" for="npiezas">Nº Piezas:</label>
                    <select name="npiezas" id="npiezas" class="text-black">
                        <option class="text-black" value="1">1</option>
                        <option class="text-black" value="2">2</option>
                        <option class="text-black" value="3">3</option>
                        <option class="text-black" value="4">4</option>
                        <option class="text-black" value="6">6</option>
                        <option class="text-black" value="8">8</option>
                    </select>

                    <button type="submit"
                        class="mr-8 flex flex-wrap float-end focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Agregar</button>
                </form>

                <!-- Formulario para eliminar el último producto -->
                <div>
                    <form action="{{ route('eliminar-producto-tlf') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit"
                            class="mr-8 flex flex-wrap float-end focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Eliminar
                            Último</button>
                    </form>

                    <!-- Formulario para vaciar la lista -->
                    <form action="{{ route('vaciar-productos-tlf') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit"
                            class="mr-8 flex flex-wrap float-end focus:outline-none text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Vaciar</button>
                    </form>
                </div>
            </div>
            <div class=" bg-white mt-4 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="text-black text-2xl text-center">Datos del cliente</div>
                <form action="{{ route('guardar-pedido-tlf') }}" method="POST">
                    @csrf
                    <div class="mt-5 text-black">
                        <label class="text-black" for="nombre">Nombre:</label>
                        <input type="text" class="text-black" id="nombre" name="nombre" required>

                        <label class="text-black" for="apellidos">Apellidos:</label>
                        <input type="text" class="text-black" id="apellidos" name="apellidos" required>

                        <label class="text-black" for="telefono">Teléfono:</label>
                        <input type="number" class="text-black" id="telefono" name="telefono" required>
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                   @include('includes.fecha-hora')
                </form>
                @include('includes.js-fecha-hora')
            </div>
        </div>

        <!-- Sección para mostrar los diseños guardados en la sesión -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="text-black text-2xl text-center">Productos añadidos</div>

                <div class="flex flex-col w-max mt-10">
                    @php
                        $designIds = session('design_ids', []);
                    @endphp

                    @if (count($designIds) > 0)
                        <ul>
                            @foreach ($designIds as $designId)
                                @php
                                    $design = DB::table('design')->find($designId);
                                @endphp
                                @if ($design)
                                    <li class="text-black">
                                        {{ $design->nombre }} - {{ $design->nombre_material }} -
                                        <img src="{{ asset('images/' . $design->imagen_design) }}"
                                            alt="{{ $design->nombre }}" width="100">
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <p class="text-black">No hay diseños en el carrito.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
