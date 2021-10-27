@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2  class="alert alert-info">Edit Post</h2>
            </div>
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
    <form action="{{route('post.update',$post->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <strong>Titre</strong>
    <input type="text" name="titre" value="{{$post->titre}}" class="form-control">
    </div>
    
    <div class="form-group">
        <strong>Niveau</strong>
          <input type="text" name="niveau" value="{{$post->niveau}}" class="form-control">
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
    <textarea name="description" class="form-control"  cols="30" rows="10" id="summary-ckeditor" name="summary-ckeditor"> {{$post->description}}</textarea>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-block">edit</button>
</div>
    </form>   
</div>
<div class="col-md-12 col-lg-12">
    <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Subscribed Users') }}
                     
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th>Envoyer Mail</th>
                            <th>Envoyer SMS</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $key => $user)
                            <tr>
                              <th>{{ ++$key }}</th>
                              <td><b>{{ $user->name }}</b></td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->status }}</td>
                              <td>
                                @if($user->status != 'approved')
                                  <form method="POST" action="{{route('approvepost',[$user->id,$post->id])}}">
                                      @csrf
                                      @method('PUT')
                                      <button class="btn btn-success"  type="submit"><i class="fas fa-check"></i></button>
                                  </form>
                                @else
                                  <form method="POST" action="{{route('unapprovepost',[$user->id,$post->id])}}">
                                      @csrf
                                      @method('PUT')
                                      <button class="btn btn-danger"  type="submit"><i class="fas fa-times"></i></button>
                                  </form>
                                @endif
                                </td>
                                <td>
                                @if($user->status == 'pending')

                              
                                    <button class="btn btn-danger"  type="submit"><i class="fas fa-redo-alt"></i></button>
                                @endif
                              </td>
                              <td><a class="btn btn-info" href="{{route('sendpost',$user->id)}}"><i class="fas fa-mail-bulk"></i></a></td>
                              <td><a class="btn btn-info" href=""><i class="fas fa-sms"></i></a></td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
@endsection