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
        Schema::create('seguidores', function (Blueprint $table) {
            $table->id('idSeguidor');
            $table->unsignedBigInteger('idPerfilSeguidor');
            $table->foreign('idPerfilSeguidor')->references('idPerfil')->on('perfils');
            $table->unsignedBigInteger('idPerfilSeguindo');
            $table->foreign('idPerfilSeguindo')->references('idPerfil')->on('perfils');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguidores');
    }
};
