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
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/new-project">New Project</a></li>
      <li><a href="/sign-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class="active"><a href="/user-login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
        <p>Brief overview of Web Designers Center</p>
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
<section class="enquire">
  <div class="container"><div class="row"><h2>User Login</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-8 col-md-offset-2">
        <article>
          <h5>Login Form</h5>
          @if (Session::has('email_verified'))
            <div class="alert alert-success">
                {{ Session::get('email_verified') }}
            </div>
          @endif
          @if (Session::has('email_verified_error'))
            <div class="alert alert-danger">
                {{ Session::get('email_verified_error') }}
            </div>
          @endif
          <div class="row">
            <div class="col-md-2">
              <label for="name">Email</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label for="name">Password</label>
            </div>
            <div class="col-md-10">
              <input type="password" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label for="name"></label>
            </div>
            <div class="col-md-10">
              <input type="checkbox"  /> remember me
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 login-create-account-p">
              <label for="name"><a href="">Create an account</a></label>
            </div>
            <div class="col-md-5 login-create-account-p">
              <label for="name"><a href="">Reset password</a></label>
            </div>
            <div class="col-md-3 pull-right project-btn">
              <a class="btn btn-primary btn-lg" href="#">Login</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection
