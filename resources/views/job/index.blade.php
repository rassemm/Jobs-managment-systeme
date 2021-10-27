@extends('layouts.master')

@section('content')
<style>
  .topright {
    position: relative;
  left: 800px;
  font-size: 18px;
}
</style>
<div class="col-lg-3 col-6">
  @include('notify::messages')
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="small-box bg-info">
      <div class="inner">
        <h3> {{$jobs->count()}} </h3>

        <p>Total Jobs</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<div class="container">
    <div class="row">
        <div class="topright">
          @can('create job')
            <a class="btn btn-success mb-5" href="{{ route('job.create') }}" style="panding-left"><i class="fa fa-plus"></i></a>
            @endcan
        </div>
        <div class="card-body">
          <table class="table table-responsive-sm table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            
            <th>Salaire</th>
            <th>Date de fin</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($jobs as $job)
        <tr>
            <td>{{ \App\User::find($job->user_id)->name }}</td>
            <td>{{ $job->titre}}</td>
            
            <td>{{ $job->salaire}}</td>
            <td>{{ $job->end_date}}</td>
            
            <td>
                <form action="{{ route('job.destroy',$job->id) }}" method="POST">
   
                <a class="btn btn-info" href="{{ route('job.show',$job->id)}}"><i class="fa fa-list"></i></a>
                @can('edit job')
                <a class="btn btn-primary" href="{{ route('job.edit',$job->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                @endcan
                       @csrf
                     @method('delete')
                    @can('delete job')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  {{ $jobs->links() }}
</div>
</div>
<div class="col-md-12 col-lg-12">
  <div class="card">
                
</div>
    <script>
        @jquery
    @toastr_js
    @toastr_render
    </script>
@endsection