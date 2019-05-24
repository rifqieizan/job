@extends('layouts.app')
@section('content')
<div class="card text-center">
        <div class="card-header">
          Job Vacancy
        </div>
        <div class="card-body">
                @guest
                <div class="container">
                    @foreach ($jobs as $job)
                    <div class="card-body">
                            <h2 class="card-title">{!! $job->name !!}</h2>
                            <p class="card-text"> <b> Description </b> : {!! $job->description !!}</small></p>
                            <p class="card-text"><b>Placement: </b>  {!! $job->placement !!}</p>
                            <p class="card-text"><b> Category : </b> {!! $job->category !!}</p>
                            <p class="card-text"><b>salary :</b>  {!! $job->salary !!}</p>
                            <a href="{{url('user',$job->id)}}" class="btn btn-primary">Daftar &rarr;</a>
                          </div>
                    @endforeach
                </div>
                @endguest
        </div>
       
      </div>
 @endsection