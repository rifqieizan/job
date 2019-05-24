@extends('layouts.app')

@section('content')
 
  
    <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
    
        <div class="container">
                <div class="row" style="margin-top: 20px;"> 
               
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-name">Add Job</h4>
                    
                        {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group">
                                <label for="name"> name : </label> 
                                <input type="text" name="name" id="name" placeholder="name" class="form-control"/>
                             
                                 <div class="text-danger"> {{  $errors->first('name') }} </div>
                        </div>   

                        <div class="form-group">
                                <label for="description"> description : </label> 
                                    <input type="text" name="description" id="description" placeholder="description" class="form-control"/>
                            
                                 <div class="text-danger"> {{  $errors->first('description') }} </div>
                        </div>   
                            
                        <div class="form-group">
                                <label for="placement"> placement : </label> 
                                <input type="text" name="placement" id="placement" placeholder="placement" class="form-control"/>
                         
                                 <div class="text-danger"> {{  $errors->first('placement') }} </div>
                        </div>  

                        <div class="form-group">
                                <label for="category"> category : </label> 
                                <input type="text" name="category" id="category" placeholder="category" class="form-control"/>
                           
                                 <div class="text-danger"> {{  $errors->first('category') }} </div>
                        </div>   


                        <div class="form-group">
                                <label for="status"> salary : </label> 
                                <input type="text" name="salary" id="salary" placeholder="salary" class="form-control"/>
                                 {{-- atau input type title  --}}
                                 {{-- error->first() --}}
                                 
                                 <div class="text-danger"> {{  $errors->first('salary') }} </div>
                        </div>   


                        </div>
                        
                           
                        <div class="col-md-12 d-flex align-items-stretch grid-margin">
                            <button type="submit" class="btn btn-primary" id="submit">
                                        Submit
                            </button>
                            
                            <a href="{{url('jobs')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                </div>              
                   
        </div>
    </form>
@endsection