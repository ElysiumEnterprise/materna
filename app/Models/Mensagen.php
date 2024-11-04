<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagen extends Model
{
    protected $table = 'mensagens';

    protected $primaryKey = 'idMensagem';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'conteudoMensagem',
        'dataEnvio',
        'statusLeitura'
    ];
    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */
    //Perfil que enviou a mensagem
    public function emissores(){
        return $this->belongsToMany(Perfil::class, 'perfil_mensagens', 'idMensagem', 'idPerfilEmissor');
    }

    //Perfil que recebeu a mensagem
    public function receptores(){
        return $this->belongsToMany(Perfil::class, 'perfil_mensagens', 'idMensagem', 'idPerfilReceptor');
    }
    use HasFactory;
}
