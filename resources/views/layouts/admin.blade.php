<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Web designers center - Admin dashboard</title>
    <!-- Bootstrap core CSS-->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('/vendor/css/sb-admin.css')}}" rel="stylesheet">
    <!-- Custom styles for chat-->
    <link href="{{asset('/css/chat.css')}}" rel="stylesheet">
    <!-- Admin Custom styles for chat-->
    <link href="{{asset('/css/adm-cutom-style.css')}}" rel="stylesheet">
    <!-- Admin Custom styles for calender-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="{{ asset('/css/persistent_chat.css') }}">
    <meta id="metaUrl" property="og:url"           />
    <meta id="metaType" property="og:type"           />
    <meta id="metaTitle" property="og:title"          />
    <meta id="metaDescription" property="og:description"   content="Allow clients to post their web projects, competitive technology companies place bids on them and clients decide who to choose!" />
    <meta id="metaImage" property="og:image"         content="{{ asset('/img/logo.png') }}" />
  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <!--page content starts here-->

        @yield('content')
        <!--Page content ends here-->
        <div class="loading" id="loading"><img class="img-responsive" src="{{asset('/img/Rolling.gif')}}" /></div>
        <footer class="sticky-footer">
          <div class="container">
            <div class="text-center">
              <small>Copyright © webdesignerscenter.com 2017</small>
            </div>
          </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a class="btn btn-primary" href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--project delete starts here-->
        <div class="modal fade" id="projectDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="projectDelete">The project will be deleted permanently. Continue?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Delete" below to execute delete.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#" onclick="document.getElementById('project-delete-form').submit()">Delete</a>
                <form id="project-delete-form" action="/project-delete" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </div><!--project delete ends here-->
        <!-- Deactivate Modal-->
        <div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete your account?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Click below to delete your account.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="/delete-account">Delete</a>
                <!--<form id="delete-account-form" action="/delete-account" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>-->
              </div>
            </div>
          </div>
        </div>
        <!--payment successful starts here-->
        <div class="modal fade" id="paymentOk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="paymentOk">Payment made successfully. Thank you!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Enjoy your new membership plan.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button"  onclick="page_refresh()">Dismiss</button>
              </div>
            </div>
          </div>
        </div><!--payment successful ends here-->
        <!--chat starts here-->
        <div class="chat">

            <div class="chat-open">
                <div class="chat-container">
                <div class="contact-list">
                    <header><h5>Contacts</h5><a href="#" class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></a></header>
                    <ul id="provider-list">

                    </ul>
                </div>
                <div class="contact-message">
                <header><a class="back" href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> <h5 id="chat_window_header"></h5><a href="#" class="pull-right close"><i class="fa fa-times" aria-hidden="true"></i></a></header>
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
        <script src="{{ asset('/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="<?php echo asset('js/vendor/jquery-3.2.1.min.js'); ?>"><\/script>')</script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Page level plugin JavaScript-->
        <script src="{{asset('/vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('/vendor/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{asset('/vendor/js/sb-admin.min.js')}}"></script>
        <!-- Custom scripts for this page-->
        <script src="{{asset('/vendor/js/sb-admin-datatables.min.js')}}"></script>
        <script src="{{asset('/vendor/js/sb-admin-charts.min.js')}}"></script>
        <!-- Custom scripts for calender-->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{asset('/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('/js/nogo.min.js')}}"></script>
        <script src="{{asset('/js/persistent_chat.js')}}"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
        <script>
        function display_effect(id)
        {
          $("#"+id).slideToggle('slow','linear');
        }
        function submit_form(id)
        {
          $("#"+id).submit();
        }
        </script>
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
        <script>
        function page_refresh()
        {
          location.reload();
        }
        </script>
      </div>
    </body>
</html>
