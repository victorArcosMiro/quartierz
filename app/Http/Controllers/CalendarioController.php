<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function showCurrentMonth()
    {
        // Obtener el mes actual y el año actual
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Crear una instancia de Carbon para el primer día del mes actual
        $firstDayOfMonth = Carbon::create($currentYear, $currentMonth, 1);

        // Crear una matriz para almacenar los días del mes actual
        $calendar = [];

        // Agregar días vacíos al principio del mes si el primer día no es domingo
        if ($firstDayOfMonth->dayOfWeek != Carbon::SUNDAY) {
            $calendar[] = array_fill(0, $firstDayOfMonth->dayOfWeek, null);
        }

        // Agregar todos los días del mes actual
        while ($firstDayOfMonth->month == $currentMonth) {
            $calendar[$firstDayOfMonth->weekOfMonth][] = $firstDayOfMonth->day;
            $firstDayOfMonth->addDay();
        }

        // Rellenar los últimos días de la última semana si no es sábado
        if ($firstDayOfMonth->dayOfWeek != Carbon::SATURDAY) {
            $calendar[] = array_fill(count($calendar), 7 - $firstDayOfMonth->dayOfWeek, null);
        }

        return view('calendar', compact('calendar', 'currentMonth', 'currentYear'));
    }
}
