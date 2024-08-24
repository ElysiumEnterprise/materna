<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelUsuario extends Model
{
    protected $table = 'nivel_usuarios';
    
    protected $primaryKey = 'idNivelUsuario';
    public $incremeting = true;
    protected $keyType = 'int';

    protected $fillable = ['descNivel'];

    public function usuarios(){
        return $this->hasMany(Usuario::class, 'idUsuario');
    }
    use HasFactory;
}
