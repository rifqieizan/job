@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload Your CV</div>
                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            <div class="form-group {{ !$errors->has('description') ?: 'has-error' }}">
                                <label>Title</label>
                                <input type="text" name="description" class="form-control">
                                <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                                <label>File</label>
                                <input type="file" name="file">
                                <span class="help-block text-danger">{{ $errors->first('file') }}</span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection