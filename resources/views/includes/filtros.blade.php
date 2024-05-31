 <div class="filters mt-4 flex flex-col justify-between dir items-center gap-4">
    <form class="search-bar w-full md:w-1/2 mt-2 md:mt-0 text-black flex "action="{{ route('galeria-filtrado-b') }}"
                method="GET">
                <input type="text" name="search" placeholder="Buscar por nombre" class="p-2  w-full" />
                <input type="submit" value="Buscar" name="busqueda_nombre" class="p-2 bg-zinc-700 text-white"></input>
            </form>
            <form class="w-full text-black flex flex-col" action="{{ route('galeria-filtrado-mp') }}"
                method="GET">
                <div>
                    <label class="text-white"for="price">Precio:</label>
                    <select name="precio" id="price" class="w-full text-black p-2">
                        <option value="0" selected>Selecciona un rango de precio</option>
                        <option value="1">De mas alto a mas bajo.</option>
                        <option value="2">De mas bajo a mas alto.</option>
                    </select>
                </div>

                <div>
                    <label class="text-white" for="material">Material:</label>
                    <select name="material" class="w-full text-black p-2">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="1">Oro 18K</option>
                        <option value="2">Oro 9K</option>
                        <option value="3">Cromo</option>
                    </select>
                </div>

                <div>
                    <label class="text-white" for="material">Piezas:</label>
                    <select name="piezas" class="w-full text-black p-2">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="1">1 Pieza</option>
                        <option value="2">2 Piezas</option>
                        <option value="3">3 Piezas</option>
                        <option value="4">4 Piezas</option>
                        <option value="8">6 Piezas</option>
                        <option value="8">8 Piezas</option>
                    </select>
                </div>

                <input class="w-full  bg-zinc-700 text-white" type="submit" name="busqueda_precio_material" value="Buscar">

            </form>



        </div>
