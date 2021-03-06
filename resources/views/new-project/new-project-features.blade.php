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
        <p>Describe your project to help bidders understand it.</p>
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
  <div class="container"><div class="row"><h2>Project Features</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><span class="fa">1</span><p>Basic details <br /><span class="fa fa-check"></span></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><span class="fa">2</span><p>Features</p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><span class="fa">3</span><p>Plan</p></div></div>
        </div>
        <div class="row">
          <article>
            <h5>Features selection form</h5>
            @if (Session::has('project_basic_saved'))
              <div class="alert alert-success">
                  {{ Session::get('project_basic_saved') }}
              </div>
            @endif
            @if (Session::has('project_basic_updated'))
              <div class="alert alert-success">
                  {{ Session::get('project_basic_updated') }}
              </div>
            @endif
            @if(isset($data) && isset($category))
              <form action="/new-project-features" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-2">
                    <label >Userbility<span class="red">*</span>(click to select)</label>
                  </div>
                  <div class="col-md-10">
                    <div class="col-md-3"><div id="feature-div-1" class="new-project-desire-feature <?php if($category['feature2']) { ?>green-bg<?php } ?>" onclick="select_feature('feature2',this.id)"><span class="fa fa-desktop"></span> <span class="fa fa-tablet"></span> <span class="fa  fa-mobile"></span><p>Responsive</p> </div></div>
                    <input type="hidden"  id="feature1" <?php if($category['feature1']){ ?>name="feature1" value="1"<?php } ?> />
                    <div class="col-md-3"><div id="feature-div-2" class="new-project-desire-feature <?php if($category['feature3']){ ?>green-bg<?php } ?>" onclick="select_feature('feature3',this.id)"><span class="fa fa-users"></span><p>Membership</p> </div></div>
                    <input type="hidden"  id="feature2" <?php if($category['feature2']){ ?>name="feature2" value="1"<?php } ?>/>
                    <div class="col-md-3"><div id="feature-div-3" class="new-project-desire-feature <?php if($category['feature1']){ ?>green-bg<?php } ?>" onclick="select_feature('feature1',this.id)"><span class="fa fa-cart-plus"></span><p>Shopping cart</p> </div></div>
                    <input type="hidden"  id="feature3" <?php if($category['feature3']){ ?>name="feature3" value="1"<?php } ?>/>
                    <div class="col-md-3"><div id="feature-div-4" class="new-project-desire-feature <?php if($category['feature4']){ ?>green-bg<?php } ?>" onclick="select_feature('feature4',this.id)"><span class="fa   fa-envelope-open"></span><p>Notifications</p> </div></div>
                    <input type="hidden"  id="feature4" <?php if($category['feature4']){ ?>name="feature4" value="1"<?php } ?>/>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label >Back-end<span class="red">*</span>(click to select)</label>
                  </div>
                  <div class="col-md-10">
                    <div class="col-md-3"><div id="feature-div-5" class="new-project-desire-feature <?php if($category['feature5']){ ?>green-bg<?php } ?>" onclick="select_feature('feature5',this.id)"><span class="fa fa-cloud-upload"></span><p>Cloud hosting</p> </div></div>
                    <input type="hidden"  id="feature5" <?php if($category['feature5']){ ?>name="feature5" value="1"<?php } ?>/>
                    <div class="col-md-3"><div id="feature-div-6" class="new-project-desire-feature <?php if($category['feature6']){ ?>green-bg<?php } ?>" onclick="select_feature('feature6',this.id)"><span class="fa fa-users"></span><p>Admin panel</p> </div></div>
                    <input type="hidden"  id="feature6" <?php if($category['feature6']){ ?>name="feature6" value="1"<?php } ?>/>
                    <div class="col-md-3"><div id="feature-div-8" class="new-project-desire-feature <?php if($category['feature7']){ ?>green-bg<?php } ?>" onclick="select_feature('feature7',this.id)"><span class="fa fa-hourglass"></span><p>Back-up</p> </div></div>
                    <input type="hidden"  id="feature7" <?php if($category['feature7']){ ?>name="feature7" value="1"<?php } ?>/>
                    <div class="col-md-3"><div id="feature-div-9" class="new-project-desire-feature <?php if($category['feature8']){ ?>green-bg<?php } ?>" onclick="select_feature('feature8',this.id)"><span class="fa   fa-envelope-open"></span><p>Bulk Sms</p> </div></div>
                    <input type="hidden"  id="feature8" <?php if($category['feature8']){ ?>name="feature8" value="1"<?php } ?>/>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label >Technical specifications</label>
                  </div>
                  <div class="col-md-10">
                    <!--<label class="btn btn-default btn-file">
                      Browse (max 500kb) <input name="feature9" type="file" style="display: none;">
                  </label> <span>Choose a software specification document 1</span>-->
                  @if($category['feature9']=='')
                    <span>Choose a software specification document 1</span>
                  @else
                    <span>Choose new document 1</span>
                  @endif
                  <input name="feature9" type="file" class="form-control"  style="height:auto;" accept=".pdf*">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label ></label>
                  </div>
                  <div class="col-md-10">
                    @if($category['feature10']=='')
                      <span>Choose a software specification document 2</span>
                    @else
                      <span>Choose new document 2</span>
                    @endif
                    <input name="feature10" type="file" class="form-control"  style="height:auto;" accept=".pdf*">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label ></label>
                  </div>
                  <div class="col-md-10">
                    @if($category['feature11']=='')
                      <span>Choose a software specification document 3</span>
                    @else
                      <span>Choose new document 3</span>
                    @endif
                  <input name="feature11" type="file" class="form-control"  style="height:auto;" accept=".pdf*">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label >Other details</label>
                  </div>
                  <div class="col-md-10">
                    <textarea rows="5" class="form-control" placeholder="Describe any other details concerning the project" name="other-features">{{$category['other_features']}}</textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3  project-btn">
                    <a class="btn btn-primary" href="/project-basic-back/{{session('new_project_id')}}"><span class="fa  fa-chevron-left "></span> Back</a>
                  </div>
                  <div class="col-xs-3 col-xs-offset-6 project-btn">
                    <button class="btn btn-primary" href="/new-project-schedule">Next <span class="fa  fa-chevron-right "></span></button>
                  </div>
                </div>
              </form>
            @else
            <form action="/new-project-features" method="POST" enctype="multipart/form-data" >
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-2">
                  <label >Userbility<span class="red">*</span>(click to select)</label>
                </div>
                <div class="col-md-10">
                  <div class="col-md-3"><div id="feature-div-1" class="new-project-desire-feature " onclick="select_feature('feature2',this.id)"><span class="fa fa-desktop"></span> <span class="fa fa-tablet"></span> <span class="fa  fa-mobile"></span><p>Responsive</p> </div></div>
                  <input type="hidden"  id="feature2" value="" />
                  <div class="col-md-3"><div id="feature-div-2" class="new-project-desire-feature " onclick="select_feature('feature3',this.id)"><span class="fa fa-users"></span><p>Membership</p> </div></div>
                  <input type="hidden"  id="feature3" />
                  <div class="col-md-3"><div id="feature-div-3" class="new-project-desire-feature " onclick="select_feature('feature1',this.id)"><span class="fa fa-cart-plus"></span><p>Shopping cart</p> </div></div>
                  <input type="hidden"  id="feature1" />
                  <div class="col-md-3"><div id="feature-div-4" class="new-project-desire-feature " onclick="select_feature('feature4',this.id)"><span class="fa   fa-envelope-open"></span><p>Notifications</p> </div></div>
                  <input type="hidden"  id="feature4" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label >Back-end<span class="red">*</span>(click to select)</label>
                </div>
                <div class="col-md-10">
                  <div class="col-md-3"><div id="feature-div-5" class="new-project-desire-feature " onclick="select_feature('feature5',this.id)"><span class="fa fa-cloud-upload"></span><p>Cloud hosting</p> </div></div>
                  <input type="hidden"  id="feature5" />
                  <div class="col-md-3"><div id="feature-div-6" class="new-project-desire-feature " onclick="select_feature('feature6',this.id)"><span class="fa fa-users"></span><p>Admin panel</p> </div></div>
                  <input type="hidden"  id="feature6" />
                  <div class="col-md-3"><div id="feature-div-8" class="new-project-desire-feature " onclick="select_feature('feature7',this.id)"><span class="fa fa-hourglass"></span><p>Back-up</p> </div></div>
                  <input type="hidden"  id="feature7" />
                  <div class="col-md-3"><div id="feature-div-9" class="new-project-desire-feature " onclick="select_feature('feature8',this.id)"><span class="fa   fa-envelope-open"></span><p>Bulk Sms</p> </div></div>
                  <input type="hidden"  id="feature8" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label >Technical specifications</label>
                </div>
                <div class="col-md-10">
                  <!--<label class="btn btn-default btn-file">
                    Browse (max 500kb) <input name="feature9" type="file" style="display: none;">
                </label> <span>Choose a software specification document 1</span>-->
                <span>Choose a software specification document 1</span>
                <input name="feature9" type="file" class="form-control"  style="height:auto;" accept=".pdf*">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label ></label>
                </div>
                <div class="col-md-10">
                  <span>Choose a software specification document 2</span>
                  <input name="feature10" type="file" class="form-control"  style="height:auto;" accept=".pdf*">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label ></label>
                </div>
                <div class="col-md-10">
                <span>Choose a software specification document 3</span>
                <input name="feature11" type="file" class="form-control"  style="height:auto;" accept=".pdf*">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label >Other details</label>
                </div>
                <div class="col-md-10">
                  <textarea rows="5" class="form-control" placeholder="Describe any other details concerning the project" name="other-features"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-3  project-btn">
                  <a class="btn btn-primary" href="/project-basic-back/{{session('new_project_id')}}"><span class="fa  fa-chevron-left "></span> Back</a>
                </div>
                <div class="col-xs-3 col-xs-offset-6 project-btn">
                  <button class="btn btn-primary" href="/new-project-schedule">Next <span class="fa  fa-chevron-right "></span></button>
                </div>
              </div>
            </form>
          @endif
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function select_feature(id,divId)
  {
    $('#'+divId).toggleClass("green-bg");
    if($('#'+id).attr('name')===id){
      $('#'+id).attr('name','');
    }else{
      $('#'+id).attr('name',id);
      $('#'+id).val(1);
    }
  }
</script>
@endsection
