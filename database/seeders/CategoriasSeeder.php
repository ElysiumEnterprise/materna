<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nome' => 'maes_solo', 'imagem' => 'maes_solo.jpg'],
            ['nome' => 'adolescencia', 'imagem' => 'adolescencia.jpg'],
            ['nome' => 'amamentacao', 'imagem' => 'amamentacao.jpg'],
            ['nome' => 'alimentacao', 'imagem' => 'alimentacao.jpg'],
            ['nome' => 'depressao', 'imagem' => 'depressao.jpg'],
            ['nome' => 'puerperio', 'imagem' => 'puerperio.jpg'],
            ['nome' => 'educacao', 'imagem' => 'educacao.jpg'],
            ['nome' => 'bebe', 'imagem' => 'bebe.jpg'],
            ['nome' => 'pos_parto', 'imagem' => 'pos_parto.jpg'],
            ['nome' => 'saude_mental', 'imagem' => 'saude_mental.jpg'],
        ]);
    }
}
