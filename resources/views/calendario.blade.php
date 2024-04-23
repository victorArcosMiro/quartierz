<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario del mes actual</title>
    <!-- Agrega aquí tus estilos CSS si es necesario -->
</head>
<body>
    <h1>Calendario del mes de {{ $currentMonth }} de {{ $currentYear }}</h1>
    <table>
        <thead>
            <tr>
                <th>Domingo</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendar as $week)
            <tr>
                @foreach ($week as $day)
                <td>{{ $day }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Aquí puedes agregar cualquier otro contenido que necesites -->
</body>
</html>
