@extends('layouts.main')

@section('content')
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
          <i class="fa fa-check-circle"></i> {{ Session::get('update_success') }}
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
        <div class="public-profile-pic" style="background:url('/avatar/avatar.jpg') no-repeat center;"></div>
        @else
        <div class="public-profile-pic" style="background:url('/{{$client->avatar}}') no-repeat center;"></div>
        @endif
      </div>
      <div class="col-md-4">
        <ul class="list-group public-profile-details">
          <li class="list-group-item">Full name: <strong>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</strong></li>
          <li class="list-group-item">Posted projects: <strong>{{count($client['project'])}}</strong></li>
          <li class="list-group-item">Rating: <strong><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></strong></li>
          @if($client->admin_approved)
          <li class="list-group-item">Status: <span class="green"><i class="fa fa-check-circle"></i> Verified</span></li>
          @endif
        </ul>
        @if($client->website)
        <a href="{{$client->website}}" class="btn btn-primary pull-right details-btn buttonAnchor" target="_blank"><i class="fa fa-external-link "></i> Website</a>
        @endif
      </div>
    </div>
    <hr>
  </div>
</section>
@endsection
