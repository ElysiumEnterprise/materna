@extends('templates.template-home')

@section('links-css')
    <link rel="stylesheet" href="{{url('assets/css/salvos.css')}}">
@endsection

@section('cont-home')
<div class="cont-salvos">
    <div class="cont-titulo">
        <h2>Itens Salvos</h2>
    </div>

    <section class="cont-img">
        <img src="{{url('assets/img/foto1.webp')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto2.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto3.avif')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto4.jpg')}}" alt="" class="img-salvos">
        
    </section>

    <section class="cont-img">
        <img src="{{url('assets/img/foto5.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto6.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto7.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto8.jpg')}}" alt="" class="img-salvos">
        
    </section>

    <section class="cont-img">
        <img src="{{url('assets/img/foto9.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto10.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto11.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/foto12.jpg')}}" alt="" class="img-salvos">
        
    </section>

    <section class="cont-img">
        <img src="{{url('assets/img/img-criancas.webp')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/img-menina.webp')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/img-criancas-lendo.jpg')}}" alt="" class="img-salvos">
        <img src="{{url('assets/img/img-criancas-corda.jpg')}}" alt="" class="img-salvos">
        
    </section>

  



</div>
@endsection