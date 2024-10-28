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
        $table->foreignId('idUsuario')->constrained('usuarios')->onDelete('cascade');
        $table->foreignId('idPostagem')->constrained('postagens')->onDelete('cascade');
        $table->timestamps();
        $table->unique(['idUsuario', 'idPostagem']); // Evita curtidas duplicadas
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
