<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SD Negeri 1 Sruweng</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #497174">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon rotate-n-0">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SD Negeri 1 Sruweng </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Halaman Utama</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Silabus</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Fitur:</h6> 
                            <div class="dropdown">
                                <a class="collapse-item" type="button" data-toggle="dropdown" >Kelas 1</a>
                                  <div class="dropdown-menu" >
                                    <a href="" class="dropdown-item" type="button">Kompetensi Inti</a> 
                                    <a href="" class="dropdown-item" type="button">Kompetensi Dasar</a> 
                                  </div> 
                                  </div>
                                <div class="dropdown">
                                <a class="collapse-item" type="button" data-toggle="dropdown" >Kelas 2</a>
                                  <div class="dropdown-menu" >
                                    <a href="" class="dropdown-item" type="button">Kompetensi Inti</a> 
                                    <a href="" class="dropdown-item" type="button">Kompetensi Dasar</a> 
                                  </div> 
                              </div>
                              <div class="dropdown">
                                <a class="collapse-item" type="button" data-toggle="dropdown" >Kelas 3</a>
                                  <div class="dropdown-menu" >
                                    <a href="" class="dropdown-item" type="button">Kompetensi Inti</a> 
                                    <a href="" class="dropdown-item" type="button">Kompetensi Dasar</a> 
                                  </div>
                                  </div>
                                  <div class="dropdown"> 
                                <a class="collapse-item" type="button" data-toggle="dropdown" >Kelas 4</a>
                                  <div class="dropdown-menu" >
                                    <a href="" class="dropdown-item" type="button">Kompetensi Inti</a> 
                                    <a href="" class="dropdown-item" type="button">Kompetensi Dasar</a> 
                                  </div> 
                              </div>
                              <div class="dropdown">
                                <a class="collapse-item" type="button" data-toggle="dropdown"  >Kelas 5</a>
                                  <div class="dropdown-menu" >
                                    <a href="" class="dropdown-item" type="button">Kompetensi Inti</a> 
                                    <a href="" class="dropdown-item" type="button">Kompetensi Dasar</a> 
                                  </div> 
                              </div>
                              <div class="dropdown">
                                <a class="collapse-item" type="button" data-toggle="dropdown" >Kelas 6</a>
                                  <div class="dropdown-menu" >
                                    <a href="/kompetensiInti/6" class="dropdown-item">Kompetensi Inti</a> 
                                    <a href="/kompetensiDasar/6" class="dropdown-item" >Kompetensi Dasar</a> 
                                  </div> 
                            </div>
                    </div>
                </div>
            </li>

        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rpp"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list"></i>
                    <span>RPP</span>
                </a>
                <div id="rpp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Fitur :</h6>
                        <a class="collapse-item" href="/rpp">Lihat</a> 
                        @if(Auth::user()->role!=0) 
                        <a class="collapse-item" href="verifRpp">Verifikasi</a> 
                        @endif
                    </div>
                </div>
            </li>   
            <li class="nav-item">
                <a class="nav-link collapsed"  data-toggle="collapse" data-target="#evaluasi"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Evaluasi</span>
                </a>
                <div id="evaluasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Fitur :</h6>
                        <a class="collapse-item" href="/evaluasi">Lihat</a> 
                    </div>
                </div>
            </li> 
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background: #eff5f5">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background: ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
 

                    <!-- Topbar Navbar -->
                     <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 
                                    <span class="mr-2 d-none d-lg-inline text-gray-600">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle"
                                    src="{{asset('img/undraw_profile.svg')}}" style="padding-left: 5px" >
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </nav>
                <!-- End of Topbar -->

        <main class="py-4">
            @yield('content')
        </main>
    <!-- End of Main Content -->

            <!-- Footer -->
   
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    </div>

        <!-- Bootstrap core JavaScript--> 
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>


</body>
</html>
