<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;

use App\Models\Postagem;
use App\Models\Usuario;

use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


use Carbon\Carbon;
class PDFGenerateController extends Controller
{
    public function gerarPDFRelatorioHoje(){
        //Encontrar o executável do wkhtmltopdf
        $binaryPath = '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"';

        // Configurar o PDF com o caminho do binário com o executável
        PDF::setBinary($binaryPath);
        
        $dados =[

            'titulo' => 'Relatório do Sistema Materna',

            'data' => date('d/m/Y'),

            'countCadastros' => Usuario::where('idNivelUsuario', '!=', 2)->count(),

            'countCadastradosMonth' => Usuario::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('idNivelUsuario', '!=', 2)->count(),

            'countPostagens' => Postagem::count(),

            'countPostADD' => Postagem::where('isADD', "!=", 0)->count(),

            'countPostagensMes' => Postagem::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count(),

            'countPostADDMes' => Postagem::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('isADD', "!=", 0)->count(),

            'countDenuncias' => Denuncia::count(),

            'countDenunciasMes' => Denuncia::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count(),

            'countDenunciasChecadasTotal' => Denuncia::where('denuciaVerificada', '!=', 1)->count(),

            'countDenunciasChecadasMes' => Denuncia::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('denuciaVerificada', '!=', 1)->count(),
            
        ];
        //Gerar pdf com a view que eu quero
        $pdf = PDF::loadView('pdf.pdf-relatorios-hoje', $dados)->setOptions(['quiet' => true, // Para reduzir a saída de logs
              'no-stop-slow-scripts' => true, // Para permitir que scripts lentos sejam executados
              'enable-local-file-access' => true // Para permitir acesso a arquivos locais]);
        ]);
        return $pdf->download('relatorio-materna-hoje.pdf');
    }
}
