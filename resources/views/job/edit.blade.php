@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2  class="alert alert-info">Edit Job</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('job.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form action="{{route('job.update',$job->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <strong>Titre</strong>
    <input type="text" name="titre" value="{{$job->titre}}" class="form-control">
    </div>
    
    <div class="form-group">
        <strong>Salaire</strong>
          <input type="number" name="salaire" value="{{$job->salaire}}" class="form-control">
    </div>
    <div class="form-group">
        <strong>Date de fin</strong>
          <input type="date" name="end_date" value="{{$job->end_date}}" class="form-control">
    </div>
    
    <div class="form-group">
        <strong>description</strong>
    <textarea name="description" class="form-control"  cols="30" rows="10" id="summary-ckeditor" name="summary-ckeditor"> {{$job->description}}</textarea>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-block">Modifier</button>
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
                                  <form method="POST" action="{{route('approve',[$user->id,$job->id])}}">
                                      @csrf
                                      @method('PUT')
                                      <button class="btn btn-success"  type="submit">Accepter</button>
                                  </form>
                                @else
                                  <form method="POST" action="{{route('unapprove',[$user->id,$job->id])}}">
                                      @csrf
                                      @method('PUT')
                                      <button class="btn btn-danger"  type="submit">Annuler</button>
                                  </form>
                                @endif
                                </td>
                                <td>
                                @if($user->status == 'pending')

                                <form method="POST" action="/jobs/remove/{{$user->id}}/{{$job->id}}">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger"  type="submit">Remove</button>
                                </form>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
  </div>
@endsection