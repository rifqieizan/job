@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> </div>
                <div class="panel-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p>
                        <a href="#" class="btn btn-disable">Notification Status</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>CV</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $file)
                                    <tr>
                                        <td> {{$file->name}} </td>
                                        <td> {{$file->email}} </td>
                                        <td>{{$file->description}}</td>
                                        <td>
                                                <div class="btn-group dropdown">
                      
                                                  <form method="post" action="{{url('/cv-approval')}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $file->id }}" name="file_id">
                                                    <input type="hidden" value="1" name="status">
                                                    @if($file->status=='1')
                                                      <button type="submit" class="btn btn-default btn-xs" disabled="disabled" aria-haspopup="true" aria-expanded="false">
                                                        Approve
                                                      </button>
                                                    @else
                                                    <button type="submit" class="btn btn-primary btn-xs" aria-haspopup="true" aria-expanded="false">
                                                        Approve
                                                      </button>
                                                    @endif
                                                  </form>
                                                  
                                                  <form method="post" action="{{url('/cv-approval')}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $file->id }}" name="file_id">
                                                    <input type="hidden" value="2" name="status">
                                                    @if($file->status=='2')
                                                      <button type="submit" class="btn btn-default btn-xs" disabled="disabled" aria-haspopup="true" aria-expanded="false">
                                                          Reject
                                                      </button>
                                                    @else
                                                      <button type="submit" class="btn btn-danger btn-xs" aria-haspopup="true" aria-expanded="false">
                                                          Reject
                                                      </button>
                                                    @endif
                                                  </form>
                                              </div>
                                                </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection