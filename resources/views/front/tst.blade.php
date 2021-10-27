<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {!! HTML::style('css/cv.css') !!}
    <link href="{{ public_path('css/cv.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <style  type="text/css" media="screen">
  body{
    color: #888888;
    margin-top:20px;}
.progress {
    position: relative;
    overflow: inherit;
    height: 6px;
    margin: 30px 0px 15px;
    width: 100%;
    display: inline-block;
    border-radius: 10px;
}

.progress .progress-bar {
    height: 6px;
    background: #009b72;
    border-radius: 10px;
}

.progress .progress-bar-title {
    position: absolute;
    left: 0;
    top: -30px;
    color: #818181;
    font-size: 16px;
}

.progress .progress-bar-number {
    position: absolute;
    right: 0;
    color: #888888;
    top: -30px;
    font-weight: 600;
    font-size: 14px;
}


.text-black {
    color: #000000;
}


.w-25 {
    width: 25% t;
}
.text-muted {
    color: #b2b2b2 ;
}
.mr-1, .mx-1 {
    margin-right: 0.625rem ;
}
  </style>
</head>
<body>
  <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6">
          @foreach ($cvs as $cv)
          {{-- <div class="mb-2">
            <img src="{{ asset('images/user-profile.png') }}" alt="" style="width: 150px; height: 150px;">
          </div>
      --}}
          
          <div class="mb-2 d-flex">
            <h4 class="font-weight-normal">Name :{{ $cv->nom}}</h4>
            <div class="social d-flex ml-auto">
              <h4 class="font-weight-normal">Last Name :{{ $cv->prenom}}</h4>
              <div class="social d-flex ml-auto">
              <p class="pr-2 font-weight-normal">Follow on:</p>
              <a href="#" class="text-muted mr-1">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="text-muted mr-1">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="text-muted mr-1">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#" class="text-muted">
                <i class="fab fa-linkedin"></i>
              </a>
            </div>
          </div>
          <div class="mb-2">
            <ul class="list-unstyled">
              <li class="media">
                <span class="w-25 text-black ">Profession:</span>
               <h3> <label class="media-body">Web Developer Full Stack</label></h3>
              </li>
              <li class="media">
                <span class="w-25 text-black">Phone: </span>
               <h3> <label class="media-body">{{$cv->phone}}</label></h3>
              </li>
              <li class="media">
                <span class="w-25 text-black ">Email: </span>
              <h3>  <label class="media-body">{{$cv->email}}</label></h3>
              </li>
              <li class="media">
                <span class="w-25 text-black ">Location: </span>
              <h3> <label class="media-body">{{$cv->adresse}}</label></h3> 
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 pl-xl-3">
      <h2 class="font-weight-normal">Diplome : {{$cv->diplome}}</h2>
      <hr> <h2 style="text-align: center">Description</h2>
      <h3>  <p>{{$cv->description}}.</p></h3><hr>
       
         
          <hr> <h2 style="text-align: center">Exprience</h2> 
          <h5 class="font-weight-normal">Exprience : {{$cv->experiance}}</h5>
          <h3>    <p>{{$cv->desc}}</p></h3>
          <div class="py-1">   
            <hr>    
               <hr> <h2>Skill</h2> 

            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width:85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar-title">Finance</div>
                <span class="progress-bar-number">85%</span>
              </div>
            </div>
          </div>
          <div class="py-1">
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width:70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar-title">Information Technologies</div>
                <span class="progress-bar-number">70%</span>
              </div>
            </div>
          </div>
          <div class="py-1">
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width:77%" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar-title">Education</div>
                <span class="progress-bar-number">77%</span>
              </div>
            </div>
          </div>
        
        @endforeach
        <hr>
      </div>
      </div>
    </div>
</body>
</html>