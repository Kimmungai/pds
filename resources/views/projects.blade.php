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
      <li class="active"><a href="/projects">Projects</a></li>
      <li><a href="/#how-it-works">How it works</a></li>
      <li><a href="/about-us">About us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/new-project">New Project</a></li>
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
        <p>Have leading companies place their offers!</p>
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
     <div class="col-md-6">
       <article>
         <h3>E-learning website</h3>
         <div class="row">
           <div class="col-md-6">
             <h4>Desired features</h4>
             <div class="row">
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
             </div>
             <div class="row">
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
               <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
             </div>
           </div>
           <div class="col-md-6">
             <div class="project-pic"></div>
           </div>
         </div>
        <div class="row project-info">
          <div class="col-md-6">
            <h4>Bidding information</h4>
             <ul>
                <li>Status: <span class="green">OPEN</span></li>
                <li>No. of placed bids: <span class="bold">1000</span></li>
                <li>Average price: <span class="bold red">Ksh. 100,000</span></li>
                <li>Remaining time: <span class="bold">7:4:33</span></li>
              </ul>
            </div>
            <div class="row project-info">
              <div class="col-md-6">
                <h4>Client information</h4>
                  <ul>
                      <li>Name: <span class="bold">Peter</span></th>
                      <li>previous projects: <span class="bold">10</span></th>
                      <li>Star rating: <span class="bold"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></th>
                      <li>view profile: <span class="bold"><a href="#">profile</a></span></th>
                  </ul>
                </div>
                <div class="project-actions">
                  <a class="btn btn-primary details-btn"><i class="fa  fa-list"></i> Details</a>
                  <a class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Place bid</a>
               </div>
       </article>
     </div>
   <div class="col-md-6">
     <article>
       <h3>E-commerce website</h3>
       <div class="row">
         <div class="col-md-6">
           <h4>Desired features</h4>
           <div class="row">
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
           </div>
           <div class="row">
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
           </div>
         </div>
         <div class="col-md-6">
           <div class="project-pic"></div>
         </div>
       </div>
      <div class="row project-info">
        <div class="col-md-6">
          <h4>Bidding information</h4>
           <ul>
              <li>Status: <span class="green">OPEN</span></li>
              <li>No. of placed bids: <span class="bold">1000</span></li>
              <li>Average price: <span class="bold red">Ksh. 100,000</span></li>
              <li>Remaining time: <span class="bold">7:4:33</span></li>
            </ul>
          </div>
          <div class="row project-info">
            <div class="col-md-6">
              <h4>Client information</h4>
                <ul>
                    <li>Name: <span class="bold">Peter</span></th>
                    <li>previous projects: <span class="bold">10</span></th>
                    <li>Star rating: <span class="bold"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></th>
                    <li>view profile: <span class="bold"><a href="#">profile</a></span></th>
                </ul>
              </div>
              <div class="project-actions">
                <a class="btn btn-primary details-btn"><i class="fa  fa-list"></i> Details</a>
                <a class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Place bid</a>
             </div>
     </article>
   </div>
 </div>
 <div class="row project-area">
   <div class="col-md-6">
     <article>
       <h3>E-learning website</h3>
       <div class="row">
         <div class="col-md-6">
           <h4>Desired features</h4>
           <div class="row">
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
           </div>
           <div class="row">
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
             <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
           </div>
         </div>
         <div class="col-md-6">
           <div class="project-pic"></div>
         </div>
       </div>
      <div class="row project-info">
        <div class="col-md-6">
          <h4>Bidding information</h4>
           <ul>
              <li>Status: <span class="green">OPEN</span></li>
              <li>No. of placed bids: <span class="bold">1000</span></li>
              <li>Average price: <span class="bold red">Ksh. 100,000</span></li>
              <li>Remaining time: <span class="bold">7:4:33</span></li>
            </ul>
          </div>
          <div class="row project-info">
            <div class="col-md-6">
              <h4>Client information</h4>
                <ul>
                    <li>Name: <span class="bold">Peter</span></th>
                    <li>previous projects: <span class="bold">10</span></th>
                    <li>Star rating: <span class="bold"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></th>
                    <li>view profile: <span class="bold"><a href="#">profile</a></span></th>
                </ul>
              </div>
              <div class="project-actions">
                <a class="btn btn-primary details-btn"><i class="fa  fa-list"></i> Details</a>
                <a class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Place bid</a>
             </div>
     </article>
   </div>
 <div class="col-md-6">
   <article>
     <h3>E-commerce website</h3>
     <div class="row">
       <div class="col-md-6">
         <h4>Desired features</h4>
         <div class="row">
           <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
           <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
         </div>
         <div class="row">
           <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
           <div class="col-xs-6"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
         </div>
       </div>
       <div class="col-md-6">
         <div class="project-pic"></div>
       </div>
     </div>
    <div class="row project-info">
      <div class="col-md-6">
        <h4>Bidding information</h4>
         <ul>
            <li>Status: <span class="green">OPEN</span></li>
            <li>No. of placed bids: <span class="bold">1000</span></li>
            <li>Average price: <span class="bold red">Ksh. 100,000</span></li>
            <li>Remaining time: <span class="bold">7:4:33</span></li>
          </ul>
        </div>
        <div class="row project-info">
          <div class="col-md-6">
            <h4>Client information</h4>
              <ul>
                  <li>Name: <span class="bold">Peter</span></th>
                  <li>previous projects: <span class="bold">10</span></th>
                  <li>Star rating: <span class="bold"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></th>
                  <li>view profile: <span class="bold"><a href="#">profile</a></span></th>
              </ul>
            </div>
            <div class="project-actions">
              <a class="btn btn-primary details-btn"><i class="fa  fa-list"></i> Details</a>
              <a class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Place bid</a>
           </div>
   </article>
 </div>
</div>
  <p class="view-more"><a href="#">View more</a></p>
 </div>`
</div><!--projects end here-->
</section>
</div>
</div>
@endsection
