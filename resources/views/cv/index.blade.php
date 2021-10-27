@extends('layouts.master')

@section('content')
@can('cv')
  

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-3 col-6">
                @include('notify::messages')
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              <div class="topright">
                <a class="btn btn-success mb-5" href="{{ route('cv.create') }}"> <i class="fa fa-plus"></i></a>
            </div>
          </div>
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Mes CVs') }}
                		</div>
                    <div class="d-flex justify-content-end mb-4">
                  </div>
                    <div class="card-body">
                      <h2 class="badge badge-success">User : {{$user->name}}| emaile :{{$user->email}}</h2>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                           
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Logo</th>
                            <th>Details</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($cvs as $cv)
                            <tr>
                             
                              <td><strong>{{ $cv->id}}</strong></td>
                              <td><strong>{{ $cv->nom}}</strong></td>
                              <td><strong>{{ $cv->prenom}}</strong></td>
                              <td><strong>{{ $cv->email}}</strong></td>
                              <td><img src="{{asset('storage/' . $cv->logo)}}" height="250px" width="90px" class="img-fluid img-thumbnail"></td>
                             </td>
                              <td>
                                <form action="{{ route('cv.destroy',$cv->id) }}" method="POST">
                                <a class="btn btn-info" href="{{route('cv.edit',$cv->id)}}"><i class="fas fa-edit"></i></a>
                                <a href="{{action('CvController@downloadPDF',$cv->id)}}" class="btn btn-dark"><i class="fas fa-download"></i></a>
                                <a href="{{route('cv.show',$cv->id) }}">  <button type="button" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></i> </button></a>

                                @csrf
                                @method('delete')
                               
                               <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
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
        <script>
          @jquery
      @toastr_js
      @toastr_render
      </script>
      @endcan
@endsection


@section('javascript')

@endsection
