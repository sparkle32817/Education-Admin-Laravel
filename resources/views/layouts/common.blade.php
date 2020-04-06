<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
  <title>Admin Panel</title>
  <!-- Custom CSS -->
  <link href="{{ asset('css/system/style.min.css') }}" rel="stylesheet">

  <!-- Page CSS -->
  <!-- <link href="dist/css/pages/icon-page.css" rel="stylesheet"> -->

  @yield('page-header')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue fixed-layout">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="loader">
      <div class="loader__figure"></div>
      <p class="loader__label">Admin Panel</p>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
          <a class="navbar-brand" href="{{'/'}}">
            <!-- Logo icon --><b>
              <img src="/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b>
          </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav mr-auto">
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
            <!-- ============================================================== -->
          </ul>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->
          <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- User Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown u-pro">
              <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/images/1.jpg" alt="user" class=""> <span class="hidden-md-down">Administrator &nbsp;<i class="fa fa-angle-down"></i></span> </a>
              <div class="dropdown-menu dropdown-menu-right animated flipInY">
                <!-- text-->
                <a href="{{'/'}}" class="dropdown-item"><i class="ti-user"></i> Dashboard </a>
                <!-- text-->
                {{-- <a href="{{'/logout'}}" class="dropdown-item">
                <i class="fa fa-power-off"></i>
                Logout
                </a> --}}
                {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a> --}}

                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form> --}}
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- End User Profile -->
            <!-- ============================================================== -->
            <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"></a></li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <li class="user-pro">
              <a href="javascript:void(0)">
                <img src="/images/1.jpg" alt="user-img" class="img-circle">
                <span class="hide-menu">Administrator</span>
              </a>
            </li>
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">User Management</span></a>
              <ul aria-expanded="false" class="collapse">
                <li><a href="{{'/education'}}">Education</a></li>
                <li><a href="{{'/tutor'}}">Tutor</a></li>
                <li><a href="{{'/student'}}">Student</a></li>
              </ul>
            </li>
            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Other Settings</span></a>
              <ul aria-expanded="false" class="collapse">
                <li><a href="{{'/grade'}}">Grade & Subject</a></li>
                <li><a href="{{'/activity'}}">Extra Activity</a></li>
                <li><a href="{{'/location'}}">Service Area &<br> Experience</a></li>
                <li><a href="{{'/personal'}}">Qualification &<br> Certification</a></li>
              </ul>
            </li>
            {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-book"></i><span class="hide-menu">Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{'/payment'}}">Statistic</a></li>
          </ul>
          </li> --}}
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">@yield('page-title')</h4>
          </div>
          <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                <li class="breadcrumb-item active">@yield('page-title')</li>
              </ol>
            </div>
          </div>
        </div>
        @yield('content')
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
      © 2020 Admin Panel for Education
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="{{ asset('js/system/jquery-3.2.1.min.js') }}"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="{{ asset('js/system/popper.min.js') }}"></script>
  <script src="{{ asset('js/system/bootstrap.min.js') }}"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="{{ asset('js/system/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{ asset('js/system/waves.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{ asset('js/system/sidebarmenu.js') }}"></script>
  <!--stickey kit -->
  <script src="{{ asset('js/system/sticky-kit.min.js') }}"></script>
  <script src="{{ asset('js/system/jquery.sparkline.min.js') }}"></script>
  <!--Custom JavaScript -->
  <script src="{{ asset('js/system/custom.min.js') }}"></script>

  @yield('page-footer')
</body>

</html>