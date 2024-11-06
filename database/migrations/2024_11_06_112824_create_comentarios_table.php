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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('idComentario');
            $table->unsignedBigInteger('idPerfil');
            $table->unsignedBigInteger('idPostagem');
            $table->string('conteudo',250);
            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');
            $table->foreign('idPostagem')->references('idPostagem')->on('postagems');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
