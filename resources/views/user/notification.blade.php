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
                        <a href="#0" class="btn btn-disable">Notification Status</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notifications as $notification)
                                    <tr>
                                        <td> {{$notification->name}} </td>
                                        <td>{{$notification->type}}</td>
                                        @if($notification->status==4)
                                            <td>None</td>
                                        @elseif($notification->status==1)
                                            <td>Approved</td>
                                        @elseif($notification->status==2)
                                            <td>Rejected</td>
                                        @else
                                            <td>Waiting Approval</td>
                                        @endif
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