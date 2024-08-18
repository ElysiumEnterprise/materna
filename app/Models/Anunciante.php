<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciante extends Model
{

    protected $table = 'anunciantes';

    protected $fillable = ['cnpjAnunciante', 'nomeAnunciante'];
    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
    public $incremeting = true;
    
    use HasFactory;
}
