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
        Schema::table('anunciantes', function (Blueprint $table) {
            $table->dropForeign(['idUsuario']);

            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anunciantes', function (Blueprint $table) {
            $table->dropForeign(['idUsuario']);

            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
        });
    }
};
