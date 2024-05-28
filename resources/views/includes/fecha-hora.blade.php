<div class="mb-4">
    <label for="fecha" class="block text-white text-sm font-bold mb-2">Selecciona un día:</label>
    <input type="date" id="fecha" name="fecha"
        class="w-full bg-gray-200 text-black border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
        required>
</div>
<div class="mb-4">
    <label for="hora" class="block text-white text-sm font-bold mb-2">Selecciona una hora:</label>
    <select id="hora" name="hora"
        class="text-black w-full bg-gray-200 border border-gray-400 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
        required>
        <option value="" disabled selected>Selecciona una hora</option>
        <option value="16:00">04:00 PM</option>
        <option value="16:30">04:30 PM</option>
        <option value="17:00">05:00 PM</option>
        <option value="17:30">05:30 PM</option>
        <option value="18:00">06:00 PM</option>
        <option value="18:30">06:30 PM</option>
        <option value="19:00">07:00 PM</option>
        <option value="19:30">07:30 PM</option>
        <option value="20:00">08:00 PM</option>
    </select>
</div>
<div>
    <button type="submit" id="reservar"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reservar
        cita</button>
</div>
