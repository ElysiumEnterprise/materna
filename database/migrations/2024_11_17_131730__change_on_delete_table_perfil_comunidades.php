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
        Schema::table('perfil_comunidades', function (Blueprint $table) {
            $table->dropForeign(['idPerfil']);
            $table->dropForeign(['idComunidade']);

            $table->foreign('idPerfil')->references('idPerfil')->on('perfils')->onDelete('cascade');

            $table->foreign('idComunidade')->references('idComunidade')->on('comunidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfil_comunidades', function (Blueprint $table) {
            $table->dropForeign(['idPerfil']);
            $table->dropForeign(['idComunidade']);

            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');

            $table->foreign('idComunidade')->references('idComunidade')->on('comunidades');
        });
    }
};
