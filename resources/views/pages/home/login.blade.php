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
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
  <title>Admin Panel</title>

  <!-- page css -->
  <link href="/css/system/login-register-lock.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="/css/system/style.min.css" rel="stylesheet">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="loader">
      <div class="loader__figure"></div>
      <p class="loader__label">Admin panel</p>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../assets/images/background/login-register.jpg);">
    <div class="login-box card">
      <div class="card-body">
        {{-- <form class="form-horizontal form-material text-center" id="loginform" action="index.html"> --}}
        {{-- <form class="form-horizontal form-material text-center" method="POST" action="{{ route('login') }}"> --}}
        <form class="form-horizontal form-material text-center" method="POST">
          @csrf
          <a href="javascript:void(0)" class="db"><img src="../assets/images/logo-icon.png" alt="Home" /><br /><img src="../assets/images/logo-text.png" alt="Home" /></a>
          <div class="form-group m-t-40">
            <div class="col-xs-12">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Username">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              {{-- <input class="form-control" type="text" required="" placeholder="Username"> --}}
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              {{-- <input class="form-control" type="password" required="" placeholder="Password"> --}}
            </div>
          </div>
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase btn-rounded">
                {{ __('Login') }}
              </button>
              {{-- <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log In</button> --}}
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="/js/system/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="/js/system/popper.min.js"></script>
  <script src="/js/system/bootstrap.min.js"></script>
  <!--Custom JavaScript -->
  <script type="text/javascript">
    $(function() {
      $(".preloader").fadeOut();
    });
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
      $("#loginform").slideUp();
      $("#recoverform").fadeIn();
    });
  </script>

</body>

</html>