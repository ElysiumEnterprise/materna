<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefoneUser extends Model
{
    protected $table = 'telefone_users';
   
    protected $primaryKey = 'idTelefone';
    public $incremeting = true;
    protected $keyType = 'int'; 
    
    protected $fillable = [
        'idUsuario',
        'numTelefone'
    ];

    public function usuarios(){
        return $this->belongsTo(Usuario::class,'idUsuario');
    }
    use HasFactory;
}
