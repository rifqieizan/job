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
      
          <div class="card">
            <div class="card-body">
              {{-- <a href="#" class="btn btn-xs btn-info pull-right">Create</a> --}}
              <div class="table-responsive">
                  @include('flash-message')
                
                <table class="table table-striped" id="table">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                          Email
                        </th>
                      <th>
                        Job Request
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Note
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
                        {{$job->email}}
                      </td>
                      
                      <td>
                        {{$job->job_name}}
                      </td>

                      <td>
                        @php
                        switch($job->status){
                          case '0':
                            $status = 'Waiting';
                          break;
                          case '1':
                            $status = 'Approved';
                          break;
                          case '2':
                            $status = 'Rejected';
                          break;
                        } 
                        @endphp

                        {{$status}}
                      </td>
                      <td>
                        {{$job->note}}
                      </td>
                      <td>
                          <div class="btn-group dropdown">

                            <form method="post" action="{{url('/job-request-approval')}}">
                              {{ csrf_field() }}
                              <input type="hidden" value="{{ $job->id }}" name="job_id">
                              <input type="hidden" value="1" name="status">
                              @if($job->status=='1')
                                <button type="submit" class="btn btn-default btn-xs" disabled="disabled" aria-haspopup="true" aria-expanded="false">
                                  Approve
                                </button>
                              @else
                              <button type="submit" class="btn btn-primary btn-xs" aria-haspopup="true" aria-expanded="false">
                                  Approve
                                </button>
                              @endif
                            </form>
                            
                            <form method="post" action="{{url('/job-request-approval')}}">
                              {{ csrf_field() }}
                              <input type="hidden" value="{{ $job->id }}" name="job_id">
                              <input type="hidden" value="2" name="status">
                              @if($job->status=='2')
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
           {{--  {!! $jobs->links() !!} --}}
            
          </div>
  </div>



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