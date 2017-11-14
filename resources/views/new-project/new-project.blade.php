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
  <div class="container"><div class="row"><h2>New project form</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><i class="fa">1</i><p>Basic details</p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">2</i><p>Features</p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">3</i><p>Plan</p></div></div>
        </div>
        <div class="row">
          @if(isset($data))
          <form action="/new-project-basic-update" method="POST" enctype="multipart/form-data" />
          <input type="hidden" name="_method" value="PUT"/>
          {{ csrf_field() }}
            <article>
              <h5>Project basic details</h5>
              @if (Session::has('project_basic_details_error'))
                <div class="alert alert-danger">
                    {{ Session::get('project_basic_details_error') }}
                </div>
              @endif
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Title<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input name="title" type="text" class="form-control" required value="{{$data['title']}}" />
                  @if ($errors->has('title'))
                    <span class="red">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Category<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <div class="col-md-3"><input type="checkbox" value="1" name="mobile-app"  <?php if(strpos($data['project_type']['category'],'1')){ ?> checked  <?php } ?>/>&nbsp;Mobile App</div>
                  @if ($errors->has('mobile-app'))
                    <span class="red">
                        <strong>{{ $errors->first('mobile-app') }}</strong>
                    </span>
                  @endif
                  <div class="col-md-3"><input type="checkbox" value="2" name="e-commerce"  <?php if(strpos($data['project_type']['category'],'2')){ ?>checked  <?php } ?>/>&nbsp;E-commerce</div>
                  @if ($errors->has('e-commerce'))
                    <span class="red">
                        <strong>{{ $errors->first('e-commerce') }}</strong>
                    </span>
                  @endif
                  <div class="col-md-3"><input type="checkbox" value="3" name="blog"  <?php if(strpos($data['project_type']['category'],'3')){ ?>checked  <?php } ?>/>&nbsp;Blog</div>
                  @if ($errors->has('blog'))
                    <span class="red">
                        <strong>{{ $errors->first('blog') }}</strong>
                    </span>
                  @endif
                  <div class="col-md-3"><input type="checkbox" value="4" name="website" <?php if(strpos($data['project_type']['category'],'4')){?>checked  <?php } ?>/>&nbsp;Website</div>
                  @if ($errors->has('website'))
                    <span class="red">
                        <strong>{{ $errors->first('website') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Caption</label>
                </div>
                <div class="col-md-10">
                  <label class="btn btn-default btn-file">
                    Browse (max 500kb) <input name="caption" type="file" style="display: none;">
                </label> <span>An image to describe the project</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Description<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <textarea rows="5" name="description" class="form-control" placeholder="Give a brief overview of the project goals" required>{{$data['description']}}</textarea>
                  @if ($errors->has('description'))
                    <span class="red">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-xs-3  project-btn">
                  <button class="btn btn-primary" href="/"><i class="fa  fa-chevron-left "></i> Home</button>
                </div>
                <div class="col-xs-offset-6 col-xs-3  project-btn">
                  <button class="btn btn-primary" type="submit">Next <i class="fa  fa-chevron-right "></i></a>
                </div>
              </div>
            </article>
          </form>
          @else
          <form action="/new-project" method="POST" enctype="multipart/form-data" />
          {{ csrf_field() }}
            <article>
              <h5>Project basic details</h5>
              @if (Session::has('project_basic_details_error'))
                <div class="alert alert-danger">
                    {{ Session::get('project_basic_details_error') }}
                </div>
              @endif
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Title<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input name="title" type="text" class="form-control" required />
                  @if ($errors->has('title'))
                    <span class="red">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Category<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <div class="col-md-3"><input type="checkbox" name="mobile-app" value="1"  />&nbsp;Mobile App</div>
                  @if ($errors->has('mobile-app'))
                    <span class="red">
                        <strong>{{ $errors->first('mobile-app') }}</strong>
                    </span>
                  @endif
                  <div class="col-md-3"><input type="checkbox" name="e-commerce" value="2"  />&nbsp;E-commerce</div>
                  @if ($errors->has('e-commerce'))
                    <span class="red">
                        <strong>{{ $errors->first('e-commerce') }}</strong>
                    </span>
                  @endif
                  <div class="col-md-3"><input type="checkbox" name="blog" value="3"  />&nbsp;Blog</div>
                  @if ($errors->has('blog'))
                    <span class="red">
                        <strong>{{ $errors->first('blog') }}</strong>
                    </span>
                  @endif
                  <div class="col-md-3"><input type="checkbox" value="4" name="website" checked  />&nbsp;Website</div>
                  @if ($errors->has('website'))
                    <span class="red">
                        <strong>{{ $errors->first('website') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Caption</label>
                </div>
                <div class="col-md-10">
                  <label class="btn btn-default btn-file">
                    Browse (max 500kb) <input name="caption" type="file" style="display: none;">
                </label> <span>An image to describe the project</span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Description<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <textarea rows="5" name="description" class="form-control" placeholder="Give a brief overview of the project goals" required></textarea>
                  @if ($errors->has('description'))
                    <span class="red">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-xs-3  project-btn">
                  <button class="btn btn-primary" href="/"><i class="fa  fa-chevron-left "></i> Home</button>
                </div>
                <div class="col-xs-offset-6 col-xs-3  project-btn">
                  <button class="btn btn-primary" type="submit">Next <i class="fa  fa-chevron-right "></i></a>
                </div>
              </div>
            </article>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
