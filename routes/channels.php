<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{idUsuario}', function(Usuario $user, $idUsuario){
    
    return (int)$user->idUsuario === (int)$idUsuario ;
});