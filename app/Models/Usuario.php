<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{

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
    
    public function perfils(){
        return $this->hasMany(Perfil::class, 'idUsuario');
    }

    public function telefone_users(){
        return $this->hasMany(TelefoneUser::class, 'idUsuario');
    }

    public function nivel_users(){
        return $this->belongsTo(NivelUsuario::class, 'idNivelUser');
    }
    
    use HasFactory;
}
