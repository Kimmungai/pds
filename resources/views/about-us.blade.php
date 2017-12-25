</span>@extends('layouts.main')

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
      <li class="active"><a href="/about-us">About us</a></li>
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
        <p>Learn more about our the services we offer</p>
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
  <div class="container"><div class="row"><h2>About Our service</h2></div></div>
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
      <div class="col-md-6">
        <div class="office-pic">
            <img src="{{asset('/img/office.jpg')}}" alt="We will get you the right service provider!" >
        </div>
      </div>
      <div class="col-md-6 company-history">
        <p>When you post your project at <a href="/">web Designers Center</a>, competent service providers will bid for it. You will then have a chance to select the best bidder based on the attractiveness of their offer as well as their reputation. You can check out the profile of anyone who bids on your project including their past projects. We are committed to ensuring you find the best service provider for your project!</p>
      </div>
    </div>
  </div>
</section>
<section class="enquire">
  <div class="container"><div class="row"><h2>Make an enquiry</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-6">
        <div class="map">
          <img src="{{asset('/img/map.jpg')}}" alt="At your service">
        </div>
      </div>
      <div class="col-md-6">
        <article>
         <form action="/make-enquiry" method="POST" />
           {{csrf_field()}}
            <h5>Contact Form</h5>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Name<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input name="prospective_name" type="text" class="form-control" value="{{old('prospective_name')}}" required/>
                @if ($errors->has('prospective_name'))
                  <span class="red">
                      <strong>{{ $errors->first('prospective_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Subject<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <select name="prospective_subject" class="form-control">
                  <option <?php if(old('prospective_subject')=='General enquiry'){?>selected<?php }?>>General enquiry</option>
                  <option <?php if(old('prospective_subject')=='Bidding'){?>selected<?php }?>>Bidding</option>
                  <option <?php if(old('prospective_subject')=='Registration'){?>selected<?php }?>>Registration</option>
                  <option <?php if(old('prospective_subject')=='Service Provider Registration'){?>selected<?php }?>>Service Provider Registration</option>
                </select>
                @if ($errors->has('prospective_subject'))
                  <span class="red">
                      <strong>{{ $errors->first('prospective_subject') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Email<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input name="prospective_email" type="email" class="form-control" value="{{old('prospective_email')}}" required/>
                @if ($errors->has('prospective_email'))
                  <span class="red">
                      <strong>{{ $errors->first('prospective_email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Phone</label>
              </div>
              <div class="col-md-10">
                <input name="prospective_phone" type="text" class="form-control" value="{{old('prospective_phone')}}" />
                @if ($errors->has('prospective_phone'))
                  <span class="red">
                      <strong>{{ $errors->first('prospective_phone') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Message<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <textarea name="prospective_message" class="form-control" required>{{old('prospective_message')}}</textarea>
                @if ($errors->has('prospective_message'))
                  <span class="red">
                      <strong>{{ $errors->first('prospective_message') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 pull-right project-btn">
                <button class="btn btn-primary" type="submit"><span class="fa fa-send"></i> Send</a>
              </div>
            </div>
          </form>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection
