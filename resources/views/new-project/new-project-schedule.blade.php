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
      <li class="active"><a href="/new-project">New Project</a></li>
      <li><a href="/sign-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="/user-login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
  <div class="container"><div class="row"><h2>Make an enquiry</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">1</i><p>Basic details</p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">2</i><p>Features</p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><i class="fa">3</i><p>Plan</p></div></div>
        </div>
        <div class="row">
          <article>
            <h5>Project Schedule</h5>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Start date<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" />
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">End date<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" />
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Deadline<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <div class="col-md-3"><input type="checkbox"  />&nbsp;Strict</div>
                <div class="col-md-3"><input type="checkbox"  />&nbsp;Flexible</div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Ready to pay price</label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Amount in Ksh.." />
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Message to bidders</label>
              </div>
              <div class="col-md-10">
                <textarea rows="5" class="form-control" placeholder="Give a brief overview of the project goals"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3  project-btn">
                <a class="btn btn-primary btn-lg" href="/new-project-features"><i class="fa  fa-chevron-left "></i> Back</a>
              </div>
              <div class="col-md-3 pull-right project-btn">
                <a class="btn btn-primary btn-lg" href="/projects"><i class="fa fa-send"></i> Post</a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
