@extends('layouts.master')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Mes demdandes') }}
                		</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Author</th>
                            <th>Titree</th>
                            <th>Salaire</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($jobs as $job)
                            <tr>
                              <td><strong>{{ \App\User::find($job->user_id)->name }}</strong></td>
                              <td><strong>{{ $job->titre }}</strong></td>
                              <td>{{ $job->salaire }}</td>
                              <td><strong>{{ $job->description }}</strong></td>
                              <td><strong>{{ $job->status }}</strong></td>
                              <td>
                                <a class="btn btn-info" href="{{ route('job.show',$job->id)}}"><i class="fa fa-list"></i></a>
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
