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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="/provider-alerts">
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
                    <label for="price"><strong>Get an alert when a new project is posted?</strong></label>
                  </div>
                  <div class="col-md-6">
                    <input name="project-posted" type="radio" value="1" <?php if($userAlerts['alert1']){?>checked<?php }?>/> Yes <input name="project-posted" value="0" type="radio" <?php if(!$userAlerts['alert1']){?>checked<?php }?> /> No
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-6">
                    <label for="price"><strong>Get alerts for</strong></label>
                  </div>
                  <div class="col-md-6">
                    <input name="project-type" value="0" type="radio" <?php if(!$userAlerts['alert2'] || $userAlerts['alert2']==0){?>checked<?php }?> /> All projects <input name="project-type" value="1" type="radio" <?php if($userAlerts['alert2'] && $userAlerts['alert2']==1){?>checked<?php }?> /> Mobile apps
                    <input name="project-type" value="2" type="radio" <?php if($userAlerts['alert2'] && $userAlerts['alert2']==2){?>checked<?php }?> /> E-commerce projects <input name="project-type" value="3" type="radio" <?php if($userAlerts['alert2'] && $userAlerts['alert2']==3){?>checked<?php }?>/> Blogs
                    <input name="project-type" value="4" type="radio" <?php if($userAlerts['alert2'] && $userAlerts['alert2']==4){?>checked<?php }?> /> Websites
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-6">
                    <label for="price"><strong>Get an alert when a project I bidded is closes?</strong></label>
                  </div>
                  <div class="col-md-6">
                    <input name="project-closing" value="1" type="radio" <?php if($userAlerts['alert3']){?>checked<?php }?>/> Yes <input name="project-closing" value="0" type="radio" <?php if(!$userAlerts['alert3']){?>checked<?php }?> /> No
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-6">
                    <label for="price"><strong>Get an alert when my membership is about to expire?</strong></label>
                  </div>
                  <div class="col-md-6">
                    <input name="membership-expiry" value="1" type="radio" <?php if($userAlerts['alert4']){?>checked<?php }?> /> Yes <input name="membership-expiry" value="0" type="radio" <?php if(!$userAlerts['alert4']){?>checked<?php }?> /> No
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
