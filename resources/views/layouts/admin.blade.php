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
        <script src="{{asset('/js/jquery-ui.min.js')}}"></script>

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
        </script>
      </div>
    </body>
</html>
