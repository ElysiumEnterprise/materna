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
    
    public function perfils(){
        return $this->belongsTo(Perfil::class, 'idPerfilSeguidor');
    }
    use HasFactory;
}
