<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagens extends Model
{
    protected $table = 'postagens'; // Define a tabela como 'postagens'
    
    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categoria_posts', 'idCategoria', 'idPostagem');
    }
    

    use HasFactory;
}
