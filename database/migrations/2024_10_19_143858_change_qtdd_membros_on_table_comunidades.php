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
        Schema::table('comunidades', function (Blueprint $table) {
            $table->bigInteger('qtddMembros')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comunidades', function (Blueprint $table) {
           $table->bigInteger('qtddMembros');
        });
    }
};
