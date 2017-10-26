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
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/admin-style.css') }}">
        <link href="{{ asset('/css/elegant-icons-style.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/fullcalendar.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/jquery.easy-pie-chart.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/owl.carousel.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/widgets.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/style-responsive.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/xcharts.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/fullcalendar-new.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <!--page content starts here-->

        @yield('content')
        <!--Page content ends here-->

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
