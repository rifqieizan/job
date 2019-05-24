@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload  File</div>
                <div class="panel-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <p>
                        <h5> click upload File if you haven't upload your cv </h5>
                        @if(isset($file->status)&&($file->status<>1))
                        <a href="#" class="btn btn-default" disabled="disabled">Upload File</a>
                        @elseif(isset($file->status)&&($file->status<>4))
                        <a href="#" class="btn btn-default" disabled="disabled">Upload File</a>
                        @elseif(isset($file->status)&&($file->status<>2))
                        <a href="#" class="btn btn-default" disabled="disabled">Upload File</a>
                        @else
                        <a href="{{ route('file.form') }}" class="btn btn-primary" disabled="disabled">Upload File</a>
                        @endif
                    
                    </p>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Path</th>
                                    <th>URL</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th>Send</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $file->description }}</td>
                                        <td>{{ $file->filename }}</td>
                                        <td>
                                            <a href="{{ Storage::url($file->filename) }}">
                                                View
                                            </a>
                                        </td>
                                        <td>{{ $file->created_at->diffForHumans() }}</td>
                                        @if($file->status==4)
                                        <td>None</td>
                                        @elseif($file->status==1)
                                        <td>Approved</td>
                                        @elseif($file->status==2)
                                        <td>Rejected</td>
                                        @else
                                        <td>Waiting Approval</td>
                                        @endif
                                        <td>  
                                            <p>
                                                @if(isset($file->status)&&($file->status==4))
                                                <form method="post" action="{{ route('file.send') }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="0" name="status">
                                                        <input type="hidden" value="{{ $file->id }}" name="file_id">
                                                        <button type="submit" class="btn btn-primary">Send CV</button>
                                                </form>
                                                @elseif(isset($file->status)&&($file->status==2))
                                                <a href="{{ route('file.send') }}" class="btn btn-default" disabled="disabled">Upload lang</a>                                                         
                                               
                                                @elseif(isset($file->status)&&($file->status==1))
                                                <a href="{{ route('file.send') }}" class="btn btn-default" disabled="disabled">Send CV</a>    
                                                @else
                                                <a href="{{ route('file.send') }}" class="btn btn-default" disabled="disabled">unable to click</a>    
                                                @endif
                                            </p> 
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