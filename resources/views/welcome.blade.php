@extends('layouts.main')

@section('content')
  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="pds-logo" style="background-color:#fff;">
            <img class="img-responsive" src="{{ asset('/img/logo.png') }}" alt="WebDesignersCenter.com">
          </div>
        </div>
        <div class="col-md-2 provider-btn hidden-xs">
          <a class="btn btn-primary" href="#">Become a service provider</a>
        </div>
        <div class="col-md-4 pds-email">
          <p>info@webdesignercenter.com</p>
        </div>
      </div>
    </div>
  </header>
  <nav class="navbar navbar-inverse pds-menu-bar">
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">How it works</a></li>
        <li><a href="#">About us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
  </nav>
  <div class="slider">
  </div>
@endsection
