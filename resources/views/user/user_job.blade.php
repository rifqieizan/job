@extends('layouts.app')
@section('content')
<div class="container">
        <div class="card mb-2">
            
            <div class="card-body">
              <h2 class="card-title">{!! $job->name !!}</h2>
              <p class="card-text">Description : {!! $job->description !!}</small></p>
              <p class="card-text">Placement:  {!! $job->placement !!}</p>
              <p class="card-text"> Category : {!! $job->category !!}</p>
              <p class="card-text">salary : {!! $job->salary !!}</p>
              <div class = "pull-left">
              
                <form method="post" action="{{url('/job-request')}}">
                    {{ csrf_field() }}
                <a href="{{route('user.index')}}" class="btn btn-primary"> &larr; Back</a>
             
                {{-- <input type="hidden" value="{{ $job->id }}" name="job_id">
                <button type="submit" class="btn btn-info">Send Request</button> --}}

                @if($job->hasRequest)
                <button type="submit" class="btn btn-default" disabled="disabled">Apply Job</button>
                @else
                <input type="hidden" value="{{ $job->id }}" name="job_id">
                <button type="submit" class="btn btn-primary">Apply Job</button>
                @endif

              </form>

              @include('flash-message')
              </div>
            </div>
          
            
        </div>
</div>
        @endsection