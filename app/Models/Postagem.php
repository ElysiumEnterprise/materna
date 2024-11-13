<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    protected $table = 'postagems';
    


    protected $primaryKey = 'idPostagem';
    protected $incremeting = true;
    protected $keyType = 'int';

    /**
     * 
     * Verificando se o id é auto-incrementado

        *@var bool;
     * 
     */

    protected $fillable = [
        'idPerfil',
        'descPostagem',
        'fotoPost',
        'dataPost',
        'horaPost',
        'isADD'
    ];


    public function perfils(){
        return $this->belongsTo(Perfil::class, 'idPerfil');
    }

   //Relacionamento dos cometários:
    public function comentarios(){
        return $this->hasMany(Comentarios::class, 'idPostagem');
    }
    //Relacionamento com a tabela visualizações
    public function visualizacoes(){
        return $this->hasMany(Visualizacoes::class, 'idPostagem', 'idPostagem');
    }

    public function curtidas()
    {
        return $this->hasMany(Curtidas::class, 'idPostagem');
    }

    public function categorias(){
        return $this->hasMany(CategoriaPost::class, 'idPostagem');
    }

    protected static function boot()
    {
        parent::boot();

        //Caso delete um post, deletará seus comentários e, visualizações e curtidas
        static::deleting(function($postagem){
            //Deletar seus comentários
            $postagem->comentarios()->delete();

            //Deletar suas visualizações
            $postagem->visualizacoes()->delete();

            //Deletagem de curtidas
            $postagem->curtidas()->delete();

            $postagem->categorias()->delete();
        });
    }
    use HasFactory;
}
