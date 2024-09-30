@extends('templates.template-home')

<!-- Links CSS-->

@php
    $userAuth = Auth::user();

    $perfil = $userAuth->perfils;
@endphp
@section('links-css')


    <link rel="stylesheet" href="{{url('assets/css/style-perfil.css')}}">

    
    
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-3">
                <img class="img-profile" src="{{asset('assets/img/foto-perfil/'.$user->perfils->fotoPerfil)}}">
            </div>
            <div class="col-7">
                <div class="row" style="padding-top: 20px; padding-bottom: 10px;">
                    <div class="col-8 col-lg-5">
                        <h2 class="username">{{$user->nome}}</h2>
                    </div>
                    
                <div class="row">
                    <div class="col-4">
                        <p class="profile-datas"><strong>{{$user->perfils->qtddPost}}</strong> publicações</p>
                    </div>
                    <div class="col-4">
                        <p class="profile-datas"><strong>{{$user->perfils->qtddSeguidores}}</strong> seguidores</p>
                    </div>
                    <div class="col-4">
                        <p class="profile-datas"><strong>{{$user->perfils->qtddSeguindo}}</strong> seguindo</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="name">Bio</h1>
                
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="profile-desc">{{$user->perfils->biography}}</p>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{session('status')}}
                    </div>
                </div>
                @if($userAuth->idUsuario != $user->idUsuario)
                <div class="row">
                    <div class="col-12">
                        <button type="button" onclick="abrirModalDenuncia()">Denunciar</button>
                    </div>
                </div>
                    

                @endif
            </div>
            <div class="col-2"></div>
        </div>
    </div>
      
                         
                    <!-- Stories-->
                     
                    <div style="padding-top: 0px;">
                              <div class="row">
                                  <div class="col-2"> <canvas id="myCrl"></canvas></div>
                                  <div class="col-2"> <canvas id="myCrl1"></canvas></div>
                                  <div class="col-2"> <canvas id="myCrl2"></canvas></div>
                              </div>
                          </div>
                          <div style="padding-bottom: 40px;">
                              <div class="row">
                                  <div class="col-2 stories"> Familia</div>
                                  <div class="col-2 stories"> Receitas</div>
                                  <div class="col-2 stories"> Trabalho</div>
                              </div>
                          </div>
      


            
                <!-- Card-Feed-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row" style="padding-bottom: 25px;">
                            <div class="col-4">
                                <div class="card">
                                <img src="{{url('assets/img/img-home/post5.png')}}" class="img-fluid img-arquivo" alt="">

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                <img src="{{url('assets/img/img-home/post2.png')}}" class="img-fluid img-arquivo" alt="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                <img src="{{url('assets/img/img-home/post4.png')}}" class="img-fluid img-arquivo" alt="">

                                </div>
                            </div>
                        </div>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                </div>
            </div>
            <div class="col-0 col-md-2"></div>
        </div>
    </div>
          </section>
          <div class="box-modal-post">
        <dialog class="modal-denuncia">
            <div class="cont-modal-denuncia">
                <div class="cont-header-modal">
                <button type="button" onclick="fecharModalDenuncia()"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <form action="{{route('cad.denuncia', $user->idUsuario)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="cont-assunto">
                            <label for="motivoDenuncia">Motivo da Denúncia @error('motivoDenuncia'): {{$message}}@enderror</label>
                            <input type="text" name="motivoDenuncia" id="motivoDenuncia" placeholder="Digite o motivo da denúncia aqui">
                        </div>
                        <div class="cont-desc">
                            <label for="detalhesDenuncia">Detalhes @error('detalhesDenuncia'): {{$message}}@enderror</label>
                            <textarea name="detalhesDenuncia" id="detalhesDenuncia"></textarea>
                        </div>

                        <div class="cont-btn-criar-post">
                            <button type="submit">Denunciar</button>
                        </div>
                    </section>
                </form>
            </div>
        </dialog>
    </div>
      
      
          <script type="text/javascript">
            
              var crl = document.getElementById('myCrl').getContext('2d');
      
              crl.beginPath();
              crl.arc(80, 100, 40, 0, 2 * Math.PI);
              crl.fillStyle = '#00ACC1';
              crl.fill();
              crl.linewidth = 5;
              crl.strokeStyle = '#dbdbdb';
              crl.stroke();
      
              var crl1 = document.getElementById('myCrl1').getContext('2d');
      
              crl1.beginPath();
              crl1.arc(80, 100, 40, 0, 2 * Math.PI);
              crl1.fillStyle = '#F8BBD0';
              crl1.fill();
              crl1.linewidth = 5;
              crl1.strokeStyle = '#dbdbdb';
              crl1.stroke();
      
              var crl2 = document.getElementById('myCrl2').getContext('2d');
      
              crl2.beginPath();
              crl2.arc(70, 100, 40, 0, 2 * Math.PI);
              crl2.fillStyle = '#E91E63';
              crl2.fill();
              crl2.linewidth = 5;
              crl2.strokeStyle = '#dbdbdb';
              crl2.stroke();

              
          </script>
      
      
          <!-- Option 1: Bootstrap Bundle with Popper -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
              crossorigin="anonymous"></script>
      
        <script src="{{url('assets/js/home/modal-denuncia.js')}}"></script>

          </div>
      </div>
    </div>
</div>
@endsection