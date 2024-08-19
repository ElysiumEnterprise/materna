<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'telefone_users';
    
    protected $fillable = [
        'idUsuario',
        'foto',
        'nickname',
        'biography',
        'qtddSeguidores',
        'qtddSeguindo'
    ];
    use HasFactory;
}
