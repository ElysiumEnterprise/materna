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
        if(Schema::hasColumn('perfils', 'foto')){
            Schema::table('perfils', function (Blueprint $table) {
               $table->dropColumn('foto');
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfils', function (Blueprint $table) {
            //
        });
    }
};
