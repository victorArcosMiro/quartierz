<script>
    //Script para restringir al usuario seleccionar sabados o domingos
    document.addEventListener('DOMContentLoaded', function() {
        var fechaInput = document.getElementById('fecha');
        var horaSelect = document.getElementById('hora');
        var reservaBoton = document.getElementById('reservar');

        fechaInput.addEventListener('change', function() {
            var fechaSeleccionada = new Date(this.value);
            var diaSemana = fechaSeleccionada
        .getDay(); // Obtiene el día de la semana (0 para Domingo, 1 para Lunes, ..., 6 para Sábado)

            // Array de festivos en Zaragoza 2024 (formato: mes-día)
            var festivos = ['01-01', '01-06', '03-28', '03-29', '04-23', '05-01', '08-15', '10-12',
                '11-01', '12-06', '12-09', '12-25'
            ];

            // Formatea la fecha seleccionada en formato mes-día (MM-DD)
            var fechaFormateada = ('0' + (fechaSeleccionada.getMonth() + 1)).slice(-2) + '-' + ('0' +
                fechaSeleccionada.getDate()).slice(-2);

            // Verifica si la fecha seleccionada es un sábado (6) o un domingo (0), o si es un festivo en Zaragoza 2024
            if (diaSemana === 0 || diaSemana === 6 || festivos.includes(fechaFormateada)) {
                alert(
                    'La fecha seleccionada es un festivo en Zaragoza o un sábado/domingo. Por favor, elige otra fecha.');
                horaSelect.disabled = true;
                reservaBoton.setAttribute("disabled", "true");
                horaSelect.value = ''; // Resetea la selección de hora
            } else {
                horaSelect.disabled = false;
                reservaBoton.removeAttribute("disabled");
            }
        });
    });
</script>
