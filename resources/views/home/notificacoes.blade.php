@extends('templates.template-home')

<!-- Links do css -->
@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-notificacoes.css')}}">
@endsection

@section('cont-home')

<!-- Conteudo das notificações aqui -->
    <div class="cont-notificacoes">
        <div class="cont-titulo">
            <h2>Notificações</h2>
        </div>
        <div class="cont-explication">
            <p>As suas notificações aparecem aqui</p>
        </div>
        <div class="cont-card">
            <section class="card">
                <div class="cont-header">
                    <div class="cont-titulo">
                        <small class="titulo-card">Larissa Fátima Machado</small>
                    </div>
                    <div class="cont-icon-close">
                        <button type="button"><i class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                    
                </div>
                <div class="cont-desc">
                    <p>Comentou na sua publicação</p>
                </div>
            </section>
            <section class="card">
                <div class="cont-header">
                    <div class="cont-titulo">
                        <small class="titulo-card">Maria de Luisa</small>
                    </div>
                    <div class="cont-icon-close">
                        <button type="button"><i class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                </div>
                <div class="cont-desc">
                    <p>Acabou de compartilhar uma nova postagem</p>
                </div>
            </section>
            <section class="card">
                <div class="cont-header">
                    <div class="cont-titulo">
                        <small class="titulo-card">Maria de Luisa</small>
                    </div>
                    <div class="cont-icon-close">
                        <button type="button"><i class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                    
                </div>
                <div class="cont-desc">
                    <p>Enviou uma nova mensagem</p>
                </div>
            </section>
            <section class="card">
                <div class="cont-header">
                    <div class="cont-titulo">
                        <small class="titulo-card">Joana de Oliveira Lima</small>
                    </div>
                    <div class="cont-icon-close">
                        <button type="button"><i class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                    
                </div>
                <div class="cont-desc">
                    <p>Curtiu sua publicação</p>
                </div>
            </section>
        </div>
    </div>
@endsection