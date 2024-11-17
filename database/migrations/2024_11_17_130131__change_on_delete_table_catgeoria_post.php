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
        Schema::table('categoria_posts', function (Blueprint $table) {
            
            // Adicionar novamente a chave estrangeira com onDelete('cascade')
            $table->foreign('idPostagem')
                ->references('idPostagem')
                ->on('postagems')
                ->onDelete('cascade');

            $table->foreign('idCategoria')->references('idCategoria')->on('categorias')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categoria_posts', function (Blueprint $table) {
           
            // Adicionar novamente a chave estrangeira com onDelete('cascade')
            $table->foreign('idPostagem')
                ->references('idPostagem')
                ->on('postagems');

            $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
        });
    }
};
