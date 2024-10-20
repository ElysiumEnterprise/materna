<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguidores extends Model
{
    protected $table= 'seguidores';

    protected $primaryKey = 'idSeguidor';
    public $incremeting = true;
    protected $keyType = 'int';

    protected $fillable = [
        'idPerfilSeguidor',
        'idPerfilSeguindo'
    ];

    /** 
     * @var bool;
    */
    //Perfils que está sendo seguidos

    public function perfilSeguidor(){
        return $this->belongsTo(Perfil::class, 'idPerfilSeguidor', 'idPerfil');
    }

    //Perfils que este perfil segue
    public function seguindo(){
        return $this->belongsTo(Perfil::class, 'idPerfilSeguindo','idPerfil');
    }
    use HasFactory;
}
