<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visualizacoes extends Model
{
    protected $table = 'visualizacoes';

    protected $primaryKey = 'idVisualizacao';
    protected $keyType = 'int';
    protected $incremeting = true;

    protected $fillable = [
        'idPerfil',
        'idPostagem',
    ];

    /**
     * Verrificando se é auto-incrementado
     * @var bool;
     */
}
