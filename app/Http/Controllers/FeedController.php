<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
   public function go_feed(){
        $user = Auth::user();

        if($user->idNivelUsuario==1){
            return view('home.feed');
        }else if($user->idNivelUsuario==3){
            return view('home.perfilAnunciante');
        }
   }


   
   
}

