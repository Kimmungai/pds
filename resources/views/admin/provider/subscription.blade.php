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
          <a id="toggle-chat"  class="nav-link" href="#" onclick="load_contacts()">
            <i class="fa fa-fw fa-comment"></i>
            <span class="nav-link-text">Chat <span class="badge badge-pill badge-primary" id="notify-new_messages"></span></span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/provider-alerts">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Email alerts</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
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
