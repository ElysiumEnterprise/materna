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
        Schema::table('postagems', function (Blueprint $table) {
            // Remover a chave estrangeira existente
            $table->dropForeign(['idPerfil']);

            // Adicionar novamente a chave estrangeira com onDelete('cascade')
            $table->foreign('idPerfil')
                ->references('idPerfil')
                ->on('perfils')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postagems', function (Blueprint $table) {
            // Remover a chave estrangeira com onDelete('cascade')
            $table->dropForeign(['idPerfil']);

            // Adicionar novamente a chave estrangeira sem onDelete('cascade')
            $table->foreign('idPerfil')
                ->references('idPerfil')
                ->on('perfils');
        });
    }
};
