<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    protected $table = 'postagems';

    protected $primaryKey = 'idPostagem';
    protected $incrementing = true;
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
        'dataPost',
        'horaPost',
    ];


    public function perfils(){
        return $this->belongsTo(Perfil::class, 'idPerfil');
    }

    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categoria_posts', 'idCategoria', 'idPostagem');
    }

    use HasFactory;
}
