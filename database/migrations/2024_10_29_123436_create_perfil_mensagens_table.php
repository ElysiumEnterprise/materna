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
        Schema::create('perfil_mensagens', function (Blueprint $table) {
            $table->id('idPerfilMensagens');
            $table->unsignedBigInteger('idPerfilEmissor');
            $table->foreign('idPerfilEmissor')->references('idPerfil')->on('perfils');
            $table->unsignedBigInteger('idPerfilReceptor');
            $table->unsignedBigInteger('idMensagem');
            $table->foreign('idPerfilReceptor')->references('idPerfil')->on('perfils');
            $table->foreign('idMensagem')->references('idMensagem')->on('mensagens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_mensagens');
    }
};
