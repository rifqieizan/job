@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('jobs.update',$job->id)}}" method="post" class="form-horizontal"> 

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $job->name }}" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>  
                
                <label for="description" class="col-md-4 control-label">description</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control" name="description" value="{{ $job->description }}" required>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>  

                <label for="placement" class="col-md-4 control-label">placement</label>
                <div class="col-md-6">
                    <input id="placement" type="text" class="form-control" name="placement" value="{{ $job->placement }}" required>
                    @if ($errors->has('placement'))
                        <span class="help-block">
                            <strong>{{ $errors->first('placement') }}</strong>
                        </span>
                    @endif
                </div> 

              
                
                <label for="category" class="col-md-4 control-label">category</label>
                <div class="col-md-6">
                    <input id="category" type="text" class="form-control" name="category" value="{{ $job->category }}" required>
                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div> 

                <label for="salary" class="col-md-4 control-label">salary</label>
                <div class="col-md-6">
                    <input id="salary" type="text" class="form-control" name="salary" value="{{ $job->salary }}" required>
                    @if ($errors->has('salary'))
                        <span class="help-block">
                            <strong>{{ $errors->first('salarys') }}</strong>
                        </span>
                    @endif
                </div> 

             
                {{-- <div class="col-md-2 sm-4">  
                        <label for="status" class="col-md-4 control-label">status  </label>               
                        <form action="{{route('jobs.update',$job->id)}}"  method="post">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="float-sm-right">
                                    <input  type="checkbox" name="status" {{$job->status === 'show'  ? 'checked' : ''}} onchange="this.form.submit()" />
                                </div>
                        </form>
                    </div>  --}}

                
        </div>
    </form>
    <div class="col md 6">
            <button type="submit" class="btn btn-primary" id="submit"> Update </button>
            <a href="{{route('jobs.index')}}" class="btn btn-light pull-right">Back</a>
            </div>
    </div>
    @endsection

