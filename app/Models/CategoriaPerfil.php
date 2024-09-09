<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPerfil extends Model
{

    protected $table = 'categoria_perfils';

    protected $primaryKey = 'idCategoriaPerfil';
    protected $incremeting = true;
    protected $keyType = 'int';

    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */

     protected $fillable = [
        'idCategoria',
        'idPerfil'
     ];

    public function perfils(){
        return $this->belongsToMany(Perfil::class, 'categoria_perfils', 'idCategoria', 'idPerfil');
    }
    use HasFactory;
}
