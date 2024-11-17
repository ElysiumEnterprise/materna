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
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropForeign(['idPerfil']);
            $table->dropForeign(['idPostagem']);

            $table->foreign('idPerfil')->references('idPerfil')->on('perfils')->onDelete('cascade');
            $table->foreign('idPostagem')->references('idPostagem')->on('postagems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->dropForeign(['idPerfil']);
            $table->dropForeign(['idPostagem']);

            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');
            $table->foreign('idPostagem')->references('idPostagem')->on('postagems');
        });
    }
};
