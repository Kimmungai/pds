@extends('layouts.admin')

@section('content')
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">WEB DESIGNERS CENTER ADMIN</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">My projects</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li class="active">
              <a href="/client-profile">All projects</a>
            </li>
            <li>
              <a href="/client-profile">Closed projects</a>
            </li>
            <li>
              <a href="/client-profile">Active Projects</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/client-subscription">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">My subscription</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-bell"></i>
            <span class="nav-link-text">Bidders</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1">
            <li>
              <a href="/client-bidders">All registered bidders</a>
            </li>
            <li>
              <a href="/client-bidders">My projects bidders</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/client-user-profile">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <li>
              <a href="/client-users">Clients</a>
            </li>
            <li>
              <a href="/client-users">Bidders</a>
            </li>
            <li>
              <a href="/client-users">Administrators</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Reports</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="/client-reports">Projects report</a>
            </li>
            <li>
              <a href="/client-reports">Users Report</a>
            </li>
            <li>
              <a href="/client-reports">Mailing list</a>
            </li>
            <li>
              <a href="/client-reports">Bulk sms list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Campaigns</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="/client-campaigns">Email campaign</a>
            </li>
            <li>
              <a href="/client-campaigns">SMS campaign</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Social media campaign</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="/client-campaigns">Facebook</a>
                </li>
                <li>
                  <a href="/client-campaigns">Twitter</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/client-chats">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Chat <span class="badge badge-pill badge-primary">12 New</span></span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Projects</li>
        <li class="breadcrumb-item active">All Projects</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-graduation-cap"></i>
              </div>
              <div class="mr-5">E-learning website</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw  fa-mobile-phone"></i>
              </div>
              <div class="mr-5">Mobile app</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">E-commerce</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Next</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-globe"></i>
              </div>
              <div class="mr-5">Website</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-sm-12 mb-12">
          <nav class="pull-right" aria-label="...">
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
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Bidding activity  - E-learning website</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Top bidders - E-learning website</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> Project details  - E-learning website</div>
          <hr class="mt-2">
          <div class="card-columns">
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="{{ asset('/img/project-pic.png') }}" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Project Title and category</a></h6>
                <label for="project-title"></label><b>Title</b></label><input type="text" class="form-control" name="project-title" value="E-commerce website" />
                <hr class="my-0">
                <div class="card-body py-2 small"></div>
                <hr class="my-0">
                <label for="project-title"></label><b>Start date</b></label><input type="text" class="form-control" name="project-title" value="12/12/2017" />
                <hr class="my-0">
                <div class="card-body py-2 small"></div>
                <label for="project-title"></label><b>End date</b></label><input type="text" class="form-control" name="project-title" value="12/12/2017" />
                <div class="card-body py-2 small"></div>
                <label for="project-category"></label><b>Caption</b></label>
                  <label class="btn btn-primary btn-file">
                    Browse (max 1mb) <input type="file" style="display: none;">
                  </label>
              </div>
              <hr class="my-0">
              <a class="btn btn-success form-control" href="#">Update</a>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="{{ asset('/img/tech-details.jpg') }}" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Project technical details</a></h6>
                <label for="project-title"></label><b>Description</b></label>
                <textarea rows="5" class="form-control" name="project-title">Do it using formal methods</textarea>
                <hr class="my-0">
                <div class="card-body py-2 small">

                </div>
                <hr class="my-0">
                <div class="card-body py-2 small"></div>
                <label for="project-category"></label><b>Technical Specification (PDF)</b></label>
                  <label class="btn btn-primary btn-file">
                    doc 1 (max 1mb) <input type="file" style="display: none;">
                  </label>
                  <hr class="my-0">
                  <div class="card-body py-2 small"></div>
                  <label for="project-category"></label><b>Technical Specification (PDF)</b></label>
                    <label class="btn btn-primary btn-file">
                      doc 2 (max 1mb) <input type="file" style="display: none;">
                    </label>
                    <hr class="my-0">
                    <div class="card-body py-2 small"></div>
                    <label for="project-category"></label><b>Technical Specification (PDF)</b></label>
                      <label class="btn btn-primary btn-file">
                        doc 3 (max 1mb) <input type="file" style="display: none;">
                      </label>
              </div>
              <hr class="my-0">
              <a class="btn btn-success form-control" href="#">Update</a>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="{{ asset('/img/mobile-app-category.PNG') }}" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Project category, features and sharing</a></h6>
                <label for="project-category"></label><b>Category</b></label>
                <select class="form-control" name="project-category">
                  <option selected disabled>Project category</option>
                  <option>Mobile App</option>
                  <option>E-commerce</option>
                  <option>Blog</option>
                  <option>Website</option>
                </select>
                <hr class="my-0">
                <div class="card-body py-2 small"></div>
                <hr class="my-0">
                <label for="project-category"></label><b>Userbility features</b></label>
                </br><input type="checkbox"  />&nbsp;Shopping cart&nbsp;</br>
                <input type="checkbox"  />&nbsp;Responsive&nbsp;</br>
                <input type="checkbox"  />&nbsp;Membership&nbsp;</br>
                <input type="checkbox"  />&nbsp;Notification&nbsp;</br>
                <div class="card-body py-2 small"></div>
                <label for="project-category"></label><b>Back-end features</b></label>
                </br><input type="checkbox"  />&nbsp;Cloud hosting&nbsp;</br>
                <input type="checkbox"  />&nbsp;Admin panel&nbsp;</br>
                <input type="checkbox"  />&nbsp;Back-up&nbsp;</br>
                <input type="checkbox"  />&nbsp;Bulk sms&nbsp;
                <div class="card-body py-2 small"></div>
                <label for="project-category"></label><b>Share this project</b></label>
                <a href="#" style="font-size:1.3em;"><i class="fa fa-facebook-square"></a></i> <a href="#" style="font-size:1.3em;"> <i class="fa fa-twitter-square"></i></a>
              </div>
              <hr class="my-0">
              <a class="btn btn-success form-control" href="#">Update</a>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Project cancellation</a></h6>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small"></div>
              <hr class="my-0">
              <a class="btn btn-danger form-control" href="#">Cancel Project</a>
            </div>
          </div>
          <!-- /Card Columns-->
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Project bidding overview</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Example Notifications Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i> Quick action / New project</div>
            <div class="list-group list-group-flush small">
              <a class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                  <div class="media-body">
                    <input type="text" class="form-control" placeholder="Project title"/>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                  <div class="media-body">
                    <select class="form-control">
                      <option selected disabled>Project category</option>
                      <option>Mobile App</option>
                      <option>E-commerce</option>
                      <option>Blog</option>
                      <option>Website</option>
                    </select>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                  <div class="media-body">
                    <input type="checkbox"  />&nbsp;Shopping cart&nbsp;</br>
                    <input type="checkbox"  />&nbsp;Responsive&nbsp;</br>
                    <input type="checkbox"  />&nbsp;Membership&nbsp;</br>
                    <input type="checkbox"  />&nbsp;Notification&nbsp;</br>
                    <input type="checkbox"  />&nbsp;Cloud hosting&nbsp;</br>
                    <input type="checkbox"  />&nbsp;Admin panel&nbsp;</br>
                    <input type="checkbox"  />&nbsp;Back-up&nbsp;</br>
                    <input type="checkbox"  />&nbsp;Bulk sms&nbsp;
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                  <div class="media-body">
                    <input type="text" class="form-control" placeholder="Start date"/>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                  <div class="media-body">
                    <input type="text" class="form-control" placeholder="End date"/>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                  <div class="media-body">
                    <textarea type="text" class="form-control" placeholder="Give a brief overview of the project goals"></textarea>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/not-required.png')}}" alt="">
                  <div class="media-body">
                    <input type="text" class="form-control" placeholder="Ready to pay price"/>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">

                  <div class="media-body">
                    <label class="btn btn-primary btn-file">
                      Caption (max 1mb) <input type="file" style="display: none;">
                  </label>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">

                  <div class="media-body">
                    <label class="btn btn-primary btn-file">
                      specification 1 (doc 1mb) <input type="file" style="display: none;">
                  </label>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">

                  <div class="media-body">
                    <label class="btn btn-primary btn-file">
                      specification 2 (doc 1mb) <input type="file" style="display: none;">
                  </label>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action">
                <div class="media">

                  <div class="media-body">
                    <label class="btn btn-primary btn-file">
                      specification 3 (doc 1mb) <input type="file" style="display: none;">
                  </label>
                  </div>
                </div>
              </a>
              <a class="btn btn-success btn-lg" href="#">Post</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Projects</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable"  cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>63</td>
                  <td>2011/07/25</td>
                  <td>$170,750</td>
                </tr>
                <tr>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>San Francisco</td>
                  <td>66</td>
                  <td>2009/01/12</td>
                  <td>$86,000</td>
                </tr>
                <tr>
                  <td>Cedric Kelly</td>
                  <td>Senior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>22</td>
                  <td>2012/03/29</td>
                  <td>$433,060</td>
                </tr>
                <tr>
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>33</td>
                  <td>2008/11/28</td>
                  <td>$162,700</td>
                </tr>
                <tr>
                  <td>Brielle Williamson</td>
                  <td>Integration Specialist</td>
                  <td>New York</td>
                  <td>61</td>
                  <td>2012/12/02</td>
                  <td>$372,000</td>
                </tr>
                <tr>
                  <td>Herrod Chandler</td>
                  <td>Sales Assistant</td>
                  <td>San Francisco</td>
                  <td>59</td>
                  <td>2012/08/06</td>
                  <td>$137,500</td>
                </tr>
                <tr>
                  <td>Rhona Davidson</td>
                  <td>Integration Specialist</td>
                  <td>Tokyo</td>
                  <td>55</td>
                  <td>2010/10/14</td>
                  <td>$327,900</td>
                </tr>
                <tr>
                  <td>Colleen Hurst</td>
                  <td>Javascript Developer</td>
                  <td>San Francisco</td>
                  <td>39</td>
                  <td>2009/09/15</td>
                  <td>$205,500</td>
                </tr>
                <tr>
                  <td>Sonya Frost</td>
                  <td>Software Engineer</td>
                  <td>Edinburgh</td>
                  <td>23</td>
                  <td>2008/12/13</td>
                  <td>$103,600</td>
                </tr>
                <tr>
                  <td>Jena Gaines</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>30</td>
                  <td>2008/12/19</td>
                  <td>$90,560</td>
                </tr>
                <tr>
                  <td>Quinn Flynn</td>
                  <td>Support Lead</td>
                  <td>Edinburgh</td>
                  <td>22</td>
                  <td>2013/03/03</td>
                  <td>$342,000</td>
                </tr>
                <tr>
                  <td>Charde Marshall</td>
                  <td>Regional Director</td>
                  <td>San Francisco</td>
                  <td>36</td>
                  <td>2008/10/16</td>
                  <td>$470,600</td>
                </tr>
                <tr>
                  <td>Haley Kennedy</td>
                  <td>Senior Marketing Designer</td>
                  <td>London</td>
                  <td>43</td>
                  <td>2012/12/18</td>
                  <td>$313,500</td>
                </tr>
                <tr>
                  <td>Tatyana Fitzpatrick</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>19</td>
                  <td>2010/03/17</td>
                  <td>$385,750</td>
                </tr>
                <tr>
                  <td>Michael Silva</td>
                  <td>Marketing Designer</td>
                  <td>London</td>
                  <td>66</td>
                  <td>2012/11/27</td>
                  <td>$198,500</td>
                </tr>
                <tr>
                  <td>Paul Byrd</td>
                  <td>Chief Financial Officer (CFO)</td>
                  <td>New York</td>
                  <td>64</td>
                  <td>2010/06/09</td>
                  <td>$725,000</td>
                </tr>
                <tr>
                  <td>Gloria Little</td>
                  <td>Systems Administrator</td>
                  <td>New York</td>
                  <td>59</td>
                  <td>2009/04/10</td>
                  <td>$237,500</td>
                </tr>
                <tr>
                  <td>Bradley Greer</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>41</td>
                  <td>2012/10/13</td>
                  <td>$132,000</td>
                </tr>
                <tr>
                  <td>Dai Rios</td>
                  <td>Personnel Lead</td>
                  <td>Edinburgh</td>
                  <td>35</td>
                  <td>2012/09/26</td>
                  <td>$217,500</td>
                </tr>
                <tr>
                  <td>Jenette Caldwell</td>
                  <td>Development Lead</td>
                  <td>New York</td>
                  <td>30</td>
                  <td>2011/09/03</td>
                  <td>$345,000</td>
                </tr>
                <tr>
                  <td>Yuri Berry</td>
                  <td>Chief Marketing Officer (CMO)</td>
                  <td>New York</td>
                  <td>40</td>
                  <td>2009/06/25</td>
                  <td>$675,000</td>
                </tr>
                <tr>
                  <td>Caesar Vance</td>
                  <td>Pre-Sales Support</td>
                  <td>New York</td>
                  <td>21</td>
                  <td>2011/12/12</td>
                  <td>$106,450</td>
                </tr>
                <tr>
                  <td>Doris Wilder</td>
                  <td>Sales Assistant</td>
                  <td>Sidney</td>
                  <td>23</td>
                  <td>2010/09/20</td>
                  <td>$85,600</td>
                </tr>
                <tr>
                  <td>Angelica Ramos</td>
                  <td>Chief Executive Officer (CEO)</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2009/10/09</td>
                  <td>$1,200,000</td>
                </tr>
                <tr>
                  <td>Gavin Joyce</td>
                  <td>Developer</td>
                  <td>Edinburgh</td>
                  <td>42</td>
                  <td>2010/12/22</td>
                  <td>$92,575</td>
                </tr>
                <tr>
                  <td>Jennifer Chang</td>
                  <td>Regional Director</td>
                  <td>Singapore</td>
                  <td>28</td>
                  <td>2010/11/14</td>
                  <td>$357,650</td>
                </tr>
                <tr>
                  <td>Brenden Wagner</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>28</td>
                  <td>2011/06/07</td>
                  <td>$206,850</td>
                </tr>
                <tr>
                  <td>Fiona Green</td>
                  <td>Chief Operating Officer (COO)</td>
                  <td>San Francisco</td>
                  <td>48</td>
                  <td>2010/03/11</td>
                  <td>$850,000</td>
                </tr>
                <tr>
                  <td>Shou Itou</td>
                  <td>Regional Marketing</td>
                  <td>Tokyo</td>
                  <td>20</td>
                  <td>2011/08/14</td>
                  <td>$163,000</td>
                </tr>
                <tr>
                  <td>Michelle House</td>
                  <td>Integration Specialist</td>
                  <td>Sidney</td>
                  <td>37</td>
                  <td>2011/06/02</td>
                  <td>$95,400</td>
                </tr>
                <tr>
                  <td>Suki Burks</td>
                  <td>Developer</td>
                  <td>London</td>
                  <td>53</td>
                  <td>2009/10/22</td>
                  <td>$114,500</td>
                </tr>
                <tr>
                  <td>Prescott Bartlett</td>
                  <td>Technical Author</td>
                  <td>London</td>
                  <td>27</td>
                  <td>2011/05/07</td>
                  <td>$145,000</td>
                </tr>
                <tr>
                  <td>Gavin Cortez</td>
                  <td>Team Leader</td>
                  <td>San Francisco</td>
                  <td>22</td>
                  <td>2008/10/26</td>
                  <td>$235,500</td>
                </tr>
                <tr>
                  <td>Martena Mccray</td>
                  <td>Post-Sales support</td>
                  <td>Edinburgh</td>
                  <td>46</td>
                  <td>2011/03/09</td>
                  <td>$324,050</td>
                </tr>
                <tr>
                  <td>Unity Butler</td>
                  <td>Marketing Designer</td>
                  <td>San Francisco</td>
                  <td>47</td>
                  <td>2009/12/09</td>
                  <td>$85,675</td>
                </tr>
                <tr>
                  <td>Howard Hatfield</td>
                  <td>Office Manager</td>
                  <td>San Francisco</td>
                  <td>51</td>
                  <td>2008/12/16</td>
                  <td>$164,500</td>
                </tr>
                <tr>
                  <td>Hope Fuentes</td>
                  <td>Secretary</td>
                  <td>San Francisco</td>
                  <td>41</td>
                  <td>2010/02/12</td>
                  <td>$109,850</td>
                </tr>
                <tr>
                  <td>Vivian Harrell</td>
                  <td>Financial Controller</td>
                  <td>San Francisco</td>
                  <td>62</td>
                  <td>2009/02/14</td>
                  <td>$452,500</td>
                </tr>
                <tr>
                  <td>Timothy Mooney</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>37</td>
                  <td>2008/12/11</td>
                  <td>$136,200</td>
                </tr>
                <tr>
                  <td>Jackson Bradshaw</td>
                  <td>Director</td>
                  <td>New York</td>
                  <td>65</td>
                  <td>2008/09/26</td>
                  <td>$645,750</td>
                </tr>
                <tr>
                  <td>Olivia Liang</td>
                  <td>Support Engineer</td>
                  <td>Singapore</td>
                  <td>64</td>
                  <td>2011/02/03</td>
                  <td>$234,500</td>
                </tr>
                <tr>
                  <td>Bruno Nash</td>
                  <td>Software Engineer</td>
                  <td>London</td>
                  <td>38</td>
                  <td>2011/05/03</td>
                  <td>$163,500</td>
                </tr>
                <tr>
                  <td>Sakura Yamamoto</td>
                  <td>Support Engineer</td>
                  <td>Tokyo</td>
                  <td>37</td>
                  <td>2009/08/19</td>
                  <td>$139,575</td>
                </tr>
                <tr>
                  <td>Thor Walton</td>
                  <td>Developer</td>
                  <td>New York</td>
                  <td>61</td>
                  <td>2013/08/11</td>
                  <td>$98,540</td>
                </tr>
                <tr>
                  <td>Finn Camacho</td>
                  <td>Support Engineer</td>
                  <td>San Francisco</td>
                  <td>47</td>
                  <td>2009/07/07</td>
                  <td>$87,500</td>
                </tr>
                <tr>
                  <td>Serge Baldwin</td>
                  <td>Data Coordinator</td>
                  <td>Singapore</td>
                  <td>64</td>
                  <td>2012/04/09</td>
                  <td>$138,575</td>
                </tr>
                <tr>
                  <td>Zenaida Frank</td>
                  <td>Software Engineer</td>
                  <td>New York</td>
                  <td>63</td>
                  <td>2010/01/04</td>
                  <td>$125,250</td>
                </tr>
                <tr>
                  <td>Zorita Serrano</td>
                  <td>Software Engineer</td>
                  <td>San Francisco</td>
                  <td>56</td>
                  <td>2012/06/01</td>
                  <td>$115,000</td>
                </tr>
                <tr>
                  <td>Jennifer Acosta</td>
                  <td>Junior Javascript Developer</td>
                  <td>Edinburgh</td>
                  <td>43</td>
                  <td>2013/02/01</td>
                  <td>$75,650</td>
                </tr>
                <tr>
                  <td>Cara Stevens</td>
                  <td>Sales Assistant</td>
                  <td>New York</td>
                  <td>46</td>
                  <td>2011/12/06</td>
                  <td>$145,600</td>
                </tr>
                <tr>
                  <td>Hermione Butler</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>47</td>
                  <td>2011/03/21</td>
                  <td>$356,250</td>
                </tr>
                <tr>
                  <td>Lael Greer</td>
                  <td>Systems Administrator</td>
                  <td>London</td>
                  <td>21</td>
                  <td>2009/02/27</td>
                  <td>$103,500</td>
                </tr>
                <tr>
                  <td>Jonas Alexander</td>
                  <td>Developer</td>
                  <td>San Francisco</td>
                  <td>30</td>
                  <td>2010/07/14</td>
                  <td>$86,500</td>
                </tr>
                <tr>
                  <td>Shad Decker</td>
                  <td>Regional Director</td>
                  <td>Edinburgh</td>
                  <td>51</td>
                  <td>2008/11/13</td>
                  <td>$183,000</td>
                </tr>
                <tr>
                  <td>Michael Bruce</td>
                  <td>Javascript Developer</td>
                  <td>Singapore</td>
                  <td>29</td>
                  <td>2011/06/27</td>
                  <td>$183,000</td>
                </tr>
                <tr>
                  <td>Donna Snider</td>
                  <td>Customer Support</td>
                  <td>New York</td>
                  <td>27</td>
                  <td>2011/01/25</td>
                  <td>$112,000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
@endsection
