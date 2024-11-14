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
        Schema::table('curtidas', function (Blueprint $table) {
           // Remover a chave estrangeira existente
            $table->dropForeign(['idPostagem']);

            // Criar uma nova chave estrangeira que aponta para a tabela postagens
            $table->foreign('idPostagem')->references('idPostagem')->on('postagems')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curtidas', function (Blueprint $table) {
            //
        });
    }
};
