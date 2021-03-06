<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="google-site-verification" content="p2naW7Ty4Uv1MLYKYwch9h5kvmtUOUk7emry0_ITiKg" />
        <meta name="msvalidate.01" content="7360C3A933550859070D52E33151A1A9" />
        <title>{{Route::currentRouteName()}} | Post Your Project and Get competitve bids </title>
        @if(Route::getCurrentRoute()->uri() == '/')
          <meta name="description" content="Simply post a project, get bids from industry leaders, review each bidder’s profile and choose the best offer!">
        @elseif(Route::getCurrentRoute()->uri() == '/projects')
          <meta name="description" content="Create a service provider account to access the various web, e-commerce, mobile apps, blogs and many other projects. ">
        @elseif(Route::getCurrentRoute()->uri() == '/about-us')
          <meta name="description" content="Through our bidding system, clients get best market prices for their projects while service providers access lucrative projects available for bidding!">
        @else
          <meta name="description" content="At web designers center, we strive to sustain a win-win environment for both clients and web developers through our high-tech bidding system. ">
        @endif
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Web design, Mobile app, E-learning, Website project, Blog project, Online bidding, Nairobi web Designers, Kenya online projects, service providers, bidders">
        <meta property="og:url"           content="{{url()->current()}}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Welcome to Web Designers Center" />
        <meta property="og:description"   content="Submit a website, mobile app, blog, etc project and receive bids from various tech companies in our system!" />
        <meta property="og:image"         content="{{ url('/img/logo.png') }}" />

        <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
        <link rel="apple-touch-icon" href="{{ asset('/icon.png') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        @if(Auth::user())
          <link rel="stylesheet" href="{{ asset('/css/persistent_chat.css') }}">
        @endif
        <!-- Admin Custom styles for calender-->
        @if(Route::getCurrentRoute()->uri() != '/')
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
        @endif
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
              <div class="col-md-1 hidden-xs hidden-sm">
                <a href="/"><div class="pds-logo">
                  <img class="img-responsive" src="{{ asset('/img/logo.png') }}" alt="Web Designers Center Logo">
                </div></a>
              </div>
              <div class="col-md-7">
                <h2 class="site-title"><a  href="/">Web Designers Center</a></h2>
              </div>
              <div class="col-md-3 provider-btn hidden-xs hidden-sm">
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
        @if(Auth::user())
        <!--chat starts here-->
        <div class="chat">
            <div id="toggle-chat" class="chat-btn" onclick="load_contacts()">
                <a class="but" href="#">
                    <span class="fa fa-comments" aria-hidden="true"></span><span id="notify-new_messages"></span>
                </a>
            </div>
            <div class="chat-open">
                <div class="chat-container">
                <div class="contact-list">
                    <header><h5>Contacts</h5><a href="#" class="pull-right close"><span class="fa fa-times" aria-hidden="true"></span></a></header>
                    <ul id="provider-list">

                    </ul>
                </div>
                <div class="contact-message">
                <header><a class="back" href="#"><span class="fa fa-chevron-left" aria-hidden="true"></span></a> <h5 id="chat_window_header"></h5><a href="#" class="pull-right close"><span class="fa fa-times" aria-hidden="true"></span></a></header>
                <div id="message-list" class="scroll">
                </div>
                <div class="input">
                  <input id="chat_provider_id" name="chat_provider_id" type="hidden" />
                  <input id="chat_client_id" name="chat_client_id" type="hidden" />
                    <textarea id="chat-message" onkeyup="capture_enter_key(event)"></textarea><a class="send" href="#" onclick="send_chat_message(event)">Send</a>
                </div>
                </div>
                </div>
            </div>
        </div>
        <!--chat ends here-->
        @endif
        <div class="container">
          <div class="row">
        <footer>
          <div class="triangle"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p>Copyright <span class="fa fa-copyright"></span> {{ date('Y') }} webdesignerscenter.com</p>
              </div>
              <div class="col-md-6">
                <ul class="list-inline pull-right">
                  <li><a href="/about-us">About</a></li>
                  <li><a href="{{asset('/agreement/general-terms-conditions.pdf')}}" target="_blank">Terms & conditions</a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pull-right col-md-offset-2 social">
                <ul class="list-inline pull-right">
                  <li><a href="https://www.linkedin.com/company/13608183/" target="_blank" title="linkedin"><span class="fa fa-linkedin-square"></span></a></li>
                  <li><a href="https://www.facebook.com/Web-Designers-Center-1908267229501969/" target="_blank" title="Facebook"><span class="fa fa-facebook-square"></span></a></li>
                  <li><a href="https://twitter.com/webDcenter" target="_blank" title="Twitter"><span class="fa fa-twitter-square"></span></a></li>
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
        <!--<script src="https://www.google-analytics.com/analytics.js" async defer></script>-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109033027-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-109033027-1');
        </script>-->
        <script src="https://cdn.jsdelivr.net/ga-lite/latest/ga-lite.min.js" async></script>
        <script>
          var galite = galite || {};
          galite.UA = 'UA-109033027-1'; // Insert your tracking code here
        </script>
        <script>
        function submit_form(id)
        {
          $("#"+id).submit();
        }
        </script>
        @if(Auth::User())
        <script>
        function load_contacts()
        {
          $.get("/load-contacts",
                {

                },
                function(data,status){
                current_user_contacts(data,{{Auth::id()}})
              });
        }
        function open_and_add_to_chat(provider_id)
        {
          event.preventDefault();
          $(".chat-open").fadeIn("fast");

          $.get("/chat-up",
                {
                  provider_id:provider_id
                },
                function(data,status){
                handle_chat(data, {{Auth::id()}})
              });
        }
        function open_chat_window(provider_id, client_id, provider_company, is_online)
        {
          $(".contact-list").animate({ marginLeft: "-240px" });
          $('#chat_window_header').html(provider_company);
          $('#chat_window_header').removeClass();
          $('#chat_window_header').addClass(is_online);
          $('#chat_provider_id').val(provider_id);
          $('#chat_client_id').val(client_id);
          $.get("/chat-messages",
                {
                  provider_id:provider_id,
                  client_id:client_id
                },
                function(data,status){
                handle_chat_window(data,client_id)
              });
        }
        function capture_enter_key(event)
        {
          event.preventDefault();
          if(event.keyCode==13)//if enter key is pressed send the message
          {
            send_chat_message(event);
          }

        }
        function send_chat_message()
        {
          event.preventDefault();
          provider_id=$('#chat_provider_id').val();
          client_id=$('#chat_client_id').val();
          chat_message=$('#chat-message').val();
          $('#chat-message').val('');
          $.get("/new-chat-messages",
                {
                  provider_id:provider_id,
                  client_id:client_id,
                  chat_message:chat_message
                },
                function(data,status){
                //handle_chat_window(data) //call a refresher function after saving the message
              });
        }
        function pull_chat_messages()
        {
          provider_id=$('#chat_provider_id').val();
          client_id=$('#chat_client_id').val();
          if(provider_id != '' && client_id != '')
          {
            $.get("/pull-chat-messages",
                  {
                    provider_id:provider_id,
                    client_id:client_id
                  },
                  function(data,status){
                  append_chat_messages(data, {{Auth::id()}});
                });
          }
        }
        function check_new_messages()
        {
          $.get("/check-new-messages",
                {
                },
                function(data,status){
                  if(data!=0)
                  {
                    $('#notify-new_messages').addClass('notify');
                    $('#notify-new_messages').html(data);
                    load_contacts();
                  }
                  else {
                    $('#notify-new_messages').removeClass('notify');
                    $('#notify-new_messages').html('');
                  }
              });
        }
        </script>
        <script>//online status check starts here
        var activity=0;
        $(document).ready(function(){
          $('body').mousemove(function(){
            add_activity()
          });
        });
        function add_activity()
        {
          activity += 1;
          if(activity == 1500 || activity== 0){send_report();}
        }
        function send_report()
        {
          if(activity > 1000){var status=1;activity=0;}else{var status=0;}
            $.get("/user-online-activity",
                  {
                    status:status,
                  },
                  function(data,status){

                });
        }
        </script><!--online status check ends here-->
        <script>
        setInterval(pull_chat_messages, 1000);
        setInterval(check_new_messages, 3000);
        setInterval(send_report, 60000);
        </script>
        @endif
</body>
</html>
