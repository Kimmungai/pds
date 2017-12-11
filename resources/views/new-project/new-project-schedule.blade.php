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
      @if(Auth::user())
        @if(Auth::user()->userMembership->type)
        @endif
      @else
        <li><a href="/new-project">New Project</a></li>
      @endif

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
        @if(Auth::user())
          @if(Auth::user()->userMembership->type)
            <a class="btn btn-primary" href="/profile">My profile</a>
          @endif
        @else
          <a class="btn btn-primary" href="/new-project">Post a new project</a>
        @endif
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
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">1</i><p>Basic details <br /><i class="fa fa-check"></i></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">2</i><p>Features <br /><i class="fa fa-check"></i></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><i class="fa">3</i><p>Plan</p></div></div>
        </div>
        <div class="row">
          <article>
            <h5>Project Schedule</h5>
            @if (Session::has('project_features_updated'))
              <div class="alert alert-success">
                  {{ Session::get('project_features_updated') }}
              </div>
            @endif
           @if(isset($data))
             <form action="/new-project-schedule" method="POST"/>
              {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-2">
                    <label for="name">Start date<span class="red">*</span></label>
                  </div>
                  <div class="col-md-10">
                    <input id="start_date" name="start_date" type="text" class="form-control" value="{{$data['start_date']}}" required/>
                    @if ($errors->has('start_date'))
                      <span class="red">
                          <strong>{{ $errors->first('start_date') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="name">End date<span class="red">*</span></label>
                  </div>
                  <div class="col-md-10">
                    <input name="end_date" id="end_date" type="text" class="form-control" value="{{$data['end_date']}}" required/>
                    @if ($errors->has('end_date'))
                      <span class="red">
                          <strong>{{ $errors->first('end_date') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="name">Ready to pay price</label>
                  </div>
                  <div class="col-md-10">
                    <input name="desired_price" type="text" class="form-control" value="{{$data['desired_price']}}" placeholder="Amount in Ksh.." />
                    @if ($errors->has('desired_price'))
                      <span class="red">
                          <strong>{{ $errors->first('desired_price') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="name">Message to bidders</label>
                  </div>
                  <div class="col-md-10">
                    <textarea name="message_to_bidders" rows="5" class="form-control" placeholder="Give a brief overview of the project goals">{{$data['message_to_bidders']}}</textarea>
                    @if ($errors->has('message_to_bidders'))
                      <span class="red">
                          <strong>{{ $errors->first('message_to_bidders') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-3  project-btn">
                    <a class="btn btn-primary" href="/new-project-features-back"><i class="fa  fa-chevron-left "></i> Back</a>
                  </div>
                  <div class="col-xs-offset-6 col-xs-3  project-btn">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Post</button>
                  </div>
                </div>
              </form>
            @else
            <form action="/new-project-schedule" method="POST"/>
             {{ csrf_field() }}
               <div class="row">
                 <div class="col-md-2">
                   <label for="name">Start date<span class="red">*</span></label>
                 </div>
                 <div class="col-md-10">
                   <input id="start_date" name="start_date" type="text" class="form-control" required/>
                   @if ($errors->has('start_date'))
                     <span class="red">
                         <strong>{{ $errors->first('start_date') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-2">
                   <label for="name">End date<span class="red">*</span></label>
                 </div>
                 <div class="col-md-10">
                   <input name="end_date" id="end_date" type="text" class="form-control" required/>
                   @if ($errors->has('end_date'))
                     <span class="red">
                         <strong>{{ $errors->first('end_date') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-2">
                   <label for="name">Ready to pay price</label>
                 </div>
                 <div class="col-md-10">
                   <input name="desired_price" type="text" class="form-control" placeholder="Amount in Ksh.." />
                   @if ($errors->has('desired_price'))
                     <span class="red">
                         <strong>{{ $errors->first('desired_price') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-2">
                   <label for="name">Message to bidders</label>
                 </div>
                 <div class="col-md-10">
                   <textarea name="message_to_bidders" rows="5" class="form-control" placeholder="Give a brief overview of the project goals"></textarea>
                   @if ($errors->has('message_to_bidders'))
                     <span class="red">
                         <strong>{{ $errors->first('message_to_bidders') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-xs-3  project-btn">
                   <a class="btn btn-primary" href="/new-project-features-back"><i class="fa  fa-chevron-left "></i> Back</a>
                 </div>
                 <div class="col-xs-offset-6 col-xs-3  project-btn">
                   <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Post</button>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script>
$( function() {
$( "#start_date" ).datepicker();
} );
$( function() {
$( "#end_date" ).datepicker();
} );
</script>
@endsection
