<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        view()->share('categorias', Categoria::all());
    }
    public function getCategorias(){

        $categorias = Categoria::all();

        return response()->json($categorias);

    }
}
