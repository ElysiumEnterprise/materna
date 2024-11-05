<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPost extends Model
{
    protected $table = 'categoria_posts';

    protected $primaryKey = 'idCategoriaPost';
    protected $incrementing = true;
    protected $keyType = 'int';

    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */

    protected $fillable = [
        'idPostagem',
        'idCategoria',
    ];
    use HasFactory;
}
