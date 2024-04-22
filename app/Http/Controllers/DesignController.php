<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;

class DesignController extends Controller
{
   public function showProducts(){
    $productsList = Design::all();
    return view('galeria',['productsList' => $productsList]);
   }


   public function showProductsFiltradoMp(Request $request)
   {
       // Obtener los valores del formulario
       $precio = $request->input('precio');
       $piezas = $request->input('piezas');
       $material = $request->input('material');

       // Construir la consulta base sin filtros
       $query = Design::query();

       // Aplicar los filtros solo si los valores no son 0
       if ($piezas != 0) {
           $query->where('n_piezas', '=', $piezas);
       }

       if ($material != 0) {
           $query->where('material_id', '=', $material);
       }

       // Ordenar los resultados por precio si el valor de precio no es 0
       if ($precio == 1) {
           $query->orderByDesc('precio');
       } elseif ($precio == 2) {
           $query->orderBy('precio');
       }

       // Obtener los resultados
       $productsList = $query->get();

       // Retornar la vista con los resultados de la búsqueda
       return view('galeria', ['productsList' => $productsList]);
   }

   public function showProductsFiltradoB(Request $request)
{
    // Obtener el término de búsqueda del formulario
    $searchTerm = $request->input('search');

    // Dividir el término de búsqueda en palabras clave
    $keywords = explode(' ', $searchTerm);

    // Inicializar una consulta para la búsqueda
    $query = Design::query();

    // Iterar sobre las palabras clave para agregar condiciones a la consulta
    foreach ($keywords as $keyword) {
        // Buscar en el nombre del producto
        $query->orWhere('nombre', 'like', '%' . $keyword . '%');

        // Buscar en el material del producto
        $query->orWhere('material', 'like', '%' . $keyword . '%');

        // Buscar en el número de piezas del producto
        $query->orWhere('n_piezas', 'like', '%' . $keyword . '%');
    }

    // Obtener los resultados de la consulta
    $productsList = $query->get();

    // Retornar la vista con los resultados de la búsqueda
    return view('galeria', ['productsList' => $productsList]);
}

public function showInfoProducto($id) {
    $p = Design::find($id);

    return view('showInfo', ['design' => $p]);
}


}
