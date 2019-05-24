@extends('layouts.master')
@section('content')

        <div class="col-md-6">
        <h2>  {{$job->name  }}: </h2>
        <i> Date Created : {{$job->created_at}} </i>
        <h5> {!! $job->description !!} </h5> 
        <h5> {!! $job->category !!} </h5> 
        <h5> {!! $job->placement !!} </h5> 
        <h5> {!! $job->status !!} </h5> 
        <h5> {!! $job->salary !!} </h5> 
        <a href="{{route('jobs.index')}}" class="btn btn-light pull-right">Back</a>
    </div>
       

@endsection