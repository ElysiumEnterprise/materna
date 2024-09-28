<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    public function aceitarDenuncia($idDenuncia){

        $denuncia = Denuncia::find($idDenuncia);

        $denuncia->denuciaVerificada = 1;
        $denuncia->update();

        return redirect()->back()->with('message', "Denúncia de ID ". $idDenuncia. " verificada!");
    }

    public function recusarDenuncia($idDenuncia){

        $denuncia = Denuncia::find($idDenuncia);

        $denuncia->delete();

        return redirect()->back()->with('message', "Denúncia de ID ". $idDenuncia. " deleteda!");
    }
}
