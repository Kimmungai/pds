<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Welocome to WebDesignersCenter.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
        <link rel="apple-touch-icon" href="{{ asset('/icon.png') }}">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <!--page content starts here-->
        <header>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="pds-logo" style="background-color:#fff;">
                  <img class="img-responsive" src="{{ asset('/img/logo.png') }}" alt="WebDesignersCenter.com">
                </div>
              </div>
              <div class="col-md-2 provider-btn hidden-xs">
                <a class="btn btn-primary" href="#">Become a service provider</a>
              </div>
              <div class="col-md-4 pds-email">
                <p>info@webdesignercenter.com</p>
              </div>
            </div>
          </div>
        </header>
        <nav class="navbar navbar-inverse pds-menu-bar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">How it works</a></li>
              <li><a href="#">About us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
        </nav>
        <div class="slider">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h1>Power to choose!</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <p>Have companies bid for your project and select the best!</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5 project-btn pull-right">
                <a class="btn btn-primary" href="#">Post a new project</a>
              </div>
            </div>
         </div>
        </div>
        @yield('content')
        <!--Page content ends here-->
        <footer>
          <div class="triangle"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <p><i class="fa fa-copyright"></i> webdesignerscenter.com</p>
              </div>
              <div class="col-md-6">
                <ul class="list-inline pull-right">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Terms & privacy</a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pull-right col-md-offset-2 social">
                <ul class="list-inline pull-right">
                  <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
        <script src="{{ asset('/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="<?php echo asset('js/vendor/jquery-3.2.1.min.js'); ?>"><\/script>')</script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
