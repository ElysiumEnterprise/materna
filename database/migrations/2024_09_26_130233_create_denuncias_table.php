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
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id('idDenuncia');
            $table->string('motivoDenuncia', 225);
            $table->boolean('denuciaVerificada');
            $table->unsignedBigInteger('idPerfil');
            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
