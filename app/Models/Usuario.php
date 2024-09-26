<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
     use Notifiable;
     
    protected $table = 'usuarios';
    
    protected $primaryKey = 'idUsuario';
    public $incremeting = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nome',
        'dtNasc',
        'email',
        'senha',
        'idNivelUsuario'
    ];
    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
    
    public function perfils():HasOne{
        return $this->hasOne(Perfil::class, 'idUsuario');
    }

    public function telefone_users(){
        return $this->hasMany(TelefoneUser::class, 'idUsuario');
    }

    public function nivel_usuarios(){
        return $this->belongsTo(NivelUsuario::class, 'idNivelUsuario');
    }
    
    public function anunciantes(){
        return $this->hasOne(Anunciante::class, 'idUsuario');
    }
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(){
        return $this->senha;
    }
    public function denuncias(){
        return $this->hasMany(Denuncia::class, 'idUsuario');
    }
    use HasFactory;
}
