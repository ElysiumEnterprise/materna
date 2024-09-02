<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $usuarios = DB::table('usuarios')->get();
        
        foreach($usuarios as $usuario){
            $senhaCriptografada = Hash::make($usuario->senha);
            DB::table('usuarios')->where('idUsuario', $usuario->idUsuario)->where('idNivelUsuario', '2')->update(['senha'=>$senhaCriptografada]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            //
        });
    }
};
