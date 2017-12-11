<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Welcome to Web Designers Center</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url"           content="{{url()->current()}}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Welcome to Web Designers Center" />
        <meta property="og:description"   content="When you post your project at webd Designers Center, competent service providers will place bid on your project. You will then have a chance to select the best bidder based on the offer and the service provider's reputation!" />

        <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
        <link rel="apple-touch-icon" href="{{ asset('/icon.png') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/persistent_chat.css') }}">
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
                @if(!Auth::user())
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
        <div class="chat">
            <div id="toggle-chat" class="chat-btn">
                <a class="but" href="#">
                    <i class="fa fa-comments" aria-hidden="true"></i><span class="notify">2</span>
                </a>
            </div>
            <div class="chat-open">
                <div class="chat-container">
                <div class="contact-list">
                    <header><h5>メッセージ</h5><a href="#" class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></a></header>
                    <ul>
                        <li><a class="on" href="#">株式会社2<span class="unread">2</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社3<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="on" href="#">株式会社4<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社5<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社6<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社2<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社2<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社2<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社3<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                        <li><a class="off" href="#">株式会社4<i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="contact-message">
                <header><a class="back" href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> <h5 class="on">株式会社1</h5> <a href="#" class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></a></header>
                <div class="scroll">
                <article class="to">
                    <div class="date">2017/08/12 14:00</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vehicula est non lacinia fringilla. </p>
                </article>
                <article class="from">
                    <div class="date">2017/08/12 14:00</div>
                    <span class="name">田中　正和</span>
                    <p>Cras rutrum hendrerit erat, ut rhoncus eros rhoncus sed. Donec pellentesque est a justo porta viverra. Praesent et arcu tellus. </p>
                </article>
                <article class="from">
                    <div class="date">2017/08/12 14:00</div>
                    <span class="name">田中　正和</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vehicula est non lacinia fringilla. </p>
                </article>
                <article class="to">
                    <div class="date">2017/08/12 14:00</div>
                    <p>Cras rutrum hendrerit erat, ut rhoncus eros rhoncus sed. Donec pellentesque est a justo porta viverra. Praesent et arcu tellus. </p>
                </article>
                </div>
                <div class="input">
                    <textarea></textarea><a class="send" href="#">送信</a>
                </div>
                </div>
                </div>
            </div>
        </div>
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
                  <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
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
        <script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('/js/nogo.min.js')}}"></script>
        <script src="{{asset('/js/persistent_chat.js')}}"></script>

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
