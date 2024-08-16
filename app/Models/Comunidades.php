<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidades extends Model
{
    protected $fillable = [
        'fotoComunidade',
        'qtddMembros',
        'nomeComunidade',
        'descComunidade',
        'dtCriacaoComunidade'
    ];
    use HasFactory;
}
