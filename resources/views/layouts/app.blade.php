<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nitda') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
<!--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style.green.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/custom.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
    <!--<div id="app">-->

    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index-2.html" class="navbar-brand"><img src="{{asset("assets/images/nitda-logo-png.png")}}" alt="logo" class="d-none d-lg-block"><img src="{{asset("assets/vendor/img/logo-small.png")}}" alt="logo" class="d-block d-lg-none"><span class="sr-only">Go to homepage</span></a>
          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="fa fa-bars"></i></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route("index")}}" class="nav-link">Home <span class="sr-only">(current)</span></a></li>
                @if(Auth::guard('applicant')->check())
                    <li class="nav-item"><a href="{{route('applicant.dashboard')}}" class="nav-link">DashBoard</a></li>
                    <li class="nav-item dropdown">
                        <a id="clientZone" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                            Account
                        </a>
                        <div aria-labelledby="clientZone" class="dropdown-menu">
                            <a href="{{route('applicant.profile.edit')}}" class="dropdown-item">Edit Account Info</a>
    <!--                        <a href="client-dashboard.html" class="dropdown-item">Dashboard</a>-->
                            <a href="{{route('applicant.profile.changePassword')}}" class="dropdown-item">Change Password</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{route("applicant.logout")}}" class="nav-link">Logout({{Auth::guard('applicant')->user()->fullname}})</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="clientZone" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                            Login
                        </a>
                        <div aria-labelledby="clientZone" class="dropdown-menu">
                            <a href="{{route("applicant.login")}}" class="dropdown-item">Login</a>
    <!--                        <a href="client-dashboard.html" class="dropdown-item">Dashboard</a>-->
                            <a href="{{route("applicant.register")}}" class="dropdown-item">Register</a>
                        </div>
                    </li>
                @endif
                <li class="nav-item"><a href="about.html" class="nav-link">FAQ</a></li>
              <!--<li class="nav-item dropdown"><a href="#loginModal" data-toggle="modal" class="btn navbar-btn btn-outline-light mb-5 mb-lg-0"> <i class="fa fa-sign-in"></i>Login</a></li>-->
            </ul>
          </div>
        </div>
      </nav>
    </header>
        <main class="py-4">
            @yield('content')
        </main>
    <!--</div>-->
    <footer class="footer">
      <div class="footer__block">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
              <h4 class="h5">NITDA HQ</h4>
              <p>
                NITDA HQ
                No 28, Port Harcourt Crescent, Off Gimbiya Street P.M.B 564, Area 11, Garki Abuja, Nigeria
              </p>
                  
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
              <h4 class="h5">USEFUL LINKS</h4>
              <ul class="list-unstyled">
                <li><a href="client-register.html">Login or Register</a></li>
                <li><a href="client-dashboard.html">Dashboard</a></li>
                <li><a href="client-applicants.html">Applicants</a></li>
                <li><a href="client-job.html">Post a new job</a></li>
              </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
              <h4 class="h5">CONNECT WITH US</h4>
              <p class="social"><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></p>
            </div>
            <div class="col-lg-3 col-md-12 mb-5">
              <h4 class="h5">VACANCY UPDATES</h4>
              <p>Sign up to get weekly portion of fresh jobs and news from us.</p>
              <form class="footer__newsletter">
                <div class="input-group">
                  <input type="text" placeholder="Enter your email address" aria-describedby="emailAddress" class="form-control">
                  <div class="input-group-append">
                    <button id="emailAddress" type="button" class="btn btn-default input-group-text"><i class="fa fa-send"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="footer__copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-md-left text-center">
              <p>&copy;{{date("Y")}} NITDA</p>
            </div>
            <div class="col-md-6 text-md-right text-center">
              <p class="credit">Developed by <a href="https://ondrejsvestka.cz/">Atunje</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
