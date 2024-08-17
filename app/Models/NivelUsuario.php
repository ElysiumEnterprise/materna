<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelUsuario extends Model
{
    protected $table = 'nivel_usuarios';

    protected $fillable = ['descNivel'];
    use HasFactory;
}
