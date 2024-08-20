<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfils';

    protected $primaryKey = 'idPerfil';
    protected $keyType = 'string'; 
    
    protected $fillable = [
        'idUsuario',
        'foto',
        'nickname',
        'biography',
        'qtddSeguidores',
        'qtddSeguindo',
    ];
     /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
    
    

     public $incremeting = true;
    use HasFactory;
}
