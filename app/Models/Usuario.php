<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = 'usuarios';
    
    protected $fillable = [
        'nome',
        'dtNasc',
        'email',
        'senha',
        'idNivelUsuario'
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
