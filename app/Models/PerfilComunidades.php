<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilComunidades extends Model
{
    protected $table = 'perfil_comunidades';

    protected $primaryKey = 'idPerfilComunidades';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Verificando se o id é auto incrementado
     * @var bool;
     */

     protected $fillable = [
        'idPerfil',
        'idComunidade',
     ];

    //Relacionamentos

    public function comunidades(){
        return $this->belongsTo(Comunidades::class, 'idComunidade');
    }

    public function perfils(){
        return $this->belongsTo(Perfil::class, 'idPerfil');
    }
    use HasFactory;
}
