<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $table = 'categorias';

    protected $primaryKey = 'idCategoria';
    protected $incremeting = true;
    protected $keyType = 'int';
    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */

    protected $fillable = [
        'nomeCategoria',
    ];

    public function postagems(){
        return $this->belongsToMany(Postagem::class, 'categoria_posts', 'idCategoria', 'idPostagem');
    }

    use HasFactory;
}
