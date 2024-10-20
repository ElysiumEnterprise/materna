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
        Schema::create('comunidades_categorias', function (Blueprint $table) {
            $table->id('idComunidadesCategoria');
            $table->unsignedBigInteger('idComunidade');
            $table->foreign('idComunidade')->references('idComunidade')->on('comunidades');
            $table->unsignedBigInteger('idCategoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidades_categorias');
    }
};
