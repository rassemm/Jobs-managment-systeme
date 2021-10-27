@extends('layouts.master')

@section('content')
    
<div class="container">
    <div class="row">
     
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
    </div>
</div>
    <div class="container mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <form  action="{{ route('cv.update' , $cv->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="row">
             <div class="col-md-3">
               <div class="form-group">
                <label>Nom</label>
                <input type="text"name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{$cv->nom}}"  id="nom" >

                <!-- Error -->
                @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
            <div class="col-md-3">
            <div class="form-group">
                <label>Prénom</label>
                <input type="text"name="prenom" class="form-control  @error('prenom') is-invalid @enderror" value="{{ $cv->prenom }}"  id="prenom">

                <!-- Error -->
                @error('prenom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
            <div class="col-md-3">
            <div class="form-group">
                <label>Date Naissance</label>
                <input type="date" name="date_b" class="form-control  @error('date_b') is-invalid @enderror" value="{{ $cv->date_b }}" id="date_b">

                    @error('date_b')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ $cv->email }}" name="email"
                    id="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
            <div class="col-md-6">
            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" class="form-control  @error('phone') is-invalid @enderror" value="{{ $cv->phone}}" name="phone"
                    id="phone">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col"></div>
            <div class="form-group">
                <label>Adresse</label>
                <textarea class="form-control @error('adresse') is-invalid @enderror" value="{{ $cv->adresse}}" name="adresse" id="adresse"
                    rows="4">{{ $cv->adresse}}</textarea>

                    @error('adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Diplome</label>
                <input type="text" class="form-control  @error('diplome') is-invalid @enderror" value="{{ $cv->diplome }}" name="diplome"
                    id="diplome">

                    @error('diplome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Expriance</label>
                <input type="text" class="form-control  @error('experience') is-invalid @enderror" value="{{ $cv->experience }}" name="experience"
                    id="experience">

                    @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control  @error('description') is-invalid @enderror" value="{{ $cv->description }}"  placeholder="Entrer votre description de diplome" name="description" id="description"
                    rows="4">{{ $cv->description }}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control @error('desc') is-invalid @enderror" value="{{ $cv->desc }}" placeholder="Entrer votre description experiance" name="desc" id="desc"
                    rows="4">{{ $cv->desc }}</textarea>

                    @error('desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-6">
<div class="form-group">
    <label for="file">Image</label>
    <input type="file" name="logo" id="logo" value="{{$cv->logo}}" required>
        </div>
              </div>
                <div class="col-md-6">
                <button type="submit" name="send" class="btn btn-dark"><i class="fas fa-edit"></i></button>
                     </div>
                       </div>
        </form>
        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-backward"></i></a>

    </div>
@endsection