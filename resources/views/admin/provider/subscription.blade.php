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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/profile">
            <i class="fa fa-fw fa-bell"></i>
            <span class="nav-link-text">Projects</span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/provider-membership">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Membership Plan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/provider-company">
            <i class="fa fa-fw fa-building"></i>
            <span class="nav-link-text">Company</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/provider-user-profile">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Contact person</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/provider-chats">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Chat <span class="badge badge-pill badge-primary">12 New</span></span>
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
        <li class="breadcrumb-item active">My Subscription</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cc-diners-club"></i>
              </div>
              <div class="mr-5"><big>Promotional</big></div>
            </div>
            <a class="card-footer text-white clearfix small z-1">
              <span class="float-left">Your current plan (FREE)</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-default o-hidden h-100">
            <div class="card-body" style="color:#000;">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar"></i>
              </div>
              <div class="mr-5"><big>Ksh. 10,000 /</big>Monthly</div><small>Bid in all projects</small>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left" style="color:#000;">Choose (BASIC)</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-default o-hidden h-100">
            <div class="card-body" style="color:#000;">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar"></i>
              </div>
              <div class="mr-5"><big>Ksh. 27,500</big> Quartely</div><small>Bid in all projects</small>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left" style="color:#000;">Choose (Silver)</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-default o-hidden h-100">
            <div class="card-body" style="color:#000;">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar"></i>
              </div>
              <div class="mr-5"><big>Ksh. 100, 000 /</big>Yearly</div><small>Bid in all projects</small>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left" style="color:#000;">Choose (Gold)</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-list"></i> Your subscription details</div>
        <div class="card-body">
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Subscription start date</label>
            <div class="col-10">
              <input class="form-control" type="text" value="{{$membership['start_date']}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Subscription end date</label>
            <div class="col-10">
              <input class="form-control" type="text" value="{{$membership['end_date']}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Subscription remaining time</label>
            <div class="col-10">
              <input class="form-control" type="text" value="{{\Carbon\Carbon::createFromTimeStamp(strtotime($membership['end_date']))->diffForHumans()}}" disabled>
            </div>
          </div>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-paypal"></i> Subscription renewal</div>
          <div class="card-body">
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Subscription Plan</label>
              <div class="col-10">
                <select class="form-control">
                  <option value="">Ksh. 20,000 / month</option>
                  <option value="">Ksh. 20,000 / month</option>
                  <option value="">Ksh. 20,000 / year</option>
                  <option value="">Ksh. 20,000 / 3 years</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Payment method</label>
              <div class="col-10">
                <select class="form-control">
                  <option value="1">Pay pal</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Email my receipt</label>
              <div class="col-10">
                <input name="receipt"  type="radio"> No &nbsp;<input name="receipt"  type="radio"> Yes
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label"></label>
              <div class="col-10">
                <button class="btn btn-success btn-lg"><i class="fa fa-dollar"></i> Proceed to payment <i class="fa  fa-angle-double-right"></i></button>
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>
    <!-- /.container-fluid-->
@endsection
