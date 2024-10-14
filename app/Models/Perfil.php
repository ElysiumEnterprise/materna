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
        'bannerPerfil',
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
    //Perfils que está seguindo esse perfils
    public function seguidores(){
        return $this->belongsToMany(Perfil::class, 'seguidores', 'idPerfilSeguindo', 'idPerfilSeguidor', 'idPerfil', 'idPerfil');
    }

    //Perfils que este perfils está seguindo

    public function seguindo(){
        return $this->belongsToMany(Perfil::class, 'seguidores', 'idPerfilSeguidor', 'idPerfilSeguindo', 'idPerfil', 'idPerfil');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($perfil){
            //Deleta as postagens
            $perfil->usuarios()->delete();

            //Deleta as postagens

            $perfil->postagems()->delete();

            //Deletagem de categorias

            $perfil->categorias()->delete();
        });
    }
    use HasFactory;
}
