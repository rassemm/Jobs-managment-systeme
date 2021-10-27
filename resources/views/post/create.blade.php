@extends('layouts.master')
@section('content')
<style>
    strong abbr{
        position: relative;
        left: 1;
        color: red;
    }
    </style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}"> <i class="fas fa-backward"></i></a>
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
        <strong>Titre <abbr title="(obligatoire)" aria-hidden="true">*</abbr></strong>
          <input type="text" name="titre" class="form-control">
    </div>
    <div class="form-group">
        <strong>niveau <abbr title="(obligatoire)" aria-hidden="true">*</abbr></strong>
          <input type="text" name="niveau" class="form-control">
    </div>
    <div class="form-group">
        <strong>Date de debut <abbr title="(obligatoire)" aria-hidden="true">*</abbr></strong>
          <input type="date" name="start_date" class="form-control">
    </div>
    <div class="form-group">
        <strong>Date de fin <abbr title="(obligatoire)" aria-hidden="true">*</abbr></strong>
          <input type="date" name="end_date" class="form-control">
    </div>
   
    
    <div class="form-group">
        <strong>description <abbr title="(obligatoire)" aria-hidden="true">*</abbr></strong>
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