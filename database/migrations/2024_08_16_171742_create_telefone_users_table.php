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
        Schema::create('telefone_users', function (Blueprint $table) {
            $table->id('idTelefone')->autoIncrement();
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
            $table->char('numTelefone', length: 14);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefone_users');
    }
};
