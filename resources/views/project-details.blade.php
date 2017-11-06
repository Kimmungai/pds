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
      <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
      <div class="container project-details-controls">
        <div class="row">
          <div class="col-md-4">
            <nav class="breadcrumb white-bg">
              <a class="btn btn-default" href="/">Top</a>
              <a class="btn btn-default" href="#">Project list <span class="glyphicon glyphicon-list"></span></a>
              <a class="btn btn-default active" href="#">Project details <span class="glyphicon glyphicon-folder-open"></span></a>
            </nav>
         </div>
         <div class="col-md-8">
           <div class="row bidders-nav pull-right">
             <div class="col-xs-12">
               <nav aria-label="...">
                 <ul class="pagination">
                   <li class="page-item disabled">
                     <span class="page-link">Previous</span>
                   </li>
                   <li class="page-item"><a class="page-link" href="#">1</a></li>
                   <li class="page-item active green-bg">
                     <span class="page-link">
                       2
                       <span class="sr-only">(current)</span>
                     </span>
                   </li>
                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                   <li class="page-item">
                     <a class="page-link" href="#">Next</a>
                   </li>
                 </ul>
               </nav>
             </div>
           </div>
         </div>
       </div>
    </div>
      <div class="container section-decoration">
        <div class="row">
          <h2>E-learning project</h2>
          <div class="strip"></div>
        </div>
        <div class="row project-details-panel">
          <div class="col-md-4">
            <h4>project type</h4>
            <div class="project-pic"></div>
          </div>
          <div class="col-md-4">
            <h4>Desired features</h4>
            <div class="row">
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
            </div>
            <div class="row">
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
              <div class="col-xs-4"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
            </div>
          </div>
          <div class="col-md-4">
            <h4>Bidding information</h4>
             <ul class="list-group">
                <li class="list-group-item">Status: <span class="green">OPEN</span></li>
                <li class="list-group-item">No. of placed bids: <span class="bold">1000</span></li>
                <li class="list-group-item">Average price: <span class="bold red">Ksh. 100,000</span></li>
                <li class="list-group-item">Remaining time: <span class="bold">7:4:33</span></li>
              </ul>
          </div>
        </div>
        <div class="row project-details-panel">
          <div class="col-md-4">
            <h4>Schedule</h4>
            <div class="row">
              <div class="col-xs-5"><div class="desired-feature"><i class="fa fa-calendar-check-o"></i><p class="green">12/12/2017</p></div></div>
              <div class="col-xs-2 schedule-line"></div>
              <div class="col-xs-5 pull-right"><div class="desired-feature"><i class="fa fa-calendar-check-o"></i><p class="green">12/12/2017</p></div></div>
            </div>
            <div class="row">
              <div class="col-xs-4"><div class="date-holder"><p>Start</p></diV></div>
              <div class="col-xs-4 pull-right"><div class="date-holder"><p>Finish</p></div></div>
            </div>
          </div>
          <div class="col-md-4">
            <h4>Technical specifications</h4>
            <div class="row">
              <div class="col-xs-4"><div class="tech-specification-holder"><i class="fa fa-file-pdf-o"></i><p class="text-muted">system analysis and design</p></div></div>
              <div class="col-xs-4"><div class="tech-specification-holder"><i class="fa fa-file-zip-o "></i><p class="text-muted">User interface design</p></div></div>
              <div class="col-xs-4"><div class="tech-specification-holder"><i class="fa fa-file-word-o"></i><p class="text-muted">Requirements specifications</p></div></div>
            </div>
            <div class="row">
              <div class="col-xs-4"><a href="/project-details/1" class="btn btn-primary details-btn"><i class="fa  fa-download"></i> Details</a></div>
              <div class="col-xs-4"><a href="/project-details/1" class="btn btn-primary details-btn"><i class="fa  fa-download"></i> Details</a></div>
              <div class="col-xs-4"><a href="/project-details/1" class="btn btn-primary details-btn"><i class="fa  fa-download"></i> Details</a></div>
            </div>
          </div>
          <div class="col-md-4">
            <h4>Client information</h4>
              <ul class="list-group">
                  <li class="list-group-item">Name: <span class="bold">Peter</span></th>
                  <li class="list-group-item">previous projects: <span class="bold">10</span></th>
                  <li class="list-group-item">Star rating: <span class="bold"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></th>
                  <li class="list-group-item">view profile: <span class="bold"><a href="#" class="green">profile</a></span></th>
              </ul>
          </div>
        </div>
      </div>
      </div>
    </section>
  </div>
</div>
<section class="enquire">
  <div class="container"><div class="row"><h2></h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-6">
        <article>
          <h5 class="green">Your offer</h5>
          <div class="row">
            <div class="col-md-2">
              <label for="name">Amount</label>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control"  />
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
              <a href="/project-details/1" class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Place bid</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
<section class="enquire">
  <div class="container"><div class="row"><h2>Bidding companies</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-xs-12">
        <div class="table-responsive bidders-table">
          <table class="table table-hover table-condensed">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">date</th>
                <th scope="col">Company</th>
                <th scope="col">contact</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>12/12/2013</td>
                <td>wajui enterprises</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <p class="view-more"><a href="#">View more</a></p>
  </div>
</section>
<!--footer nav starts here-->
<div class="container">
  <div class="row">
    <section class="main-body">
      <div class="container project-details-controls-footer">
        <div class="row">
          <div class="col-md-4">
            <nav class="breadcrumb grey-bg">
              <a class="btn btn-default" href="/">Top</a>
              <a class="btn btn-default" href="#">Project list <span class="glyphicon glyphicon-list"></span></a>
              <a class="btn btn-default active" href="#">Project details <span class="glyphicon glyphicon-folder-open"></span></a>
            </nav>
         </div>
         <div class="col-md-8">
           <div class="row bidders-nav pull-right">
             <div class="col-xs-12">
               <nav aria-label="...">
                 <ul class="pagination">
                   <li class="page-item disabled">
                     <span class="page-link">Previous</span>
                   </li>
                   <li class="page-item"><a class="page-link" href="#">1</a></li>
                   <li class="page-item active">
                     <span class="page-link">
                       2
                       <span class="sr-only">(current)</span>
                     </span>
                   </li>
                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                   <li class="page-item">
                     <a class="page-link" href="#">Next</a>
                   </li>
                 </ul>
               </nav>
             </div>
           </div>
         </div>
       </div>
    </div>

      </div>
    </section>
  </div>
</div>
<!--footer nav ends here-->
@endsection
