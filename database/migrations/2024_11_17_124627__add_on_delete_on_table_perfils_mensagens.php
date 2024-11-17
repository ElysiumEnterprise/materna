<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('perfil_mensagens', function (Blueprint $table) {
            // Remover as chaves estrangeiras existentes
            $table->dropForeign(['idPerfilEmissor']);
            $table->dropForeign(['idPerfilReceptor']);
            $table->dropForeign(['idMensagem']);

            // Adicionar as chaves estrangeiras novamente com onDelete('cascade')
            $table->foreign('idPerfilEmissor')
                ->references('idPerfil')
                ->on('perfils')
                ->onDelete('cascade');

            $table->foreign('idPerfilReceptor')
                ->references('idPerfil')
                ->on('perfils')
                ->onDelete('cascade');

            $table->foreign('idMensagem')
                ->references('idMensagem')
                ->on('mensagens')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfil_mensagens', function (Blueprint $table) {
           // Remover as chaves estrangeiras com onDelete('cascade')
           $table->dropForeign(['idPerfilEmissor']);
           $table->dropForeign(['idPerfilReceptor']);
           $table->dropForeign(['idMensagem']);

           // Adicionar novamente as chaves estrangeiras sem onDelete('cascade')
           $table->foreign('idPerfilEmissor')
               ->references('idPerfil')
               ->on('perfils');

           $table->foreign('idPerfilReceptor')
               ->references('idPerfil')
               ->on('perfils');

           $table->foreign('idMensagem')
               ->references('idMensagem')
               ->on('mensagens');
        });
    }
};
