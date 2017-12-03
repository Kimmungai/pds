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
        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/persistant_chat.css') }}">
        <!-- Admin Custom styles for calender-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <!--page content starts here-->
        <div class="container">
          <div class="row">
          <div class="strip"></div>
        <header>
          <div class="container">
            <div class="row">
              <div class="col-md-1 hidden-xs">
                <a href="/"><div class="pds-logo">
                  <!--<img class="img-responsive" src="{{ asset('/img/logo.png') }}" alt="WebDesignersCenter.com">-->
                </div></a>
              </div>
              <div class="col-md-7">
                <h1 class="site-title"><a  href="/">Web Designers Center</a></h1>
              </div>
              <div class="col-md-3 provider-btn hidden-xs">
                @if(!Auth::id())
                <a class="btn btn-primary" href="/service-provider-sign-up">Become a service provider</a>
                @endif
              </div>            <!--<div class="col-md-4 pds-email">
                <p>info@webdesignercenter.com</p>
              </div>-->
            </div>
          </div>
        </header>
      </div>
    </div>
        @yield('content')
        <!--Page content ends here-->
        <!--chat starts here-->

        <!--chat ends here-->
        <div class="container">
          <div class="row">
        <footer>
          <div class="triangle"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p><i class="fa fa-copyright"></i> Copyright © webdesignerscenter.com 2017</p>
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
      </div>
     </div>
        <script src="{{ asset('/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="<?php echo asset('js/vendor/jquery-3.2.1.min.js'); ?>"><\/script>')</script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Custom scripts for calender-->
        <script src="{{asset('/js/jquery-ui.min.js')}}"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-109033027-1','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109033027-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-109033027-1');
        </script>
        <script>
        function submit_form(id)
        {
          $("#"+id).submit();
        }
        </script>
    </body>
</html>
