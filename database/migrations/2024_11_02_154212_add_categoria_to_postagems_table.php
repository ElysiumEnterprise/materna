<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Controller\FeedController;

class AddCategoriaToPostagemsTable extends Migration
{
    public function up()
    {
        Schema::table('postagens', function (Blueprint $table) {
            $table->string('categoria')->nullable(); // Adiciona a coluna categoria
        });
    }

    public function down()
    {
        Schema::table('postagens', function (Blueprint $table) {
            $table->string('categoria')->nullable(); // Altere o tipo de dados conforme necessário
        });
    }
}

