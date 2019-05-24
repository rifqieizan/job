@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-2">
        @foreach ($jobs as $job)
        <div class="card-body">
          <h2 class="card-title">{!! $job->name !!}</h2>
          <p class="card-text">Description : {!! $job->description !!}</small></p>
          <p class="card-text">Placement:  {!! $job->placement !!}</p>
          <p class="card-text"> Category : {!! $job->category !!}</p>
          <p class="card-text">salary : {!! $job->salary !!}</p>
          <a href="{{url('user',$job->id)}}" class="btn btn-primary">Detail &rarr;</a>
        </div>
        @endforeach 
        
    </div>
    
</div>
       
@endsection
