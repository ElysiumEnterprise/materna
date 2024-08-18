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
        Schema::create('anunciantes', function (Blueprint $table) {
            $table->id('idAnunciante');
            $table->string('nomeAnunciante');
            $table->char('cnpjAnunciante', length:18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anunciantes');
    }
};
