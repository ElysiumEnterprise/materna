<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagens extends Model
{
    use HasFactory;

    protected $table = 'postagens'; // Define a tabela como 'postagens'

    // Relacionamento belongsToMany com a tabela intermediária
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_posts', 'idPostagem', 'idCategoria');
    }
}

