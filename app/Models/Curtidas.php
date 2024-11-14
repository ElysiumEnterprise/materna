<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curtidas extends Model
{
    use HasFactory;
    
    protected $table = 'curtidas';

    protected $primaryKey = 'id';
    protected $incremeting = true;
    protected $keyType = 'int';

    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
    

    protected $fillable = [
        'idUsuario',
        'idPostagem',
    ];

     // Definindo o relacionamento com o usuário
     public function usuario()
     {
         return $this->belongsTo(Usuario::class, 'idUsuario');
     }
 
     // Definindo o relacionamento com o post
     public function postagem()
     {
         return $this->belongsTo(Postagem::class, 'idPostagem');
     }
}
