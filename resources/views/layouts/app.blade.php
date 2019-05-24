<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css')}}">


    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;

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
                             <a class="nav-link" href="{{url('jobs_user')}}">Data User</a>
                         </li>
                            
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('job-request')}}">Job Request</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/cv-request')}}">CV Request</a>
                        </li>

                        @else
              
                        {{-- <li class="dropdown">
                          <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">MyJobs
                              <span class="caret"></span></button>
                              <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                MyJobs  <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu">    
                                <li>
                                      <a href="#"> Profile </a> 
                                </li>   
                                <li>
                                    <a href="#">Review</a> 
                                </li>
                              </ul>             
                        </li>   --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('user')}}"> Job Vacancy</a>  
                        </li>                              
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Profil</a>  
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('file')}}">My CV</a>  
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{url('notification')}}">Notification</a>  
                        </li>
                        @endif
                        @endauth

                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
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
            </div>
        </nav>

        @yield('content')
        
    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  @section('js')
</body>
</html>
