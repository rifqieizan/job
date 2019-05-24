@extends('admin.master')
@section('content')

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Welcome to Admin Dashborad : {{ Auth::user()->name }}</h1>
    <a href="{{route('jobs.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Create</a>

  
  </div>

@endsection