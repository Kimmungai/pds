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
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">My Projects</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/client-user-profile">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a id="toggle-chat"  class="nav-link" href="#" onclick="load_contacts()">
            <i class="fa fa-fw fa-comment"></i>
            <span class="nav-link-text">Chat <span class="badge badge-pill badge-primary" id="notify-new_messages"></span></span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/client-alerts">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Email alerts</span>
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
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      @if (Session::has('update_success'))
        <div class="alert alert-success">
            {{ Session::get('update_success') }}
        </div>
      @endif
      @if (Session::has('update_error'))
        <div class="alert alert-danger">
            {{ Session::get('update_error') }}
        </div>
      @endif
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Alerts</li>
      </ol>
      <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-envelope"></i> Choose Alerts</div>
            <div class="card-body alert-section">
              <form action="/alerts" method="POST">
                {{csrf_field()}}
                <div class="row">
                  <div class="col-md-6">
                    <label for="price"><strong>Get an alert when someone bids on my project?</strong></label>
                  </div>
                  <div class="col-md-6">
                    <input name="project-bidded" type="radio" value="1" <?php if($userAlerts['alert5']){?>checked<?php }?>/> Yes <input name="project-bidded" value="0" type="radio" <?php if(!$userAlerts['alert5']){?>checked<?php }?> /> No
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-6">
                    <label for="price"><strong>Get an alert when someone places a bid less than my desired price?</strong></label>
                  </div>
                  <div class="col-md-6">
                    <input name="project-desired-price" type="radio" value="1" <?php if($userAlerts['alert6']){?>checked<?php }?>/> Yes <input name="project-desired-price" value="0" type="radio" <?php if(!$userAlerts['alert6']){?>checked<?php }?> /> No
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-6">
                    <label for="price"><strong>Get an alert when bidding period expires?</strong></label>
                  </div>
                  <div class="col-md-6">
                    <input name="project-bidding-closing" value="1" type="radio" <?php if($userAlerts['alert7']){?>checked<?php }?>/> Yes <input name="project-bidding-closing" value="0" type="radio" <?php if(!$userAlerts['alert7']){?>checked<?php }?> /> No
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-3 offset-md-6">
                    <button class="btn btn-success" type="submit">Set</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Example DataTables Card-->
    </div>
    <!-- /.container-fluid-->
@endsection
