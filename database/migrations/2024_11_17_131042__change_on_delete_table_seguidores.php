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
        Schema::table('seguidores', function (Blueprint $table) {
            $table->dropForeign(['idPerfilSeguidor']);
            $table->dropForeign(['idPerfilSeguindo']);

            $table->foreign('idPerfilSeguidor')->references('idPerfil')->on('perfils')->onDelete('cascade');
            $table->foreign('idPerfilSeguindo')->references('idPerfil')->on('perfils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seguidores', function (Blueprint $table) {
            $table->dropForeign(['idPerfilSeguidor', 'idPerfilSeguindo']);

            $table->foreign('idPerfilSeguidor')->references('idPerfil')->on('perfils');
            $table->foreign('idPerfilSeguindo')->references('idPerfil')->on('perfils');
        });
    }
};
