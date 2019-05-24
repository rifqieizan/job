@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').jobTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop

@extends('layouts.app')
@section('content')
<div class="container">
      <div class="row" style="margin-top: 20px;"> 
          <div class="card">
            <div class="card-body">
              {{-- <a href="#" class="btn btn-xs btn-info pull-right">Create</a> --}}
              <div class="table-responsive">
                  
                {{-- <div class="col-lg-2">
                  <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Create</a>
                </div> --}}
                <table class="table table-striped" id="table">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>
                        Jobs Name
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Published
                      </th>
                      <th>
                        Category
                      </th>
                      <th>
                        salary
                      </th>
                      <th>
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($jobs as $job)
                    <tr>
                      <td class="py-1">
                      
                      </td>
                      <td>
                      
                        {{$job->name}}
                      
                      </td>

                      <td>
                        {{$job->description}}
                      </td>
                      
                        <td>

                        {{-- {{$job->status}} --}}
                        <div class="col-md-2 sm-4">              
                            <form action="{{route('jobs.update',$job->id)}}"  method="post">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="float-sm-right">
                                        <input  type="checkbox" name="status" {{$job->status === 'show'  ? 'checked' : ''}} onchange="this.form.submit()" />
                                    </div>
                            </form>
                        </div> 
                        {{-- @if ($job->status=='hide')
                        <td style="width:20%"> <button type="submit" class="btn btn-raised btn-primary" id="show-hide">
                          <i class="glyphicon glyphicon-eye-open" > </i> show </button>
                            
                        @else
                        <td style="width:20%"> <button type="submit" class="btn btn-raised btn-primary" id="show-hide">
                            <i class="glyphicon glyphicon-eye-close" > </i> hide </button>
                            
                        @endif --}}
                        </td>

                      <td>
                        {{$job->category}}
                      </td>
                      <td>
                        {{$job->salary}}
                      </td>
                      <td>
                          <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('jobs.edit', $job->id)}}"> Edit </a></li>
                                <li>
                                    <form action="{{ route('jobs.destroy', $job->id) }}" class="pull-left"  method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete </a>
                                    </form>
                                  </li>
                             
                              </ul>
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
       
          

    {{-- @foreach ($jobs as $job)
    <article class="row">
     <div class="col-md-12 pl-3 pt-2">
        <h1>{!! $job->name !!}</h1>
        <p class="card-text"> Description : {!! $job->description !!}</h1>
        <p class="card-text"> Placement:  {!! $job->placement !!}</p>
        <p class="card-text"> Category : {!! $job->category !!}</p>
         
        <p class="card-text">salary : {!! $job->salary !!}</p>
        
        <a href="{{route('jobs.show',$job->id)}}" class="btn btn-primary">Read More &rarr;</a>  
        <a href="{{route('jobs.edit',$job->id)}}" class="btn">Edits </a>  
 
        <form action="{{ route('jobs.destroy', $job->id) }}" class="pull-left"  method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus job ini?')"> Delete
            </button>
          </form>
     </div>
    </article>
    <div class="card-footer text-muted">
         Posted on : {{$job->created_at}} by
        
        <a href="#">Admin</a>
      </div>
    @endforeach --}}

  </div>


  <div class="card mb-4">
 
    <div class="card-body">
      <h2 class="card-title">Web Programmer</h2>
      <p class="card-text">Make an application as mentioned as designed and Maintenance <small>Bandung, West Java</small></p>
      
      <p class="card-text">IDR 4.000.000 - 5.000.0000</p>
      <a href="#" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Posted on January 1, 2017 by
      <a href="#">Admin</a>
    </div>
  </div>

  <div class="card mb-4">
 
    <div class="card-body">
      <h2 class="card-title">Web Programmer</h2>
      <p class="card-text">Make an application as mentioned as designed and Maintenance <small>Bandung, West Java</small></p>
      
      <p class="card-text">IDR 4.000.000 - 5.000.0000</p>
      <a href="#" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Posted on January 1, 2017 by
      <a href="#">Admin</a>
    </div>
  </div>
  
        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>
 @endsection

 <script  src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

<script> 
    $(document).click(function() {    
      $('#show-hide').click(function(){
        id=$(%id-job).val();
        $.ajax({
        url: '/jobs'+id,
        type: 'PUT',
        dataType: 'json',
        data: {
          'token': $('input[name_token]').val()
          'id': $('$id-job').val()
        },

        success: function(data){
        $('#data-content').html(data['view']);
        console.log(data);
        },

       

        });
      });   
    });
</script>