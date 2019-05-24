@extends('layouts.app')

@section('content')
<div class="container">
<div class="row" style="margin-top: 20px;"> 
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            
            <th>
              Nama
            </th>
            <th>
              Email
            </th>
            <th>
              Address
            </th>
            {{-- <th>
              Age
            </th>
            <th>
              CV
            </th> --}}
            {{-- <th>
              Action
            </th> --}}
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            
            <td>
            
              {{$user->name}}
            
            </td>

            <td>
              {{$user->email}}
            </td>
            <td>
              
              {{$user->address}}
            </td>
            {{-- <td>
              {{$user->age}}
            </td>
            <td>
              {{$user->id}}
            </td> --}}
        
                </div>
              </div>
                
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