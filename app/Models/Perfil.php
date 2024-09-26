<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfils';

    protected $primaryKey = 'idPerfil';
    public $incremeting = true;
    protected $keyType = 'int'; 
    
    protected $fillable = [
        'idUsuario',
        'fotoPerfil',
        'nickname',
        'biography',
        'qtddSeguidores',
        'qtddSeguindo',
    ];
     /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
    
    public function usuarios(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function postagems(){
        return $this->hasMany(Postagem::class, 'idPerfil');
    }

    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'categoria_perfils', 'idCategoria', 'idPerfil');;
    }

    
    use HasFactory;
}
