@extends('templates.template-home')

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/style-seguidores.css')}}">
@endsection

@section('cont-home')
    <div class="cont-seguidores">
        <h1>Seguindo</h1>
        <div class="cont-card-perfils">
            @foreach($perfilsSeguindo as $perfil)
            <section class="">

            </section>
        </div>
    </div>
@endsection