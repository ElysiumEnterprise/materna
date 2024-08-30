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
            $table->renameColumn('idComunidades', 'idPostagem')->change();
            $table->string('descPostagem', 255)->nullable();
            $table->unsignedBigInteger('idPerfil');
            $table->foreign('idPerfil')->references('idPerfil')->on('perfils');
            $table->date('dataPost');
            $table->time('horaPost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postagems', function (Blueprint $table) {
            $table->renameColumn('idComunidades', 'idPostagem');
        });
    }
};
