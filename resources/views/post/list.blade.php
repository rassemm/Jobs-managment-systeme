@extends('layouts.master')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Mes demdande ') }}
                		</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Author</th>
                            <th>email</th>
                            <th>Title</th>
                            <th>Niveau</th>
                            <th>Date de debut</th>
                            <th>Date de fin</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($posts as $post)
                            <tr>
                              <td><strong>{{ \App\User::find($post->user_id)->name }}</strong></td>
                              <td><strong>{{ \App\User::find($post->user_id)->email }}</strong></td>
                              <td><strong>{{ $post->titre }}</strong></td>
                              <td>{{ $post->niveau }}</td>
                              <td><strong>{{ $post->sart_date }}</strong></td>
                              <td><strong>{{ $post->end_date }}</strong></td>
                              <td><strong>{{ $post->status }}</strong></td>
                              <td>
                                <a class="btn btn-info" href=""><i class="fa fa-list">Envoyer</i></a>
                                <a class="btn btn-info" href="{{ route('post.show',$post->id)}}"><i class="fa fa-list"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection
