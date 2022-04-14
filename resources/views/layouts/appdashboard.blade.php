<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">  
        <!-- App-dark css -->
        <link href="{{ asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled"/>
        <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled"/>
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- icons -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/libs/yearpicker/yearpicker.css')}}">     
        @yield('css')
    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-end mb-0"> 
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="contacts-profile.html" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>
    
                                <!-- item-->
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>
    
                            </div>
                        </li>
    
                        
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="/dashboard" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="16">
                            </span>
                        </a>
                        <a href="/dashboard" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="16">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
    
                        <li>
                            <h4 class="page-title-main">Dashboard</h4>
                        </li>
            
                    </ul>

                    <div class="clearfix"></div> 
               
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                     <!-- User box -->
                    <div class="user-box text-center">

                        <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                            <div class="dropdown">
                                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false"> {{ Auth::user()->name }}</a>
                                <div class="dropdown-menu user-pro-dropdown">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-user me-1"></i>
                                        <span>My Account</span>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-lock me-1"></i>
                                        <span>Lock Screen</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        <p class="text-muted left-user-info"> {{ Auth::user()->level }}</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>
                
                            <li>
                                <a href="/dashboard">
                                    <i class="mdi mdi-view-dashboard-outline"></i>                            
                                    <span> Dashboard </span>
                                </a>
                            </li>                                                
                            @if(Auth::user()->level =='Admin')
                            <li class="menu-title mt-2">Management</li>
                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-multiple-plus-outline"></i>
                                    <span> Admin Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="/dashboard/tahun">Set Tahun Aktif</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/guru">Data Guru</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/siswa">Data Siswa</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/wali">Data Walimurid</a>
                                        </li>
                                        <li>
                                            <a href="#sidebarMultilevel44" data-bs-toggle="collapse" class="" aria-expanded="true">
                                                Data Kejuruan <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel44" style="">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="/dashboard/bidang">Bidang Studi</a>
                                                    </li>
                                                    <li>
                                                        <a href="/dashboard/kompetensi">Kompetensi Keahlian</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="/dashboard/kelas">Data Kelas</a>
                                        </li>
                                        <li>
                                            <a href="#sidebarMultilevel22" data-bs-toggle="collapse" class="" aria-expanded="true">
                                                Data Mata Pelajaran <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel22" style="">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="/dashboard/mapel">Data Mapel Umum</a>
                                                    </li>
                                                    <li>
                                                        <a href="/dashboard/mapel-kejuruan">Data Mapel Kejuruan</a>
                                                    </li>
                                                    <li>
                                                        <a href="/dashboard/ekstra">Data Ekstrakulikuler</a>
                                                    </li>
                                                </ul>
                                            </div>                                            
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>                            
                    
                            <li>
                                <a href="#setdata" data-bs-toggle="collapse">
                                    <i class="mdi mdi-notebook-multiple"></i>
                                    <span> Set Data </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="setdata">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="/dashboard/set_kelas">Set Kelas</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/set_mapel">Set Guru Mapel Umum</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/set_mapel">Set Guru Mapel Keahlian</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/set_walikelas">Set Wali Kelas</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @elseif(Auth::user()->level =='Guru')
                            <li class="menu-title mt-2">Management</li>
                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i class="mdi mdi-account-multiple-plus-outline"></i>
                                    <span> Guru Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="/dashboard/tahun">Set Tahun Aktif</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/guru">Data Guru</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/siswa">Data Siswa</a>
                                        </li>                             
                                    </ul>
                                </div>
                            </li>
                            @endif
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                            @yield('content')
                            </div>
                        </div>
                        <!-- end row -->        
                        
                    
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Adminto theme by <a href="">Coderthemes</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->

        <!-- Vendor -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
   
       

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>

        <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{ asset('assets/libs/yearpicker/yearpicker.js')}}"></script>


       

        
        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        @yield('js')
    </body>
</html>