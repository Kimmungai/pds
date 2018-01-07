<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$project['title']}} project posted! | Projects at Web Designers Center | Official site</title>
        <meta name="description" content="Check out {{$project['title']}} project that was posted at {{ config('app.name') }} {{\Carbon\Carbon::createFromTimeStamp(strtotime($project['created_at']))->diffForHumans()}}.  {{count($project['bid'])}} bids have been placed so far.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$project['title']}} bidders, New project, {{$project['title']}} bids, {{$project['title']}} details, web designers center, New project">
        <meta property="og:url"           content="{{url()->current()}}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{{$project['title']}} | {{ config('app.name') }}" />
        <meta property="og:description"   content="{{$project['description']}}" />
        @if($project['caption']=='')
          @if(!$project['projectType']['category'])
            <meta property="og:image"         content="{{url('/avatar/avatar.jpg')}}" />
          @elseif($project['projectType']['category']==1)
            <meta property="og:image"         content="{{url('/avatar/mobile.jpg')}}" />
          @elseif($project['projectType']['category']==2)
            <meta property="og:image"         content="{{url('/avatar/e-commerce.jpg')}}" />
          @elseif($project['projectType']['category']==3)
            <meta property="og:image"         content="{{url('/avatar/blog.jpg')}}" />
          @elseif($project['projectType']['category']==4)
            <meta property="og:image"         content="{{url('/avatar/website.jpg')}}" />
          @endif
        @else
        <meta property="og:image"         content="{{ url($project['caption']) }}" />
        @endif

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
        <!-- Admin Custom styles for calender -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                <h1 class="site-title"><a  href="/">Web Designers Center</a></h1>
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
<div class="container">
<div class="row">
<nav class="navbar-inverse pds-menu-bar">
<div class="container">
  <div class="navbar-header">
    <a class="navbar-brand visible-sm visible-xs" href="/">Home</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      <li class="active"><a href="/projects">Projects</a></li>
      <li><a href="/#how-it-works">How it works</a></li>
      <li><a href="/about-us">About us</a></li>
      <li class="visible-xs-block"><a href="/service-provider-sign-up">Become a service provider</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/new-project">New Project</a></li>
      @if(Auth::user())
        <li><a href="/profile"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->first_name}}</a></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      @else
        <li><a href="/sign-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endif
    </ul>
  </div>
</div>
</nav>
</div>
</div>
<div class="container">
<div class="row">
<div class="slider">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Power to choose!</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <p>The provided details of {{$project['title']}} project</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 project-btn pull-right">
        <a class="btn btn-primary" href="/new-project">Post a new project</a>
      </div>
    </div>
 </div>
</div>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="main-body">
      <div class="container project-details-controls">
        <div class="row">
          <div class="col-md-4">
            <nav class="breadcrumb white-bg">
              <a class="btn btn-default" href="/">Top</a>
              <a class="btn btn-default" href="/projects">Project list <span class="glyphicon glyphicon-list"></span></a>
              <a class="btn btn-default active" href="#">Project details <span class="glyphicon glyphicon-folder-open"></span></a>
            </nav>
         </div>
       </div>
    </div>
      <div class="container section-decoration">
        @if (Session::has('update_success'))
          <div class="alert alert-success">
              {{ Session::get('update_success') }}
          </div>
        @endif
        @if (Session::has('update_error'))
          <div class="alert alert-danger">
              {{ Session::get('update_error') }}
              @if(session('daily_bidding_limit'))
                <a class="btn btn-default pull-right" href="/provider-membership"><span class="fa fa-star"></span> Upgrade membership plan</a>
              @endif
          </div>
        @endif
        @if ($errors->has('price'))
          <div class="alert alert-danger">
            Some errors were found in the bidding <a href="#bid-form"><u>form</u></a>
          </div>
        @endif
        <div class="row">
          <h2>{{$project['title']}}</h2>
          <div class="strip"></div>
        </div>
        <div class="row project-details-panel">
          <div class="col-md-4">
            @if(!$project['projectType']['category'])
              <h4>Unspecified project type</h4>
              @if($project['caption']=='')
              <div class="project-pic"><img src="{{asset('/avatar/mobile.jpg')}}" alt="Mobile App Project"></div>
              @endif
            @elseif($project['projectType']['category']==1)
              <h4>A Mobile App Project</h4>
              @if($project['caption']=='')
              <div class="project-pic"><img src="{{asset('/avatar/mobile.jpg')}}" alt="Mobile App Project"></div>
              @endif
            @elseif($project['projectType']['category']==2)
              <h4>An E-commerce Project</h4>
              @if($project['caption']=='')
              <div class="project-pic"><img src="{{asset('/avatar/e-commerce.jpg')}}" alt="E-commerse Project"></div>
              @endif
            @elseif($project['projectType']['category']==3)
              <h4>A Blog Project</h4>
              @if($project['caption']=='')
              <div class="project-pic"><img src="{{asset('/avatar/blog.jpg')}}" alt="Blog Project"></div>
              @endif
            @elseif($project['projectType']['category']==4)
            <h4>A website Project</h4>
              @if($project['caption']=='')
              <div class="project-pic"><img src="{{asset('/avatar/website.jpg')}}" alt="Website Project"></div>
              @endif
            @endif
            @if($project['caption']!='')
            <div class="project-pic"><img src="{{ url($project['caption']) }}" alt="{{$project['title']}}"></div>
            @endif
          </div>
          <div class="col-md-4">
            <h4>Desired features</h4>
            <div class="row">
              @if($project['projectType']['feature1'])
              <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-cart-plus"></span><p>Check out</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature2'])
              <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-desktop"></span> <span class="fa fa-tablet"></span> <span class="fa  fa-mobile"></span><p>Responsive</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature3'])
              <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-users"></span><p>Membership</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
              @endif
            </div>
            <div class="row">
              @if($project['projectType']['feature5'])
              <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-cloud-upload"></span><p>Cloud based</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature6'])
              <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-dashboard"></span><p>Admin panel</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature7'])
              <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-hdd-o"></span><p>Back-up</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
              @endif
            </div>
          </div>
          <div class="col-md-4">
            <h4>Bidding information</h4>
             <ul class="list-group">
               @if($project['final_price']=='')
               <li class="list-group-item">Status: <span class="green">OPEN</span></li>
               @else
               <li class="list-group-item">Status: <span class="red">CLOSED</span></li>
               @endif
                <li class="list-group-item">No. of placed bids: <span class="bold">{{count($project['bid'])}}</span></li>
                @if($project['final_price']!='')
                <li class="list-group-item">Final price: <span class="bold red">$ {{number_format(round($project['final_price'],2))}}</span></li>
                @elseif($project['avg_price']=='')
                <li class="list-group-item">Average price: <span class="bold red">-</span></li>
                @else
                <li class="list-group-item">Average price: <span class="bold red">$ {{number_format(round($project['avg_price'],2))}}</span></li>
                @endif
                @if($project['final_price']=='')
                <li class="list-group-item">Bid closing: <span class="bold">{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['valid_period']))->diffForHumans()}}</span></li>
                @else
                <li class="list-group-item">Bid closed: <span class="bold">{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['updated_at']))->diffForHumans()}}</span></li>
                @endif
              </ul>
          </div>
        </div>
        <div class="row project-details-panel">
          <div class="col-md-4">
            <h4>Schedule</h4>
            <div class="row">
              <div class="col-xs-5"><div class="desired-feature"><span class="fa fa-calendar-check-o"></span><p class="green">{{$project['start_date']}}</p></div></div>
              <div class="col-xs-2 schedule-line"></div>
              <div class="col-xs-5 pull-right"><div class="desired-feature"><span class="fa fa-calendar-check-o"></span><p class="green">{{$project['end_date']}}</p></div></div>
            </div>
            <div class="row">
              <div class="col-xs-4"><div class="date-holder"><p>Start</p></diV></div>
              <div class="col-xs-4 pull-right"><div class="date-holder"><p>Finish</p></div></div>
            </div>
          </div>
          <div class="col-md-4">
            @if($project['projectType']['feature9']=='' && $project['projectType']['feature10']=='' && $project['projectType']['feature11']=='')
              <h4>Message to bidders</h4>
              <p class="company-description">{{$project['message_to_bidders']}}</p>
            @else
            <h4>Technical specifications</h4>
            <div class="row">
              @if($project['projectType']['feature9']!='')
              <div class="col-xs-4"><div class="tech-specification-holder"><span class="fa fa-file-pdf-o"></span><p class="text-muted">Requirements doc 1</p></div></div>
              @endif
              @if($project['projectType']['feature10']!='')
              <div class="col-xs-4"><div class="tech-specification-holder"><span class="fa fa-file-pdf-o"></span><p class="text-muted">Requirements doc 2</p></div></div>
              @endif
              @if($project['projectType']['feature11']!='')
              <div class="col-xs-4"><div class="tech-specification-holder"><span class="fa fa-file-pdf-o"></span><p class="text-muted">Requirements doc 3</p></div></div>
              @endif
            </div>
            <div class="row">
              @if($project['projectType']['feature9']!='')
              <div class="col-xs-4"><a href="{{asset($project['projectType']['feature9'])}}"  target="_blank" class="btn btn-primary details-btn"><span class="fa  fa-download"></span> <small>Download</small></a></div>
              @else
              @endif
              @if($project['projectType']['feature10']!='')
              <div class="col-xs-4"><a href="{{asset($project['projectType']['feature10'])}}" target="_blank" class="btn btn-primary details-btn"><span class="fa  fa-download"></span> <small>Download</small></a></div>
              @endif
              @if($project['projectType']['feature11']!='')
              <div class="col-xs-4"><a href="{{asset($project['projectType']['feature11'])}}" target="_blank" class="btn btn-primary details-btn"><span class="fa  fa-download"></span> <small>Download</small></a></div>
              @endif
            </div>
            @endif
          </div>
          <div class="col-md-4">
            <h4>Client information</h4>
              <ul class="list-group">
                  <li class="list-group-item">Name: <span class="bold">{{$project['user']['first_name']}} {{$project['user']['last_name']}}</span></li>
                  @if($project['desired_price']=='')
                  <li class="list-group-item">Desired price: <span class="bold">Unspecified</span></li>
                  @else
                  <li class="list-group-item">Desired price: <span class="bold">$ {{number_format(round($project['desired_price'],2))}}</span></li>
                  @endif
                  <li class="list-group-item">Star rating: <span class="bold"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></span></li>
                  <li class="list-group-item">view profile: <span class="bold"><a href="#" class="green">profile</a></span></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@if(!Auth::user() || $project['user_id'] != Auth::id())
<div id="bid-form" class="enquire">
  <div class="container"><div class="row"></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-6">
        <article>
        <form action="/place-bid" method="POST">
          {{csrf_field()}}
          <input type="hidden" name="project_id" value="{{$project['id']}}" />
          <h5 class="green">Your offer</h5>
          <div class="row">
            <div class="col-md-2">
              <label >Amount</label>
            </div>
            <div class="col-md-10">
              <input name="price" type="number" class="form-control" value="{{old('price')}}"  required/>
              @if ($errors->has('price'))
                <span class="red">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label >Message</label>
            </div>
            <div class="col-md-10">
              <textarea name="message" class="form-control">{{old('message')}}</textarea>
              @if ($errors->has('message'))
                <span class="red">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 pull-right project-btn">
              @if(!Auth::user())
              <a class="btn btn-primary bid-btn pull-right" href="/service-provider-sign-up"><span class="fa fa-bell"></span> Bid</a>
              @elseif($project['final_price']=='')
                @if(session('daily_bidding_limit'))
                  <button class="btn btn-primary bid-btn pull-right" disabled><span class="fa fa-bell-slash"></span> Bid (daily limit exhausted)</button>
                @else
                  <button class="btn btn-primary bid-btn pull-right" type="submit"><span class="fa fa-bell"></span> Bid</button>
                @endif
              @else
              <button class="btn btn-primary bid-btn pull-right" disabled><span class="fa fa-bell-slash"></span> Bid</button>
              @endif
            </div>
          </div>
        </form>
        </article>
      </div>
    </div>
  </div>
</div>
@endif
<section class="enquire">
  <div class="container"><div class="row"><h2>Bidding companies</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-xs-12">
        <div class="table-responsive bidders-table">
          <table class="table table-hover table-condensed">
            <thead>
              <tr>
                <th scope="col">Bid no.</th>
                <th scope="col">date</th>
                <th scope="col">Company</th>
                <th scope="col">Message</th>
                <th scope="col">Offer</th>
                <th scope="col">Bidder website</th>
                @if(Auth::user())
                  @if($project['user_id'] == Auth::id())
                    <th scope="col">Chat</th>
                    <th scope="col">Action</th>
                  @endif
                @endif
              </tr>
            </thead>
            <tbody>
              <?php $count=0;?>
              @foreach($bids as $bid)
              <tr>
                <th scope="row">{{$bid['id']}}</th>
                <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($bid['created_at']))->diffForHumans()}}</td>
                <td><a href="{{$companies[$count]['company']['company_website']}}">{{$companies[$count]['company']['company_name']}}</a></td>
                <td>{{$bid['message']}}</td>
                <td class="red">$ {{round($bid['bid_price'],2)}}</td>
                <td><a href="{{$companies[$count]['company']['company_website']}}" target="_blank">visit</a></td>
                @if(Auth::user())
                  @if($project['user_id'] == Auth::id())
                    <td onclick="open_and_add_to_chat({{$bid['bidder_id']}})"><a href="#"><span class="fa fa-comment"></span></a></td>
                    @if($project['final_price']!='')
                    <td><a class="btn btn-success disabled" href="#">Choose</a></td>
                    @else
                    <td><a class="btn btn-success" href="/bidder-select/{{$bid['id']}}">Choose</a></td>
                    @endif
                  @endif
                @endif
              </tr>
              <?php $count++;?>
              @endforeach
            </tbody>
          </table>
        </div>
        <!--bidder pagination starts here-->
        <div class="col-md-12">
          <div class="row bidders-nav pull-right">
            <div class="col-xs-12 custom-pagination">
                {{$bids->links()}}
            </div>
          </div>
        <!--bidder pagination ends here-->
      </div>
    </div>
    </div>
  </div>
</section>
<!--footer nav starts here-->
<div class="container">
  <div class="row">
    <div class="main-body">
      <div class="container project-details-controls-footer">
        <div class="row">
          <div class="col-md-4">
            <nav class="breadcrumb grey-bg">
              <a class="btn btn-default" href="/">Top</a>
              <a class="btn btn-default" href="/projects">Project list <span class="glyphicon glyphicon-list"></span></a>
              <a class="btn btn-default active" href="#">Project details <span class="glyphicon glyphicon-folder-open"></span></a>
            </nav>
         </div>
       </div>
    </div>
  </div>
 </div>
</div>
<!--chat starts here-->
@if(Auth::user())
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
@endif
<!--chat ends here-->
<!--footer nav ends here-->
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
          <li><a href="#">About</a></li>
          <li><a href="#">Terms & privacy</a></li>
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
@if(Auth::user())
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
