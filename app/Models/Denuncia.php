<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncias';

    protected $primaryKey = 'idDenuncia';
    protected $incremeting = true;
    protected $keyType = 'int';

    protected $fillable = [
        'motivoDenuncia',
        'denunciaVerificada',
        'idPerfil',
        'detalheDenuncia'
    ];

    public function usuarios(){
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
    use HasFactory;
}
