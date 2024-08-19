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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id('idPerfil');
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
            $table->binary('foto')->nullable();
            $table->string('nickname');
            $table->string('biography')->default('Olá, muito prazer! Seja bem vindo(a) ao meur perfil');
            $table->bigInteger('qtddSeguidores')->default(0);
            $table->bigInteger('qtddSeguindo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};
