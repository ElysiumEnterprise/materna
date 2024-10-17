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
        Schema::create('perfil_comunidades', function (Blueprint $table) {
            $table->id('idPerfilComunidades');
            $table->unsignedBigInteger('idPerfil');
            $table->unsignedBigInteger('idComunidade');
            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');
            $table->foreign('idComunidade')->references('idComunidade')->on('comunidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_comunidades');
    }
};
