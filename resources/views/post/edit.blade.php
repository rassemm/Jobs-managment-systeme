@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2  class="alert alert-info">Edit Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}"> Back</a>
            </div>
        </div>
    </div>
       
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('post.update',$post->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <strong>Titre</strong>
    <input type="text" name="titre" value="{{$post->titre}}" class="form-control">
    </div>
    
    <div class="form-group">
        <strong>Niveau</strong>
          <input type="number" name="niveau" value="{{$post->niveau}}" class="form-control">
    </div>
    <div class="form-group">
        <strong>Date de debut</strong>
          <input type="date" name="start_date" value="{{$post->start_date}}" class="form-control">
    </div>
    <div class="form-group">
        <strong>Date de fin</strong>
          <input type="date" name="end_date" value="{{$post->start_date}}" class="form-control">
    </div>
    
    <div class="form-group">
        <strong>description</strong>
    <textarea name="description" class="form-control"  cols="30" rows="10"> {{$post->description}}</textarea>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-block">edit</button>
</div>
    </form>   
</div>

@endsection