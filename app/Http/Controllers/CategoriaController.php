<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function getCategorias(){

        $categorias = Categoria::all();

        return response()->json($categorias);

    }
}
