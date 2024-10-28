<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curtidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUsuario',
        'idPostagem',
    ];

     // Definindo o relacionamento com o usuário
     public function usuario()
     {
         return $this->belongsTo(Usuario::class);
     }
 
     // Definindo o relacionamento com o post
     public function postagem()
     {
         return $this->belongsTo(Postagem::class);
     }
}
