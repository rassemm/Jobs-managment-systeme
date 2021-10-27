@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col">
          <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i>Post: {{ $post->titre }}
              </div>
           
       
    <div class="card-body">
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             <h4>  Titre: {{ $post->titre }}</h4>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
             <p>{{ $post->description}}</p>   
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4 class="badge badge-success">Date de debut:
                {{ $post->start_date}} </h4>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4 class="badge badge-danger">Date de fin:
                {{ $post->end_date}} </h4>
            </div>
        </div>
        <div class="pull-right">
            <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-backward"></i></a>
                    </div>
    </div>
</div>
@endsection