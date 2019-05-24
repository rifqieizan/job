@extends('layouts.master')

@section('content')
<div class="row" style="margin-top: 20px;"> 
<div class="card">
  <div class="card-body">
   
    <div class="table-responsive">
        <div class="col-lg-2">
    {{-- <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Create</a> --}}
  </div>
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th>
              No
            </th>
            <th>
              Nama
            </th>
            <th>
              Email
            </th>
            <th>
              Address
            </th>
            <th>
              Age
            </th>
            <th>
              CV
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td class="py-1">
            
            </td>
            <td>
            
              {{$user->name}}
            
            </td>

            <td>
              {{$user->email}}
            </td>
            <td>
              
              {{$user->address}}
            </td>
            <td>
              {{$user->age}}
            </td>
            <td>
              {{$user->id}}
            </td>
            <td>
                <div class="btn-group dropdown">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                  <a class="dropdown-item" href="#"> Edit </a>
                  <form action="#" class="pull-left"  method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                  </button>
                </form>
                 
                </div>
              </div>
                </td>
              </tr>
        @endforeach
        </tbody>
      </table>
    </div>
 {{--  {!! $jobs->links() !!} --}}
  </div>
</div>
</div>
@endsection