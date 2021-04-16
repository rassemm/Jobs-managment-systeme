@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="alert alert-default-success"style="width: 75%;">Add New Post</h2>
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
    <div class="card" style="width: 75%;">
        <div class="card-header alert-default-success">
        </div>
            <div class="card-body">
    <form action="{{route('post.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <strong>Titre</strong>
          <input type="text" name="titre" class="form-control">
    </div>
    <div class="form-group">
        <strong>niveau</strong>
          <input type="text" name="niveau" class="form-control">
    </div>
    <div class="form-group">
        <strong>Date de debut</strong>
          <input type="date" name="start_date" class="form-control">
    </div>
    <div class="form-group">
        <strong>Date de fin</strong>
          <input type="date" name="end_date" class="form-control">
    </div>
   
    
    <div class="form-group">
        <strong>description</strong>
          <textarea name="description" class="form-control" cols="30" rows="10" id="summary-ckeditor" name="summary-ckeditor"></textarea>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
</div>
    </form>   
</div>
</div>
</div>

@endsection