<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('denuncias', function (Blueprint $table) {
            // Remover a chave estrangeira
            $table->foreign('idPerfil')->references('idPerfil')->on('perfils')->nullable(true)->change();
        });
    }

    public function down()
    {
        Schema::table('denuncias', function (Blueprint $table) {
            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');
        });
    }
};
    