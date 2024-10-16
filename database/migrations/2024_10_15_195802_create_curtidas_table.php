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
        Schema::create('curtidas', function (Blueprint $table) {
            $table->id();
            // Chave estrangeira para o usuário que curtiu a postagem
            $table->foreignId('idUsuario')->constrained()->onDelete('cascade');
            // Chave estrangeira para a postagem que foi curtida
            $table->foreignId('idPostagem')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curtidas');
    }
};
