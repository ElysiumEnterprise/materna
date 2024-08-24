<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciante extends Model
{

    protected $table = 'anunciantes';

    protected $primaryKey = 'idAnunciante';
    public $incremeting = true;
    protected $keyType = 'int'; 

    protected $fillable = ['cnpjAnunciante', 'nomeAnunciante'];
    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
   
    public function usuarios(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
    use HasFactory;
}
