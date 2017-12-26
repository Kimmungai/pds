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
  <div class="container"><div class="row"><h2>New user registration</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-8 col-md-offset-2">
        <article>
          <h5>Registration Form</h5>
          @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
          @endif
          @if (Session::has('error_message'))
            <div class="alert alert-danger">
                {{ Session::get('error_message') }}
            </div>
          @endif
          <form method="POST" action="{{ url('sign-up') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-2">
                <label >First name<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"  required autofocus/>
                @if ($errors->has('first_name'))
                  <span class="red">
                      <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label >Middle name</label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}" />
                @if ($errors->has('middle_name'))
                  <span class="red">
                      <strong>{{ $errors->first('middle_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label >Last name<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required/>
                @if ($errors->has('last_name'))
                  <span class="red">
                      <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label >Email<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required/>
                @if ($errors->has('email'))
                  <span class="red">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label >Password<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="password" class="form-control" name="password" required/>
                @if ($errors->has('password'))
                  <span class="red">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label >Confirm password<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="password" class="form-control" name="password_confirmation" required/>
                @if ($errors->has('password_confirmation'))
                  <span class="red">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label >Agreement<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input name="terms" id="terms" type="radio" value="1" onchange="enable_post_button()" required/><span> &nbsp;<a href="{{asset('/agreement/client-agreement.pdf')}}" target="_blank">I have read and agree to all the terms of service</a></span>
                @if ($errors->has('terms'))
                  <span class="red">
                      <strong>{{ $errors->first('terms') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 login-create-account-p">
                <p><a href="/login">Already registered? Login here</a></p>
              </div>
              <div class="col-md-3 pull-right project-btn">
                <button id="post" class="btn btn-primary disabled" type="submit">Register</button>
              </div>
            </div>
         </form>
        </article>
      </div>
    </div>
  </div>
</section>
<script>
  function enable_post_button()
  {
    $('#post').removeClass('disabled');
  }
</script>
@endsection
