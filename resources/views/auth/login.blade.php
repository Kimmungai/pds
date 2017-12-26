@extends('layouts.main')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
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
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/new-project">New Project</a></li>
      <li><a href="/sign-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class="active"><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
        <p>Let companies bid for your project and select the best!</p>
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
          <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-2{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="name">Email</label>
              </div>
              <div class="col-md-10">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <span class="red">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Password</label>
              </div>
              <div class="col-md-10">
                <input type="password" class="form-control" name="password" required />
                @if ($errors->has('password'))
                    <span class="red">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name"></label>
              </div>
              <div class="col-md-10">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 login-create-account-p">
                <label for="name"><a href="/sign-up">Create an account</a></label>
              </div>
              <div class="col-md-5 login-create-account-p">
                <label for="name"><a href="/forgot-pass">Reset password</a></label>
              </div>
              <div class="col-md-3 pull-right project-btn">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
          </form>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection
