<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Welocome to WebDesignersCenter.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url"           content="{{url()->current()}}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{{$project['title']}} | {{ config('app.name') }}" />
        <meta property="og:description"   content="{{$project['description']}}" />
        @if($project['caption']=='')
          @if(!$project['projectType']['category'])
            <meta property="og:image"         content="{{url('/avatar/avatar.jpg')}}" />
          @elseif($project['projectType']['category']==1)
            <<meta property="og:image"         content="{{url('/avatar/mobile.jpg')}}" />
          @elseif($project['projectType']['category']==2)
            <meta property="og:image"         content="{{url('/avatar/e-commerce.jpg')}}" />
          @elseif($project['projectType']['category']==3)
            <meta property="og:image"         content="{{url('/avatar/blog.jpg')}}" />>
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
<div class="container">
<div class="row">
<nav class="navbar-inverse pds-menu-bar">
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
      <li><a href="/">Home</a></li>
      <li class="active"><a href="/projects">Projects</a></li>
      <li><a href="/#how-it-works">How it works</a></li>
      <li><a href="/about-us">About us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/new-project">New Project</a></li>
      @if(Auth::id())
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
        <p>Have leading companies place their offers!</p>
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
    <section class="main-body">
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
              <div class="project-pic" style="background:url('{{asset('/avatar/avatar.jpg')}}') no-repeat center;"></div>
              @endif
            @elseif($project['projectType']['category']==1)
              <h4>A Mobile App Project</h4>
              @if($project['caption']=='')
              <div class="project-pic" style="background:url('{{asset('/avatar/mobile.jpg')}}') no-repeat center;"></div>
              @endif
            @elseif($project['projectType']['category']==2)
              <h4>An E-commerce Project</h4>
              @if($project['caption']=='')
              <div class="project-pic" style="background:url('{{asset('/avatar/e-commerce.jpg')}}') no-repeat center;"></div>
              @endif
            @elseif($project['projectType']['category']==3)
              <h4>A Blog Project</h4>
              @if($project['caption']=='')
              <div class="project-pic" style="background:url('{{asset('/avatar/blog.jpg')}}') no-repeat center;"></div>
              @endif
            @elseif($project['projectType']['category']==4)
            <h4>A website Project</h4>
              @if($project['caption']=='')
              <div class="project-pic" style="background:url('{{asset('/avatar/website.jpg')}}') no-repeat center;"></div>
              @endif
            @endif
            @if($project['caption']!='')
            <div class="project-pic" style="background:url('{{ url($project['caption']) }}') no-repeat center;"></div>
            @endif
          </div>
          <div class="col-md-4">
            <h4>Desired features</h4>
            <div class="row">
              @if($project['projectType']['feature1'])
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature2'])
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature3'])
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
              @endif
            </div>
            <div class="row">
              @if($project['projectType']['feature5'])
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature6'])
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-dashboard"></i><p>Admin panel</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature7'])
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-hdd-o"></i><p>Back-up</p></div></div>
              @else
               <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
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
                <li class="list-group-item">Final price: <span class="bold red">Ksh. {{round($project['final_price'],2)}}</span></li>
                @elseif($project['avg_price']=='')
                <li class="list-group-item">Average price: <span class="bold red">-</span></li>
                @else
                <li class="list-group-item">Average price: <span class="bold red">Ksh. {{round($project['avg_price'],2)}}</span></li>
                @endif
                @if($project['final_price']=='')
                <li class="list-group-item">Bid closing: <span class="bold">{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['end_date']))->diffForHumans()}}</span></li>
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
              <div class="col-xs-5"><div class="desired-feature"><i class="fa fa-calendar-check-o"></i><p class="green">{{$project['start_date']}}</p></div></div>
              <div class="col-xs-2 schedule-line"></div>
              <div class="col-xs-5 pull-right"><div class="desired-feature"><i class="fa fa-calendar-check-o"></i><p class="green">{{$project['end_date']}}</p></div></div>
            </div>
            <div class="row">
              <div class="col-xs-4"><div class="date-holder"><p>Start</p></diV></div>
              <div class="col-xs-4 pull-right"><div class="date-holder"><p>Finish</p></div></div>
            </div>
          </div>
          <div class="col-md-4">
            <h4>Technical specifications</h4>
            <div class="row">
              @if($project['projectType']['feature9']!='')
              <div class="col-xs-4"><div class="tech-specification-holder"><i class="fa fa-exclamation-triangle"></i><p class="text-muted">Requirements doc 1 unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature10']!='')
              <div class="col-xs-4"><div class="tech-specification-holder"><i class="fa fa-exclamation-triangle"></i><p class="text-muted">Requirements doc 2 unspecified</p></div></div>
              @endif
              @if($project['projectType']['feature11']!='')
              <div class="col-xs-4"><div class="tech-specification-holder"><i class="fa fa-exclamation-triangle"></i><p class="text-muted">Requirements doc 3 unspecified</p></div></div>
              @endif
            </div>
            <div class="row">
              @if($project['projectType']['feature9']!='')
              <div class="col-xs-4"><a href="{{asset($project['projectType']['feature9'])}}"  target="_blank" class="btn btn-primary details-btn"><i class="fa  fa-download"></i> <small>Download</small></a></div>
              @else
              @endif
              @if($project['projectType']['feature10']!='')
              <div class="col-xs-4"><a href="{{asset($project['projectType']['feature10'])}}" target="_blank" class="btn btn-primary details-btn"><i class="fa  fa-download"></i> <small>Download</small></a></div>
              @endif
              @if($project['projectType']['feature11']!='')
              <div class="col-xs-4"><a href="{{asset($project['projectType']['feature11'])}}" target="_blank" class="btn btn-primary details-btn"><i class="fa  fa-download"></i> <small>Download</small></a></div>
              @endif
            </div>
          </div>
          <div class="col-md-4">
            <h4>Client information</h4>
              <ul class="list-group">
                  <li class="list-group-item">Name: <span class="bold">{{$project['user']['first_name']}} {{$project['user']['last_name']}}</span></li>
                  @if($project['desired_price']=='')
                  <li class="list-group-item">Desired price: <span class="bold">Unspecified</span></li>
                  @else
                  <li class="list-group-item">Desired price: <span class="bold">Ksh. {{round($project['desired_price'],2)}}</span></li>
                  @endif
                  <li class="list-group-item">Star rating: <span class="bold"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></li>
                  <li class="list-group-item">view profile: <span class="bold"><a href="#" class="green">profile</a></span></li>
              </ul>
          </div>
        </div>
      </div>
      </div>
    </section>
  </div>
</div>
<section class="enquire">
  <div class="container"><div class="row"><h2></h2></div></div>
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
              <label for="name">Amount</label>
            </div>
            <div class="col-md-10">
              <input name="price" type="text" class="form-control" value="{{old('price')}}"  required/>
              @if ($errors->has('price'))
                <span class="red">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label for="name">Message</label>
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
              @if($project['valid_period']==0 || $project['valid_period']=='')
              <button class="btn btn-primary bid-btn pull-right" type="submit"><i class="fa fa-bell"></i> Bid</button>
              @else
              <button class="btn btn-primary bid-btn pull-right" disabled><i class="fa fa-bell-slash"></i> Bid</button>
              @endif
            </div>
          </div>
        </form>
        </article>
      </div>
    </div>
  </div>
</section>
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
                <th scope="col">Chat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $count=0;?>
              @foreach($bids as $bid)
              <tr>
                <th scope="row">{{$bid['id']}}</th>
                <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['created_at']))->diffForHumans()}}</td>
                <td><a href="https://unsplash.com">{{$companies[$count]['company']['company_name']}}</a></td>
                <td>{{$bid['message']}}</td>
                <td class="red">Ksh. {{round($bid['bid_price'],2)}}</td>
                <td><a href="{{$companies[$count]['company']['company_website']}}">visit</a></td>
                <td><a href="{{url('/client-chats')}}"><span class="fa fa-comment"></span></a></td>
                @if($project['final_price']!='')
                <td><a class="btn btn-success disabled" href="#">Choose</a></td>
                @else
                <td><a class="btn btn-success" href="/bidder-select/{{$bid['id']}}">Choose</a></td>
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
    <section class="main-body">
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
    </section>
  </div>
</div>
<!--footer nav ends here-->
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
