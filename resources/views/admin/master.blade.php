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

  <!-- Custom styles for this template -->
 
  <link href="{{asset('vendors/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>



        <body id="page-top">

                <!-- Page Wrapper -->
                <div id="wrapper">
              
                  <!-- Sidebar -->
                  @include('admin.sidebar')
                  <!-- End of Sidebar -->
              
                  <!-- Content Wrapper -->
                  <div id="content-wrapper" class="d-flex flex-column">
              
                    <!-- Main Content -->
                    @include('admin.navbar')
              
                     
                      <!-- End of Topbar -->
                      <div class="container-fluid">
                       
                        @yield('content')
                        <!-- Page Heading -->              
                      </div>
                      
              
                    </div>
                    <!-- End of Main Content -->
              
                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                      <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                          <span>Copyright &copy; Your Website 2019</span>
                        </div>
                      </div>
                    </footer>
                    <!-- End of Footer -->
              
                  </div>
                  <!-- End of Content Wrapper -->
              
                </div>
                <!-- End of Page Wrapper -->
              
                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                  <i class="fas fa-angle-up"></i>
                </a>
              
               

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendors/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>

    
  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

    
</body>

</html>
