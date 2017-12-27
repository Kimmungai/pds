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
      <li class="active"><a href="/">Home</a></li>
      <li><a href="/projects">Projects</a></li>
      <li><a href="/#how-it-works">How it works</a></li>
      <li><a href="/about-us">About us</a></li>
      <li class="visible-xs-block"><a href="/service-provider-sign-up">Become a bidder</a></li>
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
        <p>Let Web design companies compete for your project through bidding!</p>
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
@if(count($projects))
<div class="container">
  <div class="row">
    <section class="main-body">
      <div class="container section-decoration">
        <div class="row second-nav">
          <h2>Latest projects</h2>
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
          <div class="strip"></div>
          <div class="col-md-8">
            <nav class="breadcrumb">
              <a class="btn btn-default <?php if(!session('bid_types')){?>active<?php }?>" href="/all-bids/0">All bids <span class="glyphicon glyphicon-list"></span></a>
              <a class="btn btn-default <?php if(session('bid_types') && session('bid_types')==1){?>active<?php }?>" href="/closed-bids/0">Closed bids <span class="glyphicon glyphicon-folder-close"></span></a>
              <a class="btn btn-default <?php if(session('bid_types') && session('bid_types')==2){?>active<?php }?>" href="/open-bids/0">Open bids <span class="glyphicon glyphicon-folder-open"></span></a>
            </nav>
         </div>
         <div class="col-md-1 col-md-offset-1 sort-label">
           <label><span class="glyphicon glyphicon-sort-by-attributes"></span> Sort:</label>
         </div>
         <div class="col-md-2">
           <nav class="breadcrumb sort-panel">
             <form id="sort-projects" action="/sort-projects/0" method="GET">
             <select class="form-control" name="sort-projects" onchange="submit_form('sort-projects')">
               <option value="1" <?php if(!session('sort_projects')){?> selected <?php }?>>Newest - Oldest</option>
               <option value="2" <?php if(session('sort_projects') && session('sort_projects')==2){?> selected <?php }?>>Oldest - Newest</option>
               <option value="3" <?php if(session('sort_projects') && session('sort_projects')==3){?> selected <?php }?>>Expensive - Cheapest</option>
               <option value="4" <?php if(session('sort_projects') && session('sort_projects')==4){?> selected <?php }?>>Cheapest - Expensive</option>
             </select>
            </form>
           </nav>
         </div>
       </div>
    </div>
    <div class="container section-decoration"><!--projects start here-->
     <div class="row project-area">
       @foreach($projects as $project)
       <div class="col-md-6">
         <article>
           <h3>{{$project['title']}}</h3>
           <div class="row">
             <div class="col-md-6">
               <h4 class="text-muted">Desired features</h4>
               <div class="row">
                 @if($project['projectType']['feature1'])
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-cart-plus"></span><p>Check out</p></div></div>
                 @else
                  <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                 @endif
                 @if($project['projectType']['feature2'])
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-desktop"></span> <span class="fa fa-tablet"></span> <span class="fa  fa-mobile"></span><p>Responsive</p></div></div>
                 @else
                  <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                 @endif
               </div>
               <div class="row">
                 @if($project['projectType']['feature5'])
                 <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-cloud-upload"></span><p>Cloud based</p></div></div>
                 @else
                  <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                 @endif
                 @if($project['projectType']['feature6'])
                  <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-dashboard"></span><p>Admin panel</p></div></div>
                 @else
                  <div class="col-xs-6"><div class="desired-feature"><span class="fa fa-exclamation-triangle"></span><p>Unspecified</p></div></div>
                 @endif
               </div>
             </div>
             <div class="col-md-6">
               @if($project['caption']=='')
                  @if(!$project['projectType']['category'])
                    <div class="project-pic"></div>
                  @elseif($project['projectType']['category']==1)
                    <div class="project-pic"><img src="{{asset('/avatar/mobile.jpg')}}" alt="Mobile App Project"></div>
                  @elseif($project['projectType']['category']==2)
                    <div class="project-pic"><img src="{{asset('/avatar/e-commerce.jpg')}}" alt="E-commerce Project"></div>
                  @elseif($project['projectType']['category']==3)
                    <div class="project-pic"><img src="{{asset('/avatar/blog.jpg')}}" alt="Blog Project"></div>
                  @elseif($project['projectType']['category']==4)
                    <div class="project-pic"><img src="{{asset('/avatar/website.jpg')}}" alt="Website Project"></div>
                  @endif
               @else
               <div class="project-pic"><img src="{{ url($project['caption']) }}" alt="{{$project['title']}}"></div>
               @endif
             </div>
           </div>
          <div class="row project-info">
            <div class="col-md-6">
              <h4 class="text-muted">Bidding information</h4>
               <ul class="list-group">
                  @if($project['final_price']=='')
                  <li class="list-group-item">Status: <span class="green">OPEN</span></li>
                  @else
                  <li class="list-group-item">Status: <span class="red">CLOSED</span></li>
                  @endif
                  <li class="list-group-item">No. of placed bids: <span class="bold">{{count($project['bid'])}}</span></li>
                  @if($project['final_price']!='')
                  <li class="list-group-item">Final price: <span class="bold red">Ksh. {{round($project['final_price'],2)}}</span></li>
                  @elseif($project['avg_price']=='')
                  <li class="list-group-item">Average price: <span class="bold red">-</span></li>
                  @else
                  <li class="list-group-item">Average price: <span class="bold red">Ksh. {{round($project['avg_price'],2)}}</span></li>
                  @endif
                  @if($project['final_price']=='')
                  <li class="list-group-item">Bid closing: <span class="bold">{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['valid_period']))->diffForHumans()}}</span></li>
                  @else
                  <li class="list-group-item">Bid closed: <span class="bold">{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['updated_at']))->diffForHumans()}}</span></li>
                  @endif
                </ul>
              </div>
                <div class="col-md-6">
                  <h4 class="text-muted">Client information</h4>
                    <ul class="list-group">
                        <li class="list-group-item">Name: <span class="bold">{{$project['user']['first_name']}} {{$project['user']['last_name']}}</span></li>
                        @if($project['desired_price']=='')
                        <li class="list-group-item">Desired price: <span class="bold">Unspecified</span></li>
                        @else
                        <li class="list-group-item">Desired price: <span class="bold">Ksh. {{round($project['desired_price'],2)}}</span></li>
                        @endif
                        <li class="list-group-item">Star rating: <span class="bold"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></span></li>
                        <li class="list-group-item">view profile: <span class="bold"><a href="/client-public-profile/{{$project['user']['id']}}">profile</a></span></li>
                    </ul>
                  </div>
                @if(Auth::user() && !Auth::user()->userMembership->type)
                 <div class="project-actions">
                   <a href="/project-details/{{$project['id']}}" class="btn btn-primary details-btn"><span class="fa  fa-list"></span> Details</a>
                </div>
                @else
                <div class="project-actions">
                  <a href="/project-details/{{$project['id']}}" class="btn btn-primary details-btn"><span class="fa  fa-list"></span> Details</a>
                  <a href="/project-details/{{$project['id']}}" class="btn btn-primary bid-btn pull-right"><span class="fa  fa-bell-o"></span> Place a bid</a>
               </div>
               @endif
            </div>
         </article>
      </div>
     @endforeach
    <p class="view-more"><a href="/projects">View more</a></p>
   </div>`
  </div><!--projects end here-->
  </section>
</div>
</div>
@else
<div class="container">
<div class="row">
  <section class="main-body">

    <div class="container section-decoration">
      <div class="row second-nav">
        <h2>Latest projects</h2>
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
        <div class="strip"></div>
        <div class="col-md-8">
          <nav class="breadcrumb">
            <a class="btn btn-default <?php if(!session('bid_types')){?>active<?php }?>" href="/all-bids/0">All bids <span class="glyphicon glyphicon-list"></span></a>
            <a class="btn btn-default <?php if(session('bid_types') && session('bid_types')==1){?>active<?php }?>" href="/closed-bids/0">Closed bids <span class="glyphicon glyphicon-folder-close"></span></a>
            <a class="btn btn-default <?php if(session('bid_types') && session('bid_types')==2){?>active<?php }?>" href="/open-bids/0">Open bids <span class="glyphicon glyphicon-folder-open"></span></a>
          </nav>
       </div>
       <div class="col-md-1 col-md-offset-1 sort-label">
         <label><span class="glyphicon glyphicon-sort-by-attributes"></span> Sort:</label>
       </div>
       <div class="col-md-2">
         <nav class="breadcrumb sort-panel">
           <form id="sort-projects" action="/sort-projects/0" method="GET">
           <select class="form-control" name="sort-projects" onchange="submit_form('sort-projects')">
             <option value="1" <?php if(!session('sort_projects')){?> selected <?php }?>>Newest - Oldest</option>
             <option value="2" <?php if(session('sort_projects') && session('sort_projects')==2){?> selected <?php }?>>Oldest - Newest</option>
             <option value="3" <?php if(session('sort_projects') && session('sort_projects')==3){?> selected <?php }?>>Expensive - Cheapest</option>
             <option value="4" <?php if(session('sort_projects') && session('sort_projects')==4){?> selected <?php }?>>Cheapest - Expensive</option>
           </select>
          </form>
         </nav>
       </div>
     </div>
     <h3>No projects found!</h3>
  </div>
</section>
</div>
</div>
@endif
@if(count($provider_companies))
<section class="service-providers">
  <div class="container section-decoration">
    <div class="row second-nav">
     <h2>Available Bidders</h2>
     <div class="strip"></div>
     <div class="col-md-1 col-md-offset-8 sort-label">
       <label><span class="glyphicon glyphicon-sort-by-attributes"></span> Sort:</label>
     </div>
     <div class="col-md-3">
       <nav class="breadcrumb sort-panel">
         <form id="sort-providers" action="/sort-providers" method="GET" >
         <select class="form-control" name="sort-providers" onchange="submit_form('sort-providers')">
           <option value="1" <?php if(!session('sort_providers')){?> selected <?php }?>>Ranking high - Ranking low</option>
           <option value="2" <?php if(session('sort_providers') && session('sort_providers')==2){?> selected <?php }?>>Ranking low - Ranking high</option>
           <option value="3" <?php if(session('sort_providers') && session('sort_providers')==3){?> selected <?php }?>>Newest - Oldest</option>
           <option value="4" <?php if(session('sort_providers') && session('sort_providers')==4){?> selected <?php }?>>Oldest - Newest</option>
         </select>
        </form>
       </nav>
     </div>
    </div>
   </div>
   <!---***********************-->
   <div class="container section-decoration">
     <div class="row provider">
       @foreach($provider_companies as $provider_company)
        @if(count($provider_company->user->userMembership))
       <div class="col-md-4">
         <article>
           <h4>{{$provider_company['company_name']}}</h4>
           <div class="row provider-details">
             <div class="col-xs-5">
               @if($provider_company['user']['avatar']=='')
                 <div class="provider-logo"><img src="{{asset('/avatar/avatar.jpg')}}" alt="bidder logo" ></div>
               @else
                 <div class="provider-logo"><img src="{{url($provider_company['user']['avatar'])}}" alt="{{$provider_company['user']['first_name']}} logo" ></div>
               @endif
             </div>
             <div class="col-xs-7">
               <ul class="list-group">
                 <li class="list-group-item">Established: <span>{{$provider_company['company_incoporation_date']}}</span></li>
                 @if($provider_company['company_industry']==1)
                 <li class="list-group-item">Industry: <span>Software</span></li>
                 @elseif($provider_company['company_industry']==2)
                 <li class="list-group-item">Industry: <span>Telco</span></li>
                 @elseif($provider_company['company_industry']==3)
                 <li class="list-group-item">Industry: <span>Business</span></li>
                 @elseif($provider_company['company_industry']==4)
                 <li class="list-group-item">Industry: <span>Marketing</span></li>
                 @endif
                 <li class="list-group-item">Rating: <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></li>
                 @if($provider_company['user']['admin_approved'])
                 <li class="list-group-item">Status: <span class="fa fa-certificate red"></span> <span class="green">Cerified</span></li>
                 @endif
               </ul>
             </div>
           </div>
           <div class="row provider-details">
             <div class="col-xs-12">
               <h5>Description</h5>
               <hr>
               <div class="company-description">{{$provider_company['company_description']}}</div>
               <hr>
             </div>
           </div>
           <div class="row">
             <div class="col-xs-12">
               <div class="provider-actions">
                 <a href="/provider-profile/{{$provider_company['user']['id']}}" class="btn btn-primary details-btn"><span class="fa  fa-building-o"></span> Profile</a>
                 <a href="{{$provider_company['company_website']}}" class="btn btn-primary pull-right details-btn" target="_blank"><span class="fa fa-external-link "></span> Website</a>
              </div>
             </div>
           </div>
         </article>
       </div>
        @endif
       @endforeach
     </div>
     <nav aria-label="...">
       <ul class="pagination pull-right">
         {{$provider_companies->links()}}
       </ul>
     </nav>
    <!---***********************-->
   </div>
</section>
@endif
<section class="how-it-works" id="how-it-works">
  <div class="container section-decoration">
    <div class="row"><h2>How it works</h2><div class="strip"></div></div>
    <div class="row working-steps">
      <div class="col-md-3">
        <div class="step"><p><span class="badge">1</span><br /><span class="fa   fa-list"></span><br />Post the details of your project</p></div>
      </div>
      <div class="col-md-3">
        <div class="step"><p><span class="badge">2</span><br /><span class="fa fa-briefcase"></span> <span class="fa fa-briefcase"></span><br />Let companies bid for your project</p></div>
      </div>
      <div class="col-md-3">
        <div class="step"><p><span class="badge">3</span><br /><span class="fa fa-bell-o"></span><br />Select the best bid!</p></div>
      </div>
      <div class="col-md-3">
        <div class="step"><p><span class="badge">4</span><br /><span class="fa fa-weixin"></span><br />Chat with the winner and finalize the deal</p></div>
      </div>
    </div>
    <div class="row project-btn pull-right">
        <div class="col-md-3"><a class="btn btn-primary" href="/new-project">Post a new project</a></div>
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
          <img src="{{asset('/img/map.jpg')}}" alt="Enquiry area">
        </div>
      </div>
      <div class="col-md-6">
        <article>
         <form action="/make-enquiry" method="POST" >
           {{csrf_field()}}
            <h5>Contact Form</h5>
            <div class="row">
              <div class="col-md-2">
                <label>Name<span class="red">*</span></label>
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
                <label>Subject<span class="red">*</span></label>
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
                <label>Email<span class="red">*</span></label>
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
                <label>Phone</label>
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
                <label>Message<span class="red">*</span></label>
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
                <button class="btn btn-primary" type="submit"><span class="fa fa-send"></span> Send</button>
              </div>
            </div>
          </form>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection
