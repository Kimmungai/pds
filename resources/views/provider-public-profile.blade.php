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
      <li class="active"><a class="text-capitalize" href="/new-project">{{$provider['company']->company_name}}</a></li>
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
  <div class="container"><div class="row"><h2>{{$provider['company']->company_name}}</h2></div></div>
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
        @if($provider->avatar == '')
        <div class="public-profile-pic" style="background:url('/avatar/avatar.jpg') no-repeat center;"></div>
        @else
        <div class="public-profile-pic" style="background:url('{{$provider->avatar}}') no-repeat center;"></div>
        @endif
      </div>
      <div class="col-md-4">
        <ul class="list-group public-profile-details">
          <li class="list-group-item">Legal name: <strong>{{$provider['company']->company_legal_name}}</strong></li>
          @if($provider['company']['company_industry']==1)
          <li class="list-group-item">Industry: <strong>Software</strong></li>
          @elseif($provider['company']['company_industry']==2)
          <li class="list-group-item">Industry: <strong>Telco</strong></li>
          @elseif($provider['company']['company_industry']==3)
          <li class="list-group-item">Industry: <strong>Business</strong></li>
          @elseif($provider['company']['company_industry']==4)
          <li class="list-group-item">Industry: <strong>Marketing</strong></li>
          @endif
          <li class="list-group-item">Rating: <strong><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></strong></li>
          @if($provider['admin_approved'])
          <li class="list-group-item">Status: <span class="fa fa-certificate red"></span> <span class="green">Cerified</span></li>
          @endif
          <li class="list-group-item">Incorporation: <strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($provider['company']->company_incoporation_date))->diffForHumans()}}</strong></li>
        </ul>
        <hr>
        <ul class="list-group public-profile-details">
          <li class="list-group-item">Completed projects: <strong>{{$projects_completed}}</strong></li>
          <li class="list-group-item">Address: <strong>{{$provider['company']->company_address}}</strong></li>
        </ul>
      </div>
      <div class="col-md-4 public-profile">
        <h4>Description</h4>
        <p>{{$provider['company']->company_description}}</p>
        <a href="{{$provider['company']['company_website']}}" class="btn btn-primary pull-right details-btn buttonAnchor" target="_blank"><span class="fa fa-external-link "></span> Website</a>
      </div>
    </div>
    <hr>
  </div>
</section>
<section class="enquire">
  <div class="container"><div class="row"><h2>Previous Projects</h2></div></div>
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
        @if($provider->avatar == '')
        <div class="public-profile-pic" style="background:url('/avatar/avatar.jpg') no-repeat center;"></div>
        @else
        <div class="public-profile-pic" style="background:url('{{$provider->avatar}}') no-repeat center;"></div>
        @endif
      </div>
      <div class="col-md-4">
        <ul class="list-group public-profile-details">
          <li class="list-group-item">Legal name: <strong>{{$provider['company']->company_legal_name}}</strong></li>
          @if($provider['company']['company_industry']==1)
          <li class="list-group-item">Industry: <strong>Software</strong></li>
          @elseif($provider['company']['company_industry']==2)
          <li class="list-group-item">Industry: <strong>Telco</strong></li>
          @elseif($provider['company']['company_industry']==3)
          <li class="list-group-item">Industry: <strong>Business</strong></li>
          @elseif($provider['company']['company_industry']==4)
          <li class="list-group-item">Industry: <strong>Marketing</strong></li>
          @endif
          <li class="list-group-item">Rating: <strong><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></strong></li>
          @if($provider['admin_approved'])
          <li class="list-group-item">Status: <span class="fa fa-certificate red"></span> <span class="green">Cerified</span></li>
          @endif
          <li class="list-group-item">Incorporation: <strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($provider['company']->company_incoporation_date))->diffForHumans()}}</strong></li>
        </ul>
        <hr>
        <ul class="list-group public-profile-details">
          <li class="list-group-item">Completed projects: <strong>{{$projects_completed}}</strong></li>
          <li class="list-group-item">Address: <strong>{{$provider['company']->company_address}}</strong></li>
        </ul>
      </div>
      <div class="col-md-4 public-profile">
        <h4>Description</h4>
        <p>{{$provider['company']->company_description}}</p>
        <a href="{{$provider['company']['company_website']}}" class="btn btn-primary pull-right details-btn buttonAnchor" target="_blank"><span class="fa fa-external-link "></span> Website</a>
      </div>
    </div>
    <hr>
  </div>
</section>
@endsection
