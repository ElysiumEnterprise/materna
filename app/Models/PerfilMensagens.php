<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilMensagens extends Model
{
    protected $table = 'perfil_mensagens';

    protected $primaryKey = 'idPerfilMensagens';
    protected $incremeting = true;
    protected $keyType = 'int';

    protected $fillable = [
        'idPerfilEmissor',
        'idPerfilReceptor',
        'idMensagem'
    ];
     /**
     * Verificando se o id é auto incrementado
     * @var bool;
     */
    
    use HasFactory;
}
