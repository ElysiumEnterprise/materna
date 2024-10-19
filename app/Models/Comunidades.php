<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidades extends Model
{

    protected $table = 'comunidades';

    protected $primaryKey = 'idComunidade';
    public $incremeting = true;
    protected $keyType = 'int';
    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
    protected $fillable = [
        'fotoComunidade',
        'qtddMembros',
        'nomeComunidade',
        'descComunidade',
        'dtCriacaoComunidade',
        'idPerfilCriador'
    ];

    public function perfilCriador(){
        return $this->belongsTo(Perfil::class, 'idPerfilCriador');
    }

    public function perfilMembros(){
        return $this->belongsToMany(Perfil::class, 'perfil_comunidades', 'idPerfil', 'idComunidade');
    }
    public function categorias(){
        return $this->belongsToMany(Categoria::class, 'comunidades_categorias', 'idCategoria', 'idComunidade');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($comunidade){
            //Deleta as suas categorias
            $comunidade->categorias()->delete();
        });
    }
    use HasFactory;
}
