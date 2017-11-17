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
      <!-- Icon Cards-->
      <div class="projects-container">
        <div class="row">
          @foreach($user_projects as $project)
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-graduation-cap"></i>
                </div>
                <div class="mr-5">{{$project['title']}}</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        <!--<div class="col-xl-3 col-sm-6 mb-3">
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
        </div>-->
        @endforeach
      </div>
    </div>
      <div class="row">
        <div class="col-xl-12 col-sm-12 mb-12">
          <nav class="pull-right" aria-label="...">
              {{ $user_projects->links('vendor.pagination.bootstrap-4') }}
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
          <form method="post" action="/quick-new-project" />
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT" />
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bell-o"></i> Quick action / New project</div>
              <div class="list-group list-group-flush small">
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <input name="title" type="text" class="form-control" placeholder="Project title"/>
                      @if ($errors->has('title'))
                        <span class="red">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <select name="category" class="form-control">
                        <option selected disabled value="0">Project category</option>
                        <option value="1">Mobile App</option>
                        <option value="2">E-commerce</option>
                        <option value="3">Blog</option>
                        <option value="4">Website</option>
                      </select>
                      @if ($errors->has('category'))
                        <span class="red">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <input name="feature1" type="checkbox" value="1"  />&nbsp;Shopping cart&nbsp;</br>
                      <input name="feature2" type="checkbox" value="1" />&nbsp;Responsive&nbsp;</br>
                      <input name="feature3" type="checkbox" value="1" />&nbsp;Membership&nbsp;</br>
                      <input name="feature4" type="checkbox" value="1" />&nbsp;Notification&nbsp;</br>
                      <input name="feature5" type="checkbox" value="1" />&nbsp;Cloud hosting&nbsp;</br>
                      <input name="feature6" type="checkbox" value="1" />&nbsp;Admin panel&nbsp;</br>
                      <input name="feature7" type="checkbox" value="1" />&nbsp;Back-up&nbsp;</br>
                      <input name="feature8" type="checkbox" value="1" />&nbsp;Bulk sms&nbsp;
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <input name="start_date" id="start_date" type="text" class="form-control" placeholder="Start date"/>
                      @if ($errors->has('start_date'))
                        <span class="red">
                            <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <input name="end_date" id="end_date" type="text" class="form-control" placeholder="End date"/>
                      @if ($errors->has('end_date'))
                        <span class="red">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <textarea name="description" type="text" class="form-control" placeholder="Give a brief overview of the project goals"></textarea>
                      @if ($errors->has('description'))
                        <span class="red">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/not-required.png')}}" alt="">
                    <div class="media-body">
                      <input name="desired_price" type="text" class="form-control" placeholder="Ready to pay price"/>
                      @if ($errors->has('desired_price'))
                        <span class="red">
                            <strong>{{ $errors->first('desired_price') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">

                    <div class="media-body">
                      <label class="btn btn-default btn-file">
                        Caption: <input name="caption" type="file" style="display: auto;">
                        @if ($errors->has('caption'))
                          <span class="red">
                              <strong>{{ $errors->first('caption') }}</strong>
                          </span>
                        @endif
                    </label>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">

                    <div class="media-body">
                      <label class="btn btn-default btn-file">
                        Doc 1: <input name="feature9" type="file" style="display: auto;">
                        @if ($errors->has('feature9'))
                          <span class="red">
                              <strong>{{ $errors->first('feature9') }}</strong>
                          </span>
                        @endif
                    </label>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">

                    <div class="media-body">
                      <label class="btn btn-default btn-file">
                        Doc 2: <input name="feature10" type="file" style="display: auto;">
                        @if ($errors->has('feature10'))
                          <span class="red">
                              <strong>{{ $errors->first('feature10') }}</strong>
                          </span>
                        @endif
                    </label>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">

                    <div class="media-body">
                      <label class="btn btn-default btn-file">
                        Doc 3: <input name="feature11" type="file" style="display: auto;">
                        @if ($errors->has('feature11'))
                          <span class="red">
                              <strong>{{ $errors->first('feature11') }}</strong>
                          </span>
                        @endif
                    </label>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <div class="media-body">
                      <textarea name="message_to_bidders" type="text" class="form-control" placeholder="A message to bidders"></textarea>
                      @if ($errors->has('message_to_bidders'))
                        <span class="red">
                            <strong>{{ $errors->first('message_to_bidders') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </a>
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-send"></i> Post</button>
              </div>
            </div>
          </form>
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
                  <th>Title</th>
                  <th>Start date</th>
                  <th>End date</th>
                  <th>Status</th>
                  <th>Final price</th>
                  <th>Posted date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Start date</th>
                  <th>End date</th>
                  <th>Status</th>
                  <th>Final price</th>
                  <th>Posted date</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($user['project'] as $project)
                <tr>
                  <td>{{$project['title']}}</td>
                  <td>{{$project['start_date']}}</td>
                  <td>{{$project['end_date']}}</td>
                  @if($project['final_price']=='')
                  <td class="red">Open bid</td>
                  @else
                  <td class="green">Closed bid</td>
                  @endif
                  @if($project['final_price']=='')
                  <td>-</td>
                  @else
                  <td>{{$project['final_price']}}</td>
                  @endif
                  <td>{{$project['created_at']->format('M d Y')}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script>
    $( function() {
      $( "#start_date" ).datepicker();
      } );
      $( function() {
      $( "#end_date" ).datepicker();
    } );
    </script>
@endsection
