
@extends('templates.template-adm')

<!-- Links CSS-->

@section('link-css')
    
@endsection

@section('cont-adm')
        
            <h1>Dashboard</h1>
            <div class="cont-acoes">
                <a href="{{route('pdf.relatorio')}}">Gerar PDF</a>
            
            </div>
            
            
            <div class="insights">

                <div class="cadastros">

                    

                    <span class="material-icons-sharp">analytics</span>

                    <div class="cad">
                        <h3 class="titulo-card">Cadastros</h3>
                    </div>
                    
                    <div class="grafico">
                    <canvas id="myChart" width="200" height="200"></canvas>
                    </div>
                    
                    
                    
                    

                    <small class="text-muted">No total</small>

                    
                </div>

                <div class="postagens">

                    <span class="material-icons-sharp">bar_chart</span>

                    <div class="cad">
                    <h3 class="titulo-card">Postagens</h3>
                    </div>
                    
                    <div class="middle">

                        <div class="left">

                           

                            <div class="counter">
                                <h1>{{$countPostagens}}</h1>
                            </div>
                        </div>

                        
                    </div>

                    <small class="text-muted">No total</small>
                </div>

                <div class="anuncio">
                    <span class="material-icons-sharp">stacked_line_chart</span>
                    <div class="middle">
                        
                        <div class="left">

                            <h3 class="titulo-card">Anúncios</h3>

                            <div class="counter">
                                <h1>{{$countPostADD}}</h1>
                            </div>
                        </div>

                        
                    </div>

                    <small class="text-muted">No total</small>
                </div>
            </div>
    
            <div class="recent-orders">
                <h2>Anunciantes Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome do Anunciante</th>
                            <th>Id do Anunciante</th>
                            <th>Quantidades de Anúncios</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($anunciantes as $anunciante)
                        <tr>
                            <td>{{$anunciante->nome}}</td>
                            <td>{{$anunciante->idUsuario}}</td>
                            <td>{{$anunciante->perfils->postagems->count()}}</td>
                            <td></td>
                            <td class="primary"><a href="{{route('info.user', $anunciante->idUsuario)}}">Detalhes</a></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                

                <a href="{{route('anunciantes.adm')}}">Mostrar tudo</a>
            </div>

            

@endsection





