<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css')}}">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

</head>

<body>
    
  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm   navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Company Profile</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          
          @auth 
          @if (Auth::user()->hasRole('admin'))

          <li class="nav-item">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
          </li>
            
          <li class="dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  Manage Jobs  <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <a href="{{route('jobs.create')}}" >
                          Create Jobs
                      </a> 
                  </li>
                  <li>
                      <a href="{{url('/jobs')}}">Jobs Index</a>
                  </li>
              </ul>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" href="{{url('jobs_user')}}">Manage User</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{url('job-request')}}">Job Request</a>
          </li>
          
          @else
              
          <li class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">MyJobs
                <span class="caret"></span></button>
                {{-- <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  MyJobs  <span class="caret"></span>
                </a> --}}
                <ul class="dropdown-menu">    
                  <li>
                        <a href="#"> Profile </a> 
                  </li>   
                  <li>
                      <a href="#">Review</a> 
                  </li>
                </ul>             
          </li>             
        
                <a class="nav-link" href="{{url('file')}}">Upload CV</a>  
          </li>     
              
       
            @endif
          @endauth
         
          <li class="nav-item">
            <div id="app">
                <nav class="navbar navbar-default navbar-static-top">
                  <div class="navbar-header">      
                    </div>       
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                &nbsp;
                            </ul>       
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                      </a>
                                      <ul class="dropdown-menu">
                                      <li>
                                     <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      Logout
                                     </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                 </li>
                            </ul>
                          </li>
                       @endguest
                    </ul>
                  </div>
              </nav>  
            </div>
          </li>
        </ul>     
      </div> 
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4"> Jobs Vacancy </h1>
        <!-- Blog Post -->
        @yield('content')
      </div>

      @guest
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>
      @endguest
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  {{-- <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer> --}}

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  @section('js')
</body>

</html>
