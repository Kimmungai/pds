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
        <p>Let bidders know the schedule of the project</p>
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
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><span class="fa">1</span><p>Basic details <br /><span class="fa fa-check"></span></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><span class="fa">2</span><p>Features <br /><span class="fa fa-check"></span></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><span class="fa">3</span><p>Plan</p></div></div>
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
             <form action="/new-project-schedule" method="POST">
              {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-2">
                    <label >Start date<span class="red">*</span></label>
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
                    <label >End date<span class="red">*</span></label>
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
                    <label >Agreement<span class="red">*</span></label>
                  </div>
                  <div class="col-md-10">
                    <input name="terms" id="terms" type="radio" value="1" onchange="enable_post_button()" required/><span> &nbsp;<a href="{{asset('/agreement/project-posting.pdf')}}" target="_blank">I agree to all terms and conditions</a></span>
                    @if ($errors->has('terms'))
                      <span class="red">
                          <strong>{{ $errors->first('terms') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label >Ready to pay price</label>
                  </div>
                  <div class="col-md-10">
                    <input name="desired_price" type="number" class="form-control" value="{{$data['desired_price']}}" placeholder="Amount in Ksh.." />
                    @if ($errors->has('desired_price'))
                      <span class="red">
                          <strong>{{ $errors->first('desired_price') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label >Message to bidders</label>
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
                    <a class="btn btn-primary" href="/new-project-features-back"><span class="fa  fa-chevron-left "></span> Back</a>
                  </div>
                  <div class="col-xs-offset-6 col-xs-3  project-btn">
                    <button id="post" type="submit" class="btn btn-primary disabled"><span class="fa fa-send"></span> Post</button>
                  </div>
                </div>
              </form>
            @else
            <form action="/new-project-schedule" method="POST">
             {{ csrf_field() }}
               <div class="row">
                 <div class="col-md-2">
                   <label >Start date<span class="red">*</span></label>
                 </div>
                 <div class="col-md-10">
                   <input id="start_date" name="start_date" type="text" class="form-control" value="{{ old('start_date') }}" required/>
                   @if ($errors->has('start_date'))
                     <span class="red">
                         <strong>{{ $errors->first('start_date') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-2">
                   <label >End date<span class="red">*</span></label>
                 </div>
                 <div class="col-md-10">
                   <input name="end_date" id="end_date" type="text" class="form-control" value="{{ old('end_date') }}" required/>
                   @if ($errors->has('end_date'))
                     <span class="red">
                         <strong>{{ $errors->first('end_date') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-2">
                   <label >Agreement<span class="red">*</span></label>
                 </div>
                 <div class="col-md-10">
                   <input name="terms" id="terms" type="radio" value="1" onchange="enable_post_button()" required/><span> &nbsp;<a href="{{asset('/agreement/project-posting.pdf')}}" target="_blank">I agree to all terms and conditions</a></span>
                   @if ($errors->has('terms'))
                     <span class="red">
                         <strong>{{ $errors->first('terms') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-2">
                   <label >Ready to pay price</label>
                 </div>
                 <div class="col-md-10">
                   <input name="desired_price" type="number" class="form-control" value="{{ old('desired_price') }}" placeholder="Amount in Ksh.." />
                   @if ($errors->has('desired_price'))
                     <span class="red">
                         <strong>{{ $errors->first('desired_price') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-2">
                   <label >Message to bidders</label>
                 </div>
                 <div class="col-md-10">
                   <textarea name="message_to_bidders" rows="5" class="form-control" placeholder="Give a brief overview of the project goals">{{ old('message_to_bidders') }}</textarea>
                   @if ($errors->has('message_to_bidders'))
                     <span class="red">
                         <strong>{{ $errors->first('message_to_bidders') }}</strong>
                     </span>
                   @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col-xs-3  project-btn">
                   <a class="btn btn-primary" href="/new-project-features-back"><span class="fa  fa-chevron-left "></span> Back</a>
                 </div>
                 <div class="col-xs-offset-6 col-xs-3  project-btn">
                   <button id="post" type="submit" class="btn btn-primary disabled"><span class="fa fa-send"></span> Post</button>
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
$( "#start_date" ).datepicker({
  changeMonth: true,
  changeYear: true
});
} );
$( function() {
$( "#end_date" ).datepicker({
  changeMonth: true,
  changeYear: true
});
} );
</script>
<script>
  function enable_post_button()
  {
    $('#post').removeClass('disabled');
  }
</script>
@endsection
