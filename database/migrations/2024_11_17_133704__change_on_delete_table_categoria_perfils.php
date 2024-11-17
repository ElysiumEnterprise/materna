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
        Schema::table('categoria_perfils', function (Blueprint $table) {
            $table->dropForeign(['idPerfil']);
            $table->dropForeign(['idCategoria']);

            $table->foreign('idPerfil')->references('idPerfil')->on('perfils')->onDelete('cascade');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categoria_perfils', function (Blueprint $table) {
            $table->dropForeign(['idPerfil']);
            $table->dropForeign(['idCategoria']);

            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
        });
    }
};
