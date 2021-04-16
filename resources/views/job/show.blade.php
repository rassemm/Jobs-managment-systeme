@extends('layouts.master')

@section('content')
    
<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col">
          <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i>Job: {{ $job->titre }}
              </div>
           
       
    <div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
             
                 
                 
            <div class="form-group">
             
            <h4> Title:   {{$job->titre }}</h4>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
               <h4> Salaire :{{ $job->salaire }} </h4> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
              <p>{{ $job->description}}</p>  
           
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>Date de fin:</h4>
            <h5 class="badge badge-danger">    {{ $job->end_date}}</h5>
            </div>
                 
        </div>
    </div>
    <div class="pull-right">
        <a href="{{ url()->previous() }}" class="btn btn-primary">{{ __('Return') }}</a>
                </div>
        </div>
    </div>
@endsection