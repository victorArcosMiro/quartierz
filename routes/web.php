<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DesignController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\FiltrosPedidosController;
use App\Http\Controllers\PedidiosTlfController;



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






// RUTAS PEDIDOS
Route::get('/detalle-pedido/{id}', [FiltrosPedidosController::class,'mostrarDetallesPedido'])->name('detalle-pedido');

Route::get('/detalle-pedido-tlf/{id}', [FiltrosPedidosController::class, 'mostrarDetallesPedidoTlf'])->name('detalle-pedido-tlf');


Route::post('/historial-pedidos-f', [FiltrosPedidosController::class, 'mostrarPedidosFiltrados'])->name('historial-pedidos-f');

Route::get('/historial-pedidos-tlf', [FiltrosPedidosController::class, 'historialPedidosTlf'])->name('historial-pedidos-tlf');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/historial-pedidos', [FiltrosPedidosController::class, 'historialPedidos'])->name('historial-pedidos');
});


Route::post('/detalle-pedido-editar/{id}', [FiltrosPedidosController::class,'mostrarDetallesPedidoEditar'])->name('detalle-pedido-editar');

Route::post('/detalle-pedido-tlf-editar/{id}', [FiltrosPedidosController::class,'mostrarDetallesPedidoTlfEditar'])->name('detalle-pedido-tlf-editar');


Route::put('/actualizar-pedido/{id}', [PedidosController::class, 'actualizarPedido'])->name('actualizar-pedido');

Route::post('/actualizar-estado-pedido', [PedidosController::class, 'actualizarEstado'])->name('actualizar-estado-pedido');

Route::post('/actualizar-estado-pedido-tlf', [PedidosController::class, 'actualizarEstadoTlf'])->name('actualizar-estado-pedido-tlf');

Route::put('/actualizar-pedido-tlf/{id}', [PedidosController::class, 'actualizarPedidoTlf'])
    ->name('actualizar-pedido-tlf');

Route::post('/historial-pedidos-tlf-f', [FiltrosPedidosController::class, 'mostrarPedidosTlfFiltrados'])->name('historial-pedidos-tlf-f');


// RUTAS PEDIDIOS TELEFÓNICOS


Route::post('/add-producto-tlf', [PedidiosTlfController::class, 'addProductoTlf'])->name('add-producto-tlf');
Route::post('/eliminar-producto-tlf', [PedidiosTlfController::class, 'eliminarProductoTlf'])->name('eliminar-producto-tlf');
Route::post('/vaciar-productos-tlf', [PedidiosTlfController::class, 'vaciarProductosTlf'])->name('vaciar-productos-tlf');
// Ruta para crear un nuevo pedido por teléfono
Route::post('/guardar-pedido-tlf', [PedidiosTlfController::class, 'guardarPedido'])->name('guardar-pedido-tlf');

    Route::get('/pedido-telefono', function () {
        return view('pedido-telefono');
    })->name('pedido-telefono');









//FILTROS-PEDIDOS-ADMIN



/* - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO - */
Route::get('/info-producto-show{id}', [DesignController::class, 'showInfoProducto'])->name('producto.show');
/* - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO -  - RUTAS PRODUCTO - */





/* - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE - */




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/* - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE -  - RUTAS BREEZE - */


/* - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO -  - RUTAS CALENDARIO - */
Route::get('/helloworld', function () {
    return view('helloworld');
})->name('helloworld');
