@extends('templates.template-home')

<!-- Links CSS-->

@php
    $user = Auth::user();

    $perfil = $user->perfils;
@endphp
@section('links-css')
    
    <link rel="stylesheet" href="{{url('assets/css/style-perfil.css')}}">
@endsection

<!-- Conteúdo da Página aqui Sugiro que crie uma div para guardar e organizar o conteúdo  -->
    
@section('cont-home')
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="col-3">
                <img class="img-profile" src="{{asset('assets/img/foto-perfil/'.$perfil->fotoPerfil)}}">
            </div>
            <div class="col-7">
                <div class="row" style="padding-top: 20px; padding-bottom: 10px;">
                    <div class="col-8 col-lg-5">
                        <h2 class="username">{{$user->nome}}</h2>
                    </div>
                    
                <div class="row">
                    <div class="col-4">
                        <p class="profile-datas"><strong>{{$perfil->qtddPost}}</strong> publicações</p>
                    </div>
                    <div class="col-4">
                        <p class="profile-datas"><strong>{{$perfil->qtddSeguidores}}</strong> seguidores</p>
                    </div>
                    <div class="col-4">
                        <p class="profile-datas"><strong>{{$perfil->qtddSeguindo}}</strong> seguindo</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="name">Bio</h1>
                
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="profile-desc">{{$perfil->biography}}</p>
                        
                    </div>
                </div>
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

                    <!-- Line-->
        <hr size="3" width="100%" color="#EEEEEE" style="margin: 0%;">


            
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
      
      
      
          <script type="text/javascript">
      
              var crl = document.getElementById('myCrl').getContext('2d');
      
              crl.beginPath();
              crl.arc(90, 100, 40, 0, 2 * Math.PI);
              crl.fillStyle = '#00ACC1';
              crl.fill();
              crl.linewidth = 5;
              crl.strokeStyle = '#dbdbdb';
              crl.stroke();
      
              var crl1 = document.getElementById('myCrl1').getContext('2d');
      
              crl1.beginPath();
              crl1.arc(90, 100, 40, 0, 2 * Math.PI);
              crl1.fillStyle = '#F8BBD0';
              crl1.fill();
              crl1.linewidth = 5;
              crl1.strokeStyle = '#dbdbdb';
              crl1.stroke();
      
              var crl2 = document.getElementById('myCrl2').getContext('2d');
      
              crl2.beginPath();
              crl2.arc(90, 100, 40, 0, 2 * Math.PI);
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
      


          </div>
      </div>
    </div>
</div>
@endsection