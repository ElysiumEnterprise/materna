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
        Schema::table('perfils', function (Blueprint $table) {
            // Exemplo: Alterar a coluna 'name' para permitir até 255 caracteres
            $table->string('fotoPerfil', 255)->nullable(false)->default('user-icon-default.png')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfils', function (Blueprint $table) {
            // Reverter a alteração se necessário
            $table->string('fotoPerfil', 255)->nullable()->change();
        });
    }
};
