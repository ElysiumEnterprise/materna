<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefoneUser extends Model
{
    protected $table = 'telefone_users';
    
    protected $fillable = [
        'idUsuario',
        'numTelefone'
    ];
    use HasFactory;
}
