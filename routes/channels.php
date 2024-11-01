<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;

Broadcast::channel('chat.{idUsuario}', function(Usuario $user, $idUsuario){
    
    return (int)$user->idUsuario === (int)$idUsuario ;
});