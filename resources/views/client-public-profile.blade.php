@extends('layouts.main')

@section('content')
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
      <li><a href="/projects">Projects</a></li>
      <li><a href="/#how-it-works">How it works</a></li>
      <li><a href="/about-us">About us</a></li>
      <li class="visible-xs-block"><a href="/service-provider-sign-up">Become a service provider</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a class="text-capitalize" href="/new-project">{{$client->first_name}}</a></li>
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
<section class="enquire">
  <div class="container"><div class="row"><h2>{{$client->company_name}}</h2></div></div>
  <div class="container section-decoration">
    @if (Session::has('update_success'))
      <div class="alert alert-success">
          <span class="fa fa-check-circle"></span> {{ Session::get('update_success') }}
      </div>
    @endif
    @if (Session::has('update_error'))
      <div class="alert alert-danger">
          {{ Session::get('update_error') }}
      </div>
    @endif
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-4">
        @if($client->avatar == '')
        <div class="public-profile-pic"><img src="{{asset('/avatar/avatar.jpg')}}" alt="{{$provider->first_name}}"</div>
        @else
        <div class="public-profile-pic"><img src="/{{$client->avatar}}" alt="{{$client->first_name}}"></div>
        @endif
      </div>
      <div class="col-md-4">
        <ul class="list-group public-profile-details">
          <li class="list-group-item">Full name: <strong>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</strong></li>
          <li class="list-group-item">Posted projects: <strong>{{count($client['project'])}}</strong></li>
          <li class="list-group-item">Rating: <strong><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></strong></li>
          @if($client->admin_approved)
          <li class="list-group-item">Status: <span class="green"><span class="fa fa-check-circle"></span> Verified</span></li>
          @endif
        </ul>
        @if($client->website)
        <a href="{{$client->website}}" class="btn btn-primary pull-right details-btn buttonAnchor" target="_blank"><span class="fa fa-external-link "></span> Website</a>
        @endif
      </div>
    </div>
    <hr>
  </div>
</section>
@if(count($projects))
<div class="container">
<div class="row">
    <section class="main-body">
      <div class="container section-decoration">
        <div class="row second-nav">
          <h2>Previous projects</h2>
          <div class="strip"></div>
       </div>
    </div>
    <div class="container section-decoration"><!--projects start here-->
    <div class="row project-area">
      @foreach($projects as $project)
      <div class="col-md-6">
        <article>
          <h3>{{$project['title']}}</h3>
          <div class="row">
            <div class="col-md-6">
              <h4 class="text-muted">Desired features</h4>
              <div class="row">
                @if($project['projectType']['feature1'])
                <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-cart-plus"></span><p>Check out</p></div></div>
                @else
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                @endif
                @if($project['projectType']['feature2'])
                <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-desktop"></span> <span class="fa fa-tablet"></span> <span class="fa  fa-mobile"></span><p>Responsive</p></div></div>
                @else
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                @endif
              </div>
              <div class="row">
                @if($project['projectType']['feature5'])
                <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-cloud-upload"></span><p>Cloud based</p></div></div>
                @else
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                @endif
                @if($project['projectType']['feature6'])
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-dashboard"></span><p>Admin panel</p></div></div>
                @else
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              @if($project['caption']=='')
                @if(!$project['projectType']['category'])
                  <div class="project-pic" style="background:url('{{asset('/avatar/avatar.jpg')}}') no-repeat center;"></div>
                @elseif($project['projectType']['category']==1)
                  <div class="project-pic" style="background:url('{{asset('/avatar/mobile.jpg')}}') no-repeat center;"></div>
                @elseif($project['projectType']['category']==2)
                  <div class="project-pic" style="background:url('{{asset('/avatar/e-commerce.jpg')}}') no-repeat center;"></div>
                @elseif($project['projectType']['category']==3)
                  <div class="project-pic" style="background:url('{{asset('/avatar/blog.jpg')}}') no-repeat center;"></div>
                @elseif($project['projectType']['category']==4)
                  <div class="project-pic" style="background:url('{{asset('/avatar/website.jpg')}}') no-repeat center;"></div>
                @endif
              @else
              <div class="project-pic" style="background:url('{{ url($project['caption']) }}') no-repeat center;"></div>
              @endif
            </div>
          </div>
         <div class="row project-info">
           <div class="col-md-6">
             <h4 class="text-muted">Bidding information</h4>
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
                 <li class="list-group-item">Bid closing: <span class="bold">{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['valid_period']))->diffForHumans()}}</span></li>
                 @else
                 <li class="list-group-item">Bid closed: <span class="bold">{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['updated_at']))->diffForHumans()}}</span></li>
                 @endif
               </ul>
             </div>
             <div class="row project-info">
               <div class="col-md-6">
                 <h4 class="text-muted">Client information</h4>
                   <ul class="list-group">
                       <li class="list-group-item">Name: <span class="bold">{{$project['user']['first_name']}} {{$project['user']['last_name']}}</span></li>
                       @if($project['desired_price']=='')
                       <li class="list-group-item">Desired price: <span class="bold">Unspecified</span></li>
                       @else
                       <li class="list-group-item">Desired price: <span class="bold">Ksh. {{round($project['desired_price'],2)}}</span></li>
                       @endif
                       <li class="list-group-item">Star rating: <span class="bold"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></span></li>
                       <li class="list-group-item">view profile: <span class="bold"><a href="/client-public-profile/{{$project['user']['id']}}">profile</a></span></li>
                   </ul>
                 </div>
                 @if(Auth::user() && !Auth::user()->userMembership->type)
                  <div class="project-actions">
                    <a href="/project-details/{{$project['id']}}" class="btn btn-primary details-btn"><span class="fa  fa-list"></span> Details</a>
                 </div>
                 @else
                 <div class="project-actions">
                   <a href="/project-details/{{$project['id']}}" class="btn btn-primary details-btn"><span class="fa  fa-list"></span> Details</a>
                   <a href="/project-details/{{$project['id']}}" class="btn btn-primary bid-btn pull-right"><span class="fa  fa-bell-o"></span> Place a bid</a>
                </div>
                @endif
        </article>
     </div>
     @endforeach
  </div>
  <nav aria-label="...">
    <ul class="pagination pull-right">
      {{$projects->links()}}
    </ul>
  </nav>
   </div>`
  </div><!--projects end here-->
  </section>
</div>
</div>
  @else
  <div class="container">
  <div class="row">
  <section class="main-body">
    <div class="container section-decoration">
      <div class="row second-nav">
        <h2>No Previous projects</h2>
        <div class="strip"></div>
      </div>
    </div>
  </section>
</div>
</div>
@endif
@endsection
