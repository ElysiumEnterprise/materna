@extends('templates.template-home')

<!-- Links CSS-->

@section('link-css')

@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->

@section('cont-home')
    <div class="cont-config-gerais">
        <div class="cont-item-config">
            <a href="/configurações/editar-conta/1"></a>
        </div>
    </div>
@endsection