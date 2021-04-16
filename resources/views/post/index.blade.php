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
<div class="small-box bg-danger">
  <div class="inner">
    <h3>{{$posts->count()}}</h3>

    <p>Total Posts</p>
  </div>
  <div class="icon">
    <i class="ion ion-pie-graph"></i>
  </div>
  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="topright">
            <a class="btn btn-success mb-5" href="{{ route('post.create') }}"> <i class="fa fa-plus"></i></a>
        </div>
 
    <table class="table table-responsive-sm table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Niveau</th>
            <th>Date de debut</th>
            <th>Date de fin</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->titre}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->niveau}}</td>
            <td>{{$post->strat_date}}</td>
            <td>{{$post->end_date}}</td>
            <td>
                <form action="{{ route('post.destroy',$post->id) }}" method="POST">
   
                <a class="btn btn-info" href="{{ route('post.show',$post->id)}}"><i class="fa fa-list"></i></a>
    
                <a class="btn btn-primary" href="{{ route('post.edit',$post->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                 @csrf
                  @method('delete')
                    
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  {{ $posts->links() }}
</div>
    <script>
        @jquery
    @toastr_js
    @toastr_render
    </script>
@endsection