<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    protected $table = 'postagems';
    


    protected $primaryKey = 'idPostagem';
    protected $incremeting = true;
    protected $keyType = 'int';

    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */

    protected $fillable = [
        'idPerfil',
        'descPostagem',
        'fotoPost',
        'dataPost',
        'horaPost',
        'isADD'
    ];


    public function perfils(){
        return $this->belongsTo(Perfil::class, 'idPerfil');
    }

   //Relacionamento dos cometários:
    public function cometarios(){
        return $this->hasMany(Comentarios::class, 'idPostagem');
    }
    use HasFactory;
}
