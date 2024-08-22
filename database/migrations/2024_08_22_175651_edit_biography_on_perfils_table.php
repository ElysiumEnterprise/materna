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
            $table->string('biography', 255)->nullable()->default('Nova(o) na Materna')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfils', function (Blueprint $table) {
            // Reverter a alteração se necessário
            $table->string('biography', 255)->nullable()->change();
        });
    }
};
