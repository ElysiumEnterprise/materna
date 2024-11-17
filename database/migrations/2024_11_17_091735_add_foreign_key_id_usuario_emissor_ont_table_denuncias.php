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
        Schema::table('denuncias', function (Blueprint $table) {
            $table->unsignedBigInteger('idUsuarioEmissor')->nullable();

            $table->foreign('idUsuarioEmissor')->references('idUsuario')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('denuncias', function (Blueprint $table) {
            $table->dropForeign(['idUsuarioEmissor']);
            $table->dropColumn('idUsuarioEmissor');
        });
    }
};
