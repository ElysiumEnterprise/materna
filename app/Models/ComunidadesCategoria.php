<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunidadesCategoria extends Model
{
    protected $table = 'comunidades_categorias';
    
    protected $primaryKey = 'idComunidadesCategoria';
    public $incremeting = true;
    protected $keyType = 'int';

    protected $fillable = [
        'idComunidade',
        'idCategoria'
    ];
    /**
     * Verificando se o id é auto-incrementado
     * @var bool;
    */
    use HasFactory;
}
