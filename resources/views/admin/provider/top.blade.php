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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
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
            @if(session('daily_bidding_limit'))
              <a class="btn btn-danger pull-right" href="/provider-membership"><span class="fa fa-star"></span> Upgrade membership plan</a>
            @endif
        </div>
      @endif
      <!-- Breadcrumbs-->
      <div class="row project-control-bar">
        <div class="col-md-5">
          <ul class="list-inline">
            <li class="list-inline-item"><a class="btn btn-success <?php if(!session('bid_filtering')){?>active<?php }?>" href="/provider-controls/?projects=0">All <i class="fa fa-list"></i></a></li>
            <li class="list-inline-item"><a class="btn btn-success <?php if(session('bid_filtering') && session('bid_filtering')==1){?>active<?php }?>" href="/provider-controls/?projects=1">Open <i class="fa  fa-folder-open"></i></a></li>
            <li class="list-inline-item"><a class="btn btn-success <?php if(session('bid_filtering') && session('bid_filtering')==2){?>active<?php }?>" href="/provider-controls/?projects=2">Closed <i class="fa fa-folder"></i></a></li>
            <li class="list-inline-item"><a class="btn btn-success <?php if(session('bid_filtering') && session('bid_filtering')==3){?>active<?php }?>" href="/provider-controls/?projects=3">My Bids <i class="fa fa-user"></i></a></li>
          </ul>
        </div>
        <div class="col-md-5">
          <label for="sort-projects"><i class="fa  fa-filter"></i> Filter</label>
            <ul class="list-inline">
              <form id="filter-form" action="/provider-controls" method="GET" />
                <input type="hidden" name="task" value="filter" />
                <li class="list-inline-item"><input type="radio" value="0" name="project-category" <?php if(!session('filter')){?>checked<?php }?> onclick="submit_form('filter-form')" /> Any</li>
                <li class="list-inline-item"><input type="radio" value="1" name="project-category" <?php if(session('filter') && session('filter')==1){?>checked<?php }?> onclick="submit_form('filter-form')" /> Mobile App</li>
                <li class="list-inline-item"><input type="radio" value="2" name="project-category" <?php if(session('filter') && session('filter')==2){?>checked<?php }?> onclick="submit_form('filter-form')"/> E-commerce</li>
                <li class="list-inline-item"><input type="radio" value="3" name="project-category" <?php if(session('filter') && session('filter')==3){?>checked<?php }?> onclick="submit_form('filter-form')"/> Blog</li>
                <li class="list-inline-item"><input type="radio" value="4" name="project-category" <?php if(session('filter') && session('filter')==4){?>checked<?php }?> onclick="submit_form('filter-form')"/> Website</li>
              </form>
            </ul>
        </div>
        <div class="col-md-2">
          <label for="sort-projects"><i class="fa fa-sort-amount-asc"></i> Sort</lable>
            <form id="sort-form" action="/provider-controls" method="GET" />
              <input type="hidden" name="task" value="sort" />
              <select class="form-control" name="sort-projects" onchange="submit_form('sort-form')">
                  <option value="1">Newest - Oldest</option>
                  <option value="2" <?php if(session('sort') && session('sort')=='asc'){?>selected<?php }?>>Oldest - Newest</option>
              </select>
            </form>
        </div>
      </div>
      <div class="row projects-view">
        <?php $count=0;?>
        @if(!count($all_projects))
        <h3>No projects found</h3>
        @endif
        @foreach($all_projects as $project)
        <div class="col-md-6">
          <article>
            <h3>{{$project['title']}}</h3>
            <div class="container">
              <div class="row">
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Front-end</b></li>
                    @if($all_projects_types[$count]['feature1'] && $all_projects_types[$count]['feature1']!='')
                    <li class="list-group-item">Check out <small><i class="fa fa-cart-plus"></i></small></li>
                    @endif
                    @if($all_projects_types[$count]['feature2'] && $all_projects_types[$count]['feature1']!='')
                    <li class="list-group-item">Responsive <small><i class="fa fa-desktop"></i><i class="fa fa-tablet"></i> <i class="fa fa-mobile-phone"></i></small></li>
                    @endif
                    @if($all_projects_types[$count]['feature3'] && $all_projects_types[$count]['feature1']!='')
                    <li class="list-group-item">Membership <small><i class="fa fa-users"></i></small></li>
                    @endif
                    @if($all_projects_types[$count]['feature4'] && $all_projects_types[$count]['feature1']!='')
                    <li class="list-group-item">Notifications <small><i class="fa fa-envelope"></i></small></li>
                    @endif
                  </ul>
                </div>
                <div class="col-md-4 nopadding">
                  <h5>Requirements</h5>
                  @if($project['caption']=='')
                    @if(!$all_projects_types[$count]['category'])
                      <div class="project-icon"><img class="img-responsive" src="{{asset('/avatar/mobile.jpg')}}" alt="None"></div>
                    @elseif($all_projects_types[$count]['category']==1)
                      <div class="project-icon"><img class="img-responsive" src="{{asset('/avatar/mobile.jpg')}}" alt="Mobile App Project"></div>
                    @elseif($all_projects_types[$count]['category']==2)
                      <div class="project-icon"><img class="img-responsive" src="{{asset('/avatar/e-commerce.jpg')}}" alt="E-commerce Project"></div>
                    @elseif($all_projects_types[$count]['category']==3)
                      <div class="project-icon"><img class="img-responsive" src="{{asset('/avatar/blog.jpg')}}" alt="Blog Project"></div>
                    @elseif($all_projects_types[$count]['category']==4)
                      <div class="project-icon"><img  src="{{asset('/avatar/website.jpg')}}" alt="Website Project"></div>
                    @endif
                  @else
                    <div class="project-icon"><img  src="{{ url($project['caption']) }}" alt="{{$project['title']}}"></div>
                  @endif
                  @if($project['final_price']=='')
                  <h5>OPEN</h5>
                  <p><strong>For: {{\Carbon\Carbon::createFromTimeStamp(strtotime($project['valid_period']))->diffForHumans(null,true)}}</strong></p>
                  @else
                  <h5 class="red">ClOSED</h5>
                  <p><strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime($project['updated_at']))->diffForHumans()}}</strong></p>
                  @endif
                </div>
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Back-end</b></li>
                    @if($all_projects_types[$count]['feature5'] && $all_projects_types[$count]['feature5']!='')
                    <li class="list-group-item">Cloud hosted <small><i class="fa fa-cloud-upload"></i></small></li>
                    @endif
                    @if($all_projects_types[$count]['feature6'] && $all_projects_types[$count]['feature6']!='')
                    <li class="list-group-item">Admin panel <small><i class="fa fa-dashboard"></i></small></li>
                    @endif
                    @if($all_projects_types[$count]['feature7'] && $all_projects_types[$count]['feature7']!='')
                    <li class="list-group-item">Back up <small><i class="fa fa-hdd-o"></i></small></li>
                    @endif
                    @if($all_projects_types[$count]['feature8'] && $all_projects_types[$count]['feature8']!='')
                    <li class="list-group-item">Bulk sms <small><i class="fa fa-envelope-open"></i></small></li>
                    @endif
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  @if($project['avg_price']=='')
                  <h4><strong class="gold">No bids yet</strong></h4>
                  @else
                  <h4>Avg price <strong class="gold">$ {{number_format($project['avg_price'],2)}}</strong></h4>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header" onclick="display_effect('schedule-preferences{{$project['id']}}')"><b>Schedule & User preference</b></li>
                    <div class="no-display" id="schedule-preferences{{$project['id']}}">
                      <li class="list-group-item">Start on: <strong>{{$project['start_date']}}</strong></li>
                      <li class="list-group-item">Finish by: <strong>{{$project['end_date']}}</strong></li>
                      @if($project['desired_price']=='')
                      <li class="list-group-item">Target: <strong>-</strong></li>
                      @else
                      <li class="list-group-item">Target: <strong>$ {{number_format($project['desired_price'])}}</strong></li>
                      @endif
                      <li class="list-group-item">User: <strong>{{$project['user']['first_name']}}</strong> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                    </div>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"  onclick="display_effect('discription-tech{{$project['id']}}')"><b>Description & technical specs</b></li>
                    <div class="no-display" id="discription-tech{{$project['id']}}">
                      <li class="list-group-item">Description: {{$project['description']}}</li>
                      @if($all_projects_types[$count]['feature9']!='')
                      <li class="list-group-item">Doc 1: <a href="{{url($all_projects_types[$count]['feature9'])}}" class="black"><big><i class="fa fa-file-pdf-o"></i></big> download</a></li>
                      @endif
                      @if($all_projects_types[$count]['feature10']!='')
                      <li class="list-group-item">Doc 2: <a href="{{url($all_projects_types[$count]['feature10'])}}" class="black"><big><i class="fa fa-file-pdf-o"></i></big> download</a></li>
                      @endif
                      @if($all_projects_types[$count]['feature11']!='')
                      <li class="list-group-item">Doc 3: <a href="{{url($all_projects_types[$count]['feature11'])}}" class="black"><big><i class="fa fa-file-pdf-o"></i></big> download</a></li>
                      @endif
                    </div>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  @if($project['message_to_bidders']!='')
                  <h6>Client message: <strong class="green">{{$project['message_to_bidders']}}</strong></h6>
                  @else
                  <h6>Client message: <strong class="green">-</strong></h6>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <form action="/place-bid" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="project_id" value="{{$project['id']}}" />
                    <h5>Your offer</h5>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="price"><strong>Amount</strong></label>
                      </div>
                      <div class="col-md-8">
                        <input name="price" type="number" class="form-control" required/>
                        @if ($errors->has('price'))
                          <span class="red">
                              <strong>{{ $errors->first('price') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="message"><strong>Message</strong></label>
                      </div>
                      <div class="col-md-8">
                        <textarea  name="message" class="form-control"></textarea>
                        @if ($errors->has('message'))
                          <span class="red">
                              <strong>{{ $errors->first('message') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        @if($project['final_price']=='')
                          @if(session('daily_bidding_limit'))
                            <button class="btn btn-success bid-btn pull-right" disabled><i class="fa fa-bell-slash"></i> Bid (daily limit exhausted)</button>
                          @else
                            <button class="btn btn-success pull-right" type="submit"><i class="fa fa-bell"></i> Bid</button>
                          @endif
                        @else
                        <button class="btn btn-success pull-right" disabled><i class="fa fa-bell-slash"></i> Bid</button>
                        @endif
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
        <?php $count++;?>
        @endforeach
      </div>
      <nav aria-label="Page navigation" class="pull-right">
        {{ $all_projects->links('vendor.pagination.bootstrap-4') }}
      </nav>
    </div>
    <!-- /.container-fluid-->
@endsection
