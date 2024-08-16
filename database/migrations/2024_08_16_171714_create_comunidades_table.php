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
        Schema::create('comunidades', function (Blueprint $table) {
            $table->bigIncrements('idComunidade');
            $table->binary('fotoComunidade');
            $table->bigInteger('qtddMembros');
            $table->string('nomeComunidade');
            $table->string('descComunidade');
            $table->date('dtCriacaoComunidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidades');
    }
};
