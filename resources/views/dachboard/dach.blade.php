<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Platforme de Gestion Des offres d'emplois et stages 
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('assets/css/material-kit.css?v=2.0.7')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item dropdown dropdown-left"> 
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span> 
                <img class="img-profile rounded-circle" src="{{asset('images/user-profile.png')}}" width="40px"> 
              </a>
                
           
             
                  <div class="dropdown-divider"></div> 
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>
              </div>
            </li>
            @endauth
            @guest
            <a href="/login" class="btn primary-btn">Sign up or Log in</a>
            @endguest
          </ul>
        </div>         
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('myjobs')}}" target="_blank">
              <i class="material-icons"></i>Liste de mes Demandes D'Emplois
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('myposts')}}" target="_blank">
              <i class="material-icons"></i>Liste de Mes Demandes de stages 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('./assets/img/bg2.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Welcome.</h1>
            <h3>Platforme de Gestion Des offres d'emplois et stages 
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="section section-basic">
     <div class="container">
   <!-- Small Box (Stat card) -->
   <div class="row">
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-info">
         <div class="inner">
           <h3>{{$posts->count()}}</h3>

           <p>Stages</p>
         </div>
         <div class="icon">
          <i class="far fa-calendar-alt"></i>
         </div>
         <a href="#" class="small-box-footer">
           More info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-success">
         <div class="inner">
           <h3>{{$jobs->count()}}<sup style="font-size: 20px">%</sup></h3>

           <p>Jobs</p>
         </div>
         <div class="icon">
           <i class="ion ion-stats-bars"></i>
         </div>
         <a href="#" class="small-box-footer">
           More info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-warning">
         <div class="inner">
           <h3>{{$users->count()}}</h3>

           <p>User Registrations</p>
         </div>
         <div class="icon">
           <i class="fas fa-user-plus"></i>
         </div>
         <a href="#" class="small-box-footer">
           More info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-danger">
         <div class="inner">
           <h3>65</h3>

           <p>Unique Visitors</p>
         </div>
         <div class="icon">
           <i class="fas fa-chart-pie"></i>
         </div>
         <a href="#" class="small-box-footer">
           More info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
   </div>
  </div>

<div class="row" >
  <!-- Main content -->
  
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Default box -->
              <form action="" method="GET" role="search">

                <div class="input-group">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search Emplois">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="term" placeholder="Search Emplois" id="term">
                    <a href="" class=" mt-1">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                <span class="fas fa-sync-alt"></span>
                            </button>
                        </span>
                    </a>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-success">{{ __('View All') }}</a>

            </form>

              @foreach ($jobs as $job)
                  
              
              <div class="card">
                <div class="card-header"><span class="badge badge-success">Offre de Emplois</span>
                  <h3 class="card-title">{{ \Illuminate\Support\Str::limit($job->titre, 35) }}</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <p class="card-text">  {!! \Illuminate\Support\Str::limit($job->description, 150, $end='...') !!}</p>
                 <div class="badge badge-success"><span>Salaire proposée :</span> {{$job->salaire}}</div>
                 <p><b>By {{ \App\User::find($job->user_id)->name }}</b></p>
                          @if(!Auth::user()->isSubscribedJob($job->id))
                            <form method="POST" class="btn" action="{{route('subscribe',$job->id)}}">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success"  type="submit">Subscribe</button>
                            </form>
                          @else
                          <button class="btn btn-danger">Subscribed</button>
                          @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  {{$job->end_date}}  
                </div>
                <!-- /.card-footer-->
              </div>
              @endforeach
              {{ $jobs->links() }}
            </div>
            
            
            <div class="col">
              <form action="" method="GET" role="search">

                <div class="input-group">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search Stage">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="term" placeholder="Search Stage" id="term">
                    <a href="" class=" mt-1">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                <span class="fas fa-sync-alt"></span>
                            </button>
                        </span>
                    </a>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-info">{{ __('View All') }}</a>

            </form>
              @foreach ($posts as $post)
              <div class="card">
                <div class="card-header"><span class="badge badge-warning">Offre de Stage</span>
    

                  <h3 class="card-title">{{$post->titre}}</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <p class="card-text">  {!! \Illuminate\Support\Str::limit($post->description, 150, $end='...') !!}</p>
                 <div class="badge badge-success"><span>Niveaux proposée :</span> {{$post->niveau}}</div>
                 <p><b>By {{ \App\User::find($post->user_id)->name }}</b></p>
                 @if(!Auth::user()->isSubscribedPost($post->id))
                   <form method="POST" class="btn" action="{{route('subscribepost',$post->id)}}">
                       @csrf
                       @method('PUT')
                       <button class="btn btn-success"  type="submit">Subscribe</button>
                   </form>
                 @else
                 <button class="btn btn-danger">Subscribed</button>
                 @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <Label> Date de debut:</Label> {{$post->start_date}} - <label for=""> Date de fin:</label>{{$post->end_date}}
                </div>
                @endforeach
              </div>
              </div>
              {{ $posts->links() }}              

            </div> 
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div> 
    </div>
  
    
   
   
    
  @include('inc.footer')
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/material-kit.js?v=2.0.7')}}" type="text/javascript"></script>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
 <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script> 
</body>

</html>