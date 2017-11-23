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
      <li class="active"><a href="/">Home</a></li>
      <li><a href="/projects">Projects</a></li>
      <li><a href="/#how-it-works">How it works</a></li>
      <li><a href="/about-us">About us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/new-project">New Project</a></li>
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
<div class="container">
<div class="row">
  <section class="main-body">
    <div class="container section-decoration">
      <div class="row second-nav">
        <h2>Latest projects</h2>
        <div class="strip"></div>
        <div class="col-md-8">
          <nav class="breadcrumb">
            <a class="btn btn-default active" href="#">All bids <span class="glyphicon glyphicon-list"></span></a>
            <a class="btn btn-default" href="#">Closed bids <span class="glyphicon glyphicon-folder-close"></span></a>
            <a class="btn btn-default" href="#">Open bids <span class="glyphicon glyphicon-folder-open"></span></a>
          </nav>
       </div>
       <div class="col-md-1 col-md-offset-1 sort-label">
         <label for="sort-projects"><span class="glyphicon glyphicon-sort-by-attributes"></span> Sort:</label>
       </div>
       <div class="col-md-2">
         <nav class="breadcrumb sort-panel">
           <select class="form-control" name="sort-projects">
             <option>Newest - Oldest</option>
             <option>Oldest - Newest</option>
             <option>Expensive - Cheapest</option>
             <option>Cheapest - Expensive</option>
           </select>
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
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
               @else
                <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
               @endif
               @if($project['projectType']['feature2'])
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
               @else
                <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
               @endif
             </div>
             <div class="row">
               @if($project['projectType']['feature5'])
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
               @else
                <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
               @endif
               @if($project['projectType']['feature6'])
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
               @else
                <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-exclamation-triangle"></i><p>Unspecified</p></div></div>
               @endif
             </div>
           </div>
           <div class="col-md-6">
             @if($project['caption']=='')
             <div class="project-pic" style="background:url('{{asset('/avatar/avatar.jpg')}}') no-repeat center;"></div>
             @else
             <div class="project-pic" style="background:url('{{ url($project['caption']) }}') no-repeat center;"></div>
             @endif
           </div>
         </div>
        <div class="row project-info">
          <div class="col-md-6">
            <h4 class="text-muted">Bidding information</h4>
             <ul class="list-group">
                <li class="list-group-item">Status: <span class="green">OPEN</span></li>
                <li class="list-group-item">No. of placed bids: <span class="bold">1000</span></li>
                <li class="list-group-item">Average price: <span class="bold red">Ksh. 100,000</span></li>
                <li class="list-group-item">Remaining time: <span class="bold">7:4:33</span></li>
              </ul>
            </div>
            <div class="row project-info">
              <div class="col-md-6">
                <h4 class="text-muted">Client information</h4>
                  <ul class="list-group">
                      <li class="list-group-item">Name: <span class="bold">{{$project['user']['first_name']}} {{$project['user']['last_name']}}</span></th>
                      <li class="list-group-item">previous projects: <span class="bold">10</span></th>
                      <li class="list-group-item">Star rating: <span class="bold"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></th>
                      <li class="list-group-item">view profile: <span class="bold"><a href="#">profile</a></span></th>
                  </ul>
                </div>
                <div class="project-actions">
                  <a href="/project-details/{{$project['id']}}" class="btn btn-primary details-btn"><i class="fa  fa-list"></i> Details</a>
                  <a href="/project-details/1" class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Place bid</a>
               </div>
       </article>
   </div>
   @endforeach
 </div>
  <p class="view-more"><a href="#">View more</a></p>
 </div>`
</div><!--projects end here-->
</section>
</div>
</div>
@if(count($provider_companies))
<section class="service-providers">
  <div class="container section-decoration">
    <div class="row second-nav">
     <h2>Service providers</h2>
     <div class="strip"></div>
     <div class="col-md-1 col-md-offset-9 sort-label">
       <label for="sort-projects"><span class="glyphicon glyphicon-sort-by-attributes"></span> Sort:</label>
     </div>
     <div class="col-md-2">
       <nav class="breadcrumb sort-panel">
         <select class="form-control" name="sort-projects">
           <option>Newest - Oldest</option>
           <option>Oldest - Newest</option>
           <option>Expensive - Cheapest</option>
           <option>Cheapest - Expensive</option>
         </select>
       </nav>
     </div>
    </div>
   </div>
   <!---***********************-->
   <div class="container section-decoration">
     <div class="row provider">
       @foreach($provider_companies as $provider_company)
       <div class="col-md-3"> <!--provider companies begins here-->
         <article>
           <h4>{{$provider_company['company_name']}}</h4>
           <div class="row provider-details">
             <div class="col-md-5">
               @if($provider_company['company_reg_cert']=='')
                 <div class="provider-logo" style="background:url('{{asset('/avatar/avatar.jpg')}}') center no-repeat;"></div>
               @else
                 <div class="provider-logo" style="background:url('{{ url($provider_company['company_reg_cert']) }}') no-repeat center;">
               @endif
               </div>
             </div>
             <div class="col-md-7">
              <ul>
                <li>Established: <span>{{$provider_company['company_incoporation_date']}}</span></li>
                <li>Completed bids: <span>2005</span></li>
                <li>Rating: <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
              </ul>
             </div>
             <div class="row provider-details">
               <div class="col-md-12">
                 <h5>Description</h5>
                 <p>{{$provider_company['company_description']}}</p>
               </div>
            </div>
           <div class="provider-actions">
             <a class="btn btn-primary details-btn"><i class="fa  fa-building-o"></i> Profile</a>
             <a href="{{$provider_company['company_website']}}" class="btn btn-primary pull-right details-btn"><i class="fa fa-external-link "></i> Website</a>
          </div>
         </article>
       </div>
     </div><!--provider companies ends here-->
     @endforeach
     <p class="view-more"><a href="#">View more</a></p>
   </div>
    <!---***********************-->
</section>
@endif
<section class="how-it-works" id="how-it-works">
  <div class="container section-decoration">
    <div class="row"><h2>How it works</h2><div class="strip"></div></div>
    <div class="row working-steps">
      <div class="col-md-3">
        <div class="step"><p><span class="badge">1</span><br /><i class="fa   fa-list"></i><br />Post the details of your project</p></div>
      </div>
      <div class="col-md-3">
        <div class="step"><p><span class="badge">2</span><br /><i class="fa fa-briefcase"></i> <i class="fa fa-briefcase"></i><br />Let companies bid for your project</p></div>
      </div>
      <div class="col-md-3">
        <div class="step"><p><span class="badge">3</span><br /><i class="fa fa-bell-o"></i><br />Select the best bid!</p></div>
      </div>
      <div class="col-md-3">
        <div class="step"><p><span class="badge">4</span><br /><i class="fa fa-weixin"></i><br />Chat with the winner and finalize the deal</p></div>
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

        </div>
      </div>
      <div class="col-md-6">
        <article>
          <h5>Contact Form</h5>
          <div class="row">
            <div class="col-md-2">
              <label for="name">Name</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label for="name">Email</label>
            </div>
            <div class="col-md-10">
              <input type="email" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label for="name">Phone</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label for="name">Message</label>
            </div>
            <div class="col-md-10">
              <textarea class="form-control"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 pull-right project-btn">
              <a class="btn btn-primary btn-lg" href="#"><i class="fa fa-send"></i> Send</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
@endsection
