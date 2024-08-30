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
    

     /*protected static function boot(){
        parent::boot();

        static::deleting(function($perfil){
            $usuario = $perfil->usuarios;

            if ($usuario){
                //Deletar o usuário e telefone associado
                $usuario->telefone_users->delete();
                $usuario->delete();
            }
        });
     }*/
    public function usuarios(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function postagems(){
        return $this->hasMany(Postagem::class, 'idPerfil');
    }
    use HasFactory;
}
