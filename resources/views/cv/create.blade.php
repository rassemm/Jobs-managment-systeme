@extends('layouts.master')

@section('content')
    <style>
        label abbr{
            position: relative;
            left: 1;
            color: red;
        }
    </style>
<div class="container">
    <div class="row">
    <div class="container mt-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i>{{ __('Cv') }}
                    </div>
                <div class="card-body">
        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <form  action="{{ route('cv.store') }}"   method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row">
             <div class="col-md-4">
               <div class="form-group">
                <label>Nom <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <input type="text"name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}"  id="nom" >

                <!-- Error -->
                @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
            <div class="col-md-4">
            <div class="form-group">
                <label>Prénom <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <input type="text"name="prenom" class="form-control  @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}"  id="prenom">

                <!-- Error -->
                @error('prenom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
            <div class="col-md-4">
            <div class="form-group">
                <label>  Date Naissance<abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <input type="date" name="date_b" class="form-control  @error('date_b') is-invalid @enderror" value="{{ old('date_b') }}"
                    id="date_b">

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
                <label>Email <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email"
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
                <label>Téléphone <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <input type="text" class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone"
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
                <label>Adresse <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <textarea class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}" name="adresse" id="adresse"
                    rows="4"></textarea>

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
                <label>Diplome <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <input type="text" class="form-control  @error('diplome') is-invalid @enderror" value="{{ old('diplome') }}" name="diplome"
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
                <label>Expriance <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <input type="text" class="form-control  @error('experience') is-invalid @enderror" value="{{ old('experience') }}" name="experience"
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
                <label>Description <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <textarea class="form-control  @error('description') is-invalid @enderror" value="{{ old('description') }}"  placeholder="Entrer votre description de diplome" name="description" id="description" id="summary-ckeditor" name="summary-ckeditor"  cols="30" rows="10"></textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Description <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                <textarea class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc') }}" placeholder="Entrer votre description experiance" name="desc" id="desc" id="summary-ckeditor" name="summary-ckeditor" cols="30" rows="10"></textarea>

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
                    <label for="logo">logo <abbr title="(obligatoire)" aria-hidden="true">*</abbr></label>
                    <input type="file" name="logo" class="form-control border-input{{ $errors->has('logo') ? ' is-invalid' : '' }}" id="logo">
                    @if ($errors->has('logo'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                 @endif
                    </div>
              </div>
                <div class="col-md-6">
                    <button type="submit" name="send" class="btn btn-dark"><i class="fas fa-plus-circle"></i></button>
                </div>
                       </div>
                    </div>
                </div>
            </div>
        </form>
        <a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fas fa-backward"></i></a>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection