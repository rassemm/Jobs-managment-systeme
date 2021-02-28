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
            <a class="btn btn-success mb-5" href="{{ route('job.create') }}" style="panding-left"> Create New Product</a>
        </div>
 
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Salaire</th>
            <th>Date de fin</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->id }}</td>
            <td>{{ $job->titre}}</td>
            <td>{{ $job->description}}</td>
            <td>{{ $job->salaire}}</td>
            <td>{{ $job->end_date}}</td>
            <td>
                <form action="{{ route('job.destroy',$job->id) }}" method="POST">
   
                <a class="btn btn-info" href="{{ route('job.show',$job->id)}}">Show</a>
    
                <a class="btn btn-primary" href="{{ route('job.edit',$job->id)}}">Edit</a>
                       @csrf
                     @method('delete')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  {{ $jobs->links() }}
</div>
    <script>
        @jquery
    @toastr_js
    @toastr_render
    </script>
@endsection