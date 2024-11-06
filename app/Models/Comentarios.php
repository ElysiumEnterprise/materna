<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = 'comentarios';

    protected $primaryKey = 'idComentario';
    protected $incremeting = true;
    protected $keyType = 'int';

    protected $fillable = [
        'idPerfil',
        'idPostagem',
        'conteudo',
    ];

     /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */

    public function perfils(){
       return $this->belongsTo(Perfil::class, 'idPerfil');
    }

    public function postagems(){

        return $this->belongsTo(Postagem::class, 'idPostagem');
        
    }
}
