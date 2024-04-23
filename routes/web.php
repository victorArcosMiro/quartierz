<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DesignController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CalendarioController;



Route::get('/', function () {
    return view('index');
});


Route::get('/', function () {
    return view('index');
})->name('inicio-show');

Route::get('/galeria', [DesignController::class, 'showProducts'])->name('galeria-show');

Route::get('/galeria-filtrado-mp', [DesignController::class, 'showProductsFiltradoMp'])->name('galeria-filtrado-mp');

Route::get('/galeria-filtrado-b', [DesignController::class, 'showProductsFiltradoB'])->name('galeria-filtrado-b');

Route::get('/custom', [DesignController::class, 'showCustom'])->name('custom.show');



Route::get('/sobreNosotros', function () {
    return view('sobreNosotros');
})->name('sobreNosotros');

Route::get('/custom', function () {
    return view('custom');
})->name('custom-show');

/* - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO - */

Route::get('/agregar-al-carrito', [CarritoController::class, 'agregarProducto'])->name('carrito.agregar');



Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito.mostrar');


// Ruta para aumentar la cantidad de un producto en el carrito
Route::post('/aumentar-cantidad', [CarritoController::class, 'aumentarCantidad'])->name('aumentarCantidad');

// Ruta para disminuir la cantidad de un producto en el carrito eliminar-fila-carrito
Route::post('/disminuir-cantidad', [CarritoController::class, 'disminuirCantidad'])->name('disminuirCantidad');

Route::delete('/eliminar-cantidad', [CarritoController::class, 'eliminarFilaCarrito'])->name('eliminar-fila-carrito');

// Ruta para vaciar completamente el carrito
Route::post('/vaciar-carrito', [CarritoController::class, 'vaciarCarrito'])->name('vaciar-Carrito');

Route::post('/finalizarReserva', [CarritoController::class, 'finalizarReserva'])->name('finalizarReserva');



/* - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO -  - RUTAS CARRITO - */











/* - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO - */
Route::get('/info-producto-show{id}', [DesignController::class, 'showInfoProducto'])->name('producto.show');
/* - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO - */





/* - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE - */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/* - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE - */



/* - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO - */


Route::get('/calendar', [CalendarioController::class, 'showCurrentMonth'])->name('calendar');


/* - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO - */
