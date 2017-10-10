@extends('layouts.main')

@section('content')
  <section class="main-body">
    <h2>Latest projects</h2>
    <div class="strip"></div>
    <div class="container">
      <div class="row second-nav">
        <div class="col-md-8">
          <nav class="breadcrumb">
            <a class="breadcrumb-item active" href="#">All bids <span class="glyphicon glyphicon-list"></span></a>
            <a class="breadcrumb-item" href="#">Closed bids <span class="glyphicon glyphicon-folder-close"></span></a>
            <a class="breadcrumb-item" href="#">Open bids <span class="glyphicon glyphicon-folder-open"></span></a>
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
  <div class="container"><!--projects start here-->
   <div class="row project-area">
    <div class="col-md-6">
      <article>
        <h3>E-commerce website</h3>
        <div class="row">
          <div class="col-md-6">
            <h4>Desired features</h4>
            <div class="row">
              <div class="col-md-6"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
              <div class="col-md-6"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
            </div>
            <div class="row">
              <div class="col-md-6"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
              <div class="col-md-6"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="project-pic"></div>
          </div>
        </div>
       <h4>Bidding information</h4>
       <div class="row project-info">
         <div class="col-md-12">
           <table class="table table-bordered">
             <thead>
               <tr>
                 <th>Status</th>
                 <th>No. of placed bids</th>
                 <th>Average price</th>
                 <th>Remaining time</th>
               </tr>
             </thead>
             <tbody>
               <td><p class="green">OPEN</p></td>
               <td>10</td>
               <td>100,000</td>
               <td>7:14:32</td>
             </tbody>
           </table>
           <h4>Client information</h4>
           <div class="row project-info">
             <div class="col-md-12">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th>Name</th>
                     <th>previous projects</th>
                     <th>Star rating</th>
                     <th>view profile</th>
                   </tr>
                 </thead>
                 <tbody>
                   <td>Peter</td>
                   <td>10</td>
                   <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></td>
                   <td><a href="#">profile</a></td>
                 </tbody>
               </table>
               <div class="project-actions">
                 <a class="btn btn-primary details-btn"><i class="fa  fa-list"></i> Details</a>
                 <a class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Details</a>
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
             <div class="col-md-6"><div class="desired-feature"><i class="fa fa-desktop"></i> <i class="fa fa-tablet"></i> <i class="fa  fa-mobile"></i><p>Responsive</p></div></div>
             <div class="col-md-6"><div class="desired-feature"><i class="fa fa-users"></i><p>Membership</p></div></div>
           </div>
           <div class="row">
             <div class="col-md-6"><div class="desired-feature"><i class="fa fa-cloud-upload"></i><p>Cloud based</p></div></div>
             <div class="col-md-6"><div class="desired-feature"><i class="fa fa-cart-plus"></i><p>Check out</p></div></div>
           </div>
         </div>
         <div class="col-md-6">
           <div class="project-pic"></div>
         </div>
       </div>
      <h4>Bidding information</h4>
      <div class="row project-info">
        <div class="col-md-12">
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>Status</th>
                <th>No. of placed bids</th>
                <th>Average price</th>
                <th>Remaining time</th>
              </tr>
            </thead>
            <tbody>
              <td><p class="green">OPEN</p></td>
              <td>10</td>
              <td>100,000</td>
              <td>7:14:32</td>
            </tbody>
          </table>
          <h4>Client information</h4>
          <div class="row project-info">
            <div class="col-md-12">
              <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>previous projects</th>
                    <th>Star rating</th>
                    <th>view profile</th>
                  </tr>
                </thead>
                <tbody>
                  <td>Peter</td>
                  <td>10</td>
                  <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></td>
                  <td><a href="#">profile</a></td>
                </tbody>
              </table>
              <div class="project-actions">
                <a class="btn btn-primary details-btn"><i class="fa  fa-list"></i> Details</a>
                <a class="btn btn-primary bid-btn pull-right"><i class="fa  fa-bell-o"></i> Details</a>
             </div>
     </article>
   </div>
 </div>
  <p class="view-more"><a href="#">View more</a></p>
 </div>`
</div><!--projects end here-->
</section>
<section class="service-providers">
  <h2>Service providers</h2>
  <div class="strip"></div>
  <div class="container">
    <div class="row second-nav">
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
    <!---***********************-->
</section>
@endsection
