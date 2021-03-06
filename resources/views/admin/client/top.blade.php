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
          <a id="toggle-chat"  class="nav-link" href="#" onclick="load_contacts()">
            <i class="fa fa-fw fa-comment"></i>
            <span class="nav-link-text">Chat <span class="badge badge-pill badge-primary" id="notify-new_messages"></span></span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
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
          @if(!count($user_projects))
          <h3>No projects posted yet! <a class="btn btn-primary" href="/new-project">Click here to create a new project.</a></h3>
          @endif
          @foreach($user_projects as $project)
          <div class="col-xl-3 col-sm-6 mb-3">
            <div id="{{$project['id']}}" class="current-projects card text-white bg-success o-hidden h-100" onclick="dynamic_project_details(this.id)">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-globe"></i>
                </div>
                <div class="mr-5">{{$project['title']}}</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                @if($project['final_price']!='')
                <span class="badge badge-danger pull-right">CLOSED</span>
                @endif
              </a>
            </div>
          </div>
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
        <div class="card-header" onclick="display_effect('myAreaChart')">
          <i class="fa fa-area-chart"></i> Bidding activity  - <span class="project-title"></span></div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header" onclick="display_effect('bar-chart')">
              <i class="fa fa-bar-chart"></i> Top bidders - <span class="project-title"></span></div>
            <div id="bar-chart" class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div id="cheapest-offer" class="h4 mb-0 text-primary"></div>
                  <div class="small text-muted">Cheapest offer</div>
                  <hr>
                  <div id="expensive-offer" class="h4 mb-0 text-warning"></div>
                  <div class="small text-muted">Most expensive offer</div>
                  <hr>
                  <div id="average-offer" class="h4 mb-0 text-success"></div>
                  <div class="small text-muted">Average offer</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> <span class="project-title"></span> details</div>
          <hr class="mt-2">
          <div class="card-columns">
            <!-- Example Social Card-->
            <div class="card mb-3">
              <div class="project-heading card-body" onclick="display_effect('project-title-schedule')">
                 <h6 class="card-title mb-1">Project title & schedule</h6>
                </div>
                <hr class="my-0">
                <form action="/project-title-schedule-update" method="post" />
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT" />
                  <div id="project-title-schedule" class="no-display">
                    <div  class="card-body">
                    <label for="project-title"></label><b>Title</b></label><input type="text" class="form-control" id="project-title" name="project-title" value="" required/>
                    @if ($errors->has('project-title'))
                      <span class="red">
                          <strong>{{ $errors->first('project-title') }}</strong>
                      </span>
                    @endif
                    <hr class="my-0">
                    <div class="card-body py-2 small"></div>
                    <hr class="my-0">
                    <label for="project-title"></label><b>Start date</b></label><input type="text" class="form-control" id="project-start-date" name="project-start-date" value="" required/>
                    @if ($errors->has('project-start-date'))
                      <span class="red">
                          <strong>{{ $errors->first('project-start-date') }}</strong>
                      </span>
                    @endif
                    <hr class="my-0">
                    <div class="card-body py-2 small"></div>
                    <label for="project-title"></label><b>End date</b></label><input type="text" class="form-control" id="project-end-date" name="project-end-date" value="" required/>
                    @if ($errors->has('project-end-date'))
                      <span class="red">
                          <strong>{{ $errors->first('project-end-date') }}</strong>
                      </span>
                    @endif
                  </div>
                  <hr class="my-0">
                  <button class="btn btn-success form-control" type="submit">Update</button>
                </div>
              </form>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <div class="card-body project-heading" onclick="display_effect('project-technical-details')">
                <h6 class="card-title mb-1">Project technical details</h6>
              </div>
              <hr class="my-0">
              <form action="/project-tech-features-update" method="post" enctype="multipart/form-data"/>
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT" />
                <div id="project-technical-details" class="no-display">
                  <div class="card-body">
                    <label for="project-title"></label><b>Description</b></label>
                    <textarea rows="5" class="form-control" id="project-description" name="project-description">Do it using formal methods</textarea>
                    @if ($errors->has('project-description'))
                      <span class="red">
                          <strong>{{ $errors->first('project-description') }}</strong>
                      </span>
                    @endif
                    <hr class="my-0">
                    <div class="card-body py-2 small">

                    </div>
                    <hr class="my-0">
                    <div class="card-body py-2 small"></div>
                    <label for="project-category"></label><b id="feature9">Technical Specification doc 1</b></label>
                         <input name="project_doc_1" class="form-control" type="file" style="height: auto;">
                      <hr class="my-0">
                      <div class="card-body py-2 small"></div>
                      <label for="project-category"></label><b id="feature10">Technical Specification doc 2</b></label>
                        <input name="project_doc_2" class="form-control" type="file" style="height: auto;">
                        <div class="card-body py-2 small"></div>
                        <label for="project-category"></label><b id="feature11">Technical Specification doc 3</b></label>
                        <input name="project_doc_3" class="form-control" type="file" style="height: auto;">
                  </div>
                  <hr class="my-0">
                  <button class="btn btn-success form-control" type="submit">Update</button>
                </div>
              </form>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <div class="card-body project-heading" onclick="display_effect('project-features')">
                <h6 class="card-title mb-1">Project features</h6>
              </div>
              <hr class="my-0">
              <div id="project-features" class="no-display">
                <form action="/project-features-update" method="post" />
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT" />
                  <div class="card-body">
                    <label for="project-category"></label><b>Category</b></label>
                    <select class="form-control" id="project-category" name="project-category">
                      <option selected disabled value="0">Project category</option>
                      <option value="1">Mobile App</option>
                      <option value="2">E-commerce</option>
                      <option value="3">Blog</option>
                      <option value="4">Website</option>
                    </select>
                    <hr class="my-0">
                    <div class="card-body py-2 small"></div>
                    <hr class="my-0">
                    <label for="project-category"></label><b>Userbility features</b></label>
                  </br><input type="checkbox" id="feature1" name="feature1" value="1"  />&nbsp;Shopping cart&nbsp;</br>
                    <input type="checkbox" id="feature2" name="feature2"  value="1"/>&nbsp;Responsive&nbsp;</br>
                    <input type="checkbox" id="feature3" name="feature3" value="1" />&nbsp;Membership&nbsp;</br>
                    <input type="checkbox" id="feature4" name="feature4" value="1" />&nbsp;Notification&nbsp;</br>
                    <div class="card-body py-2 small"></div>
                    <label for="project-category"></label><b>Back-end features</b></label>
                  </br><input type="checkbox" id="feature5" name="feature5" value="1" />&nbsp;Cloud hosting&nbsp;</br>
                    <input type="checkbox" id="feature6" name="feature6" value="1" />&nbsp;Admin panel&nbsp;</br>
                    <input type="checkbox" id="feature7" name="feature7" value="1" />&nbsp;Back-up&nbsp;</br>
                    <input type="checkbox" id="feature8" name="feature8" value="1" />&nbsp;Bulk sms&nbsp;
                    <div class="card-body py-2 small"></div>

                  </div>
                <hr class="my-0">
                <button class="btn btn-success form-control" type="submit">Update</button>
                </form>
              </div>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <div class="card-body project-heading" onclick="display_effect('project-sharing')">
                <h6 class="card-title mb-1">Project Sharing</h6>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small"></div>
              <div id="project-sharing" class="card-body no-display">
              <label for="project-title"><b>Share on social networks</b></label><br />
              <div class="addthis_inline_share_toolbox"></div>
              <a id="facebook"  target="_blank" style="font-size:1.3em;"> <i class="fa fa-facebook-square"></i></a>&nbsp;&nbsp;
              <a id="twitter"  target="_blank" style="font-size:1.3em;"> <i class="fa fa-twitter-square"></i></a>&nbsp;&nbsp;
              <a id="google"  target="_blank" style="font-size:1.3em;"> <i class="fa fa-google-plus-square"></i></a>&nbsp;&nbsp;
              <a id="linkedin"  target="_blank" style="font-size:1.3em;"> <i class="fa fa-linkedin-square"></i></a>&nbsp;&nbsp;
             </div>
              <hr class="my-0">
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-1">Project cancellation</h6>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small"></div>
              <hr class="my-0">
              <button class="btn btn-danger form-control" data-toggle="modal" data-target="#projectDelete">Cancel Project</button>
            </div>
          </div>
          <!-- /Card Columns-->
        </div>
        <div class="col-lg-4">
          <!-- Caption-->
          <form action="/project-caption-update" method="post" enctype="multipart/form-data"/>
          {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT" />
            <div class="card mb-3">
              <div class="card-header" onclick="display_effect('project-caption')">
                <i class="fa fa-image"></i> <span class="project-title"></span> Caption</div>
              <div id="project-caption">
                <div  class="card-body">
                  <div id="project-avatar" class="project-caption">
                  </div>
                  <input name="project_caption" type="file" class="form-control" style="height:auto;">
                </div>
               <button class="btn btn-success form-control" type="submit">Update</button>
             </div>
            </div>
          </form>
            <!-- End Caption-->
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div id="quick-form-sec" class="card-header" onclick="display_effect('pie-chart')">
              <i class="fa fa-pie-chart"></i> <span class="project-title"></span> bidding companies composition</div>
            <div id="pie-chart" class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Example Notifications Card-->
          <form method="post" action="/quick-new-project" enctype="multipart/form-data" />
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT" />
            <div class="card mb-3">
              <div class="card-header" onclick="display_effect('quick-form')">
                <i class="fa fa-bell-o"></i> Quick action / New project</div>
              <div id="quick-form" class="list-group list-group-flush small <?php if(!old('title')){?>no-display<?php }?>">
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <input name="title" type="text" class="form-control" placeholder="Project title" value="{{old('title')}}" required/>
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
                      <select name="category" class="form-control" required>
                        <option selected disabled value="0">Project category</option>
                        <option value="1" <?php if(old('category')==1){?>selected<?php }?>>Mobile App</option>
                        <option value="2" <?php if(old('category')==2){?>selected<?php }?>>E-commerce</option>
                        <option value="3" <?php if(old('category')==3){?>selected<?php }?>>Blog</option>
                        <option value="4" <?php if(old('category')==4){?>selected<?php }?>>Website</option>
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
                      <input name="feature1" type="checkbox" value="1"  <?php if(old('feature1')==1){?>checked<?php }?> />&nbsp;Shopping cart&nbsp;</br>
                      <input name="feature2" type="checkbox" value="1" <?php if(old('feature2')==1){?>checked<?php }?> />&nbsp;Responsive&nbsp;</br>
                      <input name="feature3" type="checkbox" value="1" <?php if(old('feature3')==1){?>checked<?php }?> />&nbsp;Membership&nbsp;</br>
                      <input name="feature4" type="checkbox" value="1"  <?php if(old('feature4')==1){?>checked<?php }?> />&nbsp;Notification&nbsp;</br>
                      <input name="feature5" type="checkbox" value="1" <?php if(old('feature5')==1){?>checked<?php }?> />&nbsp;Cloud hosting&nbsp;</br>
                      <input name="feature6" type="checkbox" value="1" <?php if(old('feature6')==1){?>checked<?php }?> />&nbsp;Admin panel&nbsp;</br>
                      <input name="feature7" type="checkbox" value="1" <?php if(old('feature7')==1){?>checked<?php }?> />&nbsp;Back-up&nbsp;</br>
                      <input name="feature8" type="checkbox" value="1" <?php if(old('feature8')==1){?>checked<?php }?> />&nbsp;Bulk sms&nbsp;
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action">
                  <div class="media">
                    <img class="d-flex mr-3 rounded-circle" src="{{asset('/img/required.png')}}" alt="">
                    <div class="media-body">
                      <input name="start_date" id="start_date" type="text" class="form-control" placeholder="Start date"  value="{{old('start_date')}}" required/>
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
                      <input name="end_date" id="end_date" type="text" class="form-control" placeholder="End date" value="{{old('end_date')}}" required/>
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
                      <textarea name="description" type="text" class="form-control" placeholder="Give a brief overview of the project goals" required>{{old('description')}}</textarea>
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
                      <input name="desired_price" type="number" class="form-control" placeholder="Ready to pay price"/>
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
                        Caption: <input name="caption" type="file" style="display: auto;" accept="image/*">
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
                        Doc 1: <input name="feature9" type="file" style="display: auto;" accept=".pdf*">
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
                        Doc 2: <input name="feature10" type="file" style="display: auto;" accept=".pdf*">
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
                        Doc 3: <input name="feature11" type="file" style="display: auto;" accept=".pdf*">
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
                <p style="padding:1em;">By clicking "post" you accept all <a href="{{asset('/agreement/project-posting.pdf')}}" target="_blank">terms and conditions</a></p>
               <button type="submit" class="btn btn-success btn-lg pull-right"><i class="fa fa-send"></i> Post</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header" onclick="display_effect('all-projects')">
          <i class="fa fa-table"></i> All Bids for <span class="project-title"></span></div>
        <div id="all-projects" class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="all-bids-table"  cellspacing="0">
              <thead>
                <tr>
                  <th>Bid ID</th>
                  <th>Company</th>
                  <th>Offer</th>
                  <th>Date</th>
                  <th>Message</th>
                  <th>Phone</th>
                  <th>Chat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Bid ID</th>
                  <th>Company</th>
                  <th>Offer</th>
                  <th>Date</th>
                  <th>Message</th>
                  <th>Phone</th>
                  <th>Chat</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
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
        $( "#project-start-date" ).datepicker();
        } );
      $( function() {
      $( "#end_date" ).datepicker();
    } );
    $( function() {
    $( "#project-end-date" ).datepicker();
  } );
    </script>
    <!--dynamically load a projects details starts here-->
    <script>
    $(document).ready(function() {
      var project_id={{$user_projects[0]['id']}};
      dynamic_project_details(project_id);
     });
     function dynamic_project_details(project_id)
     {
       $('#all-bids-table > tbody').html('');
       $(".current-projects").removeClass('bg-primary');
       $(".current-projects").addClass('bg-success');
       $("#"+project_id).removeClass('bg-success');
       $("#"+project_id).addClass('bg-primary');
       $.get("/load-project-details/",
             {
               project_id:project_id
             },
             function(data,status){
               var project=JSON.stringify(data[0]);//project, projectType and Bid tables data
               var project_obj=JSON.parse(project);
               var bidders_profiles=data[1];
               $('#project-title').val(project_obj.title);
               $('.project-title').html(project_obj.title);
               $('#project-start-date').val(project_obj.start_date);
               $('#project-end-date').val(project_obj.end_date);
               $('#project-description').val(project_obj.description);
               $('#facebook').attr('href','https://www.addtoany.com/add_to/facebook?linkurl=https%3A%2F%2Fwebdesignerscenter.com%2Fproject-details%2F'+project_obj.id+'&amp;linkname=');
               $('#twitter').attr('href','https://www.addtoany.com/add_to/twitter?linkurl=https%3A%2F%2Fwebdesignerscenter.com%2Fproject-details%2F'+project_obj.id+'&amp;linkname=');
               $('#google').attr('href','https://www.addtoany.com/add_to/google_plus?linkurl=https%3A%2F%2Fwebdesignerscenter.com%2Fproject-details%2F'+project_obj.id+'&amp;linkname=');
               $('#linkedin').attr('href','https://www.addtoany.com/add_to/linkedin?linkurl=https%3A%2F%2Fwebdesignerscenter.com%2Fproject-details%2F'+project_obj.id+'&amp;linkname=');
               if(project_obj.project_type.feature1==1){$('#feature1').attr('checked',true);}
               if(project_obj.project_type.feature2==1){$('#feature2').attr('checked',true);}
               if(project_obj.project_type.feature3==1){$('#feature3').attr('checked',true);}
               if(project_obj.project_type.feature4==1){$('#feature4').attr('checked',true);}
               if(project_obj.project_type.feature5==1){$('#feature5').attr('checked',true);}
               if(project_obj.project_type.feature6==1){$('#feature6').attr('checked',true);}
               if(project_obj.project_type.feature7==1){$('#feature7').attr('checked',true);}
               if(project_obj.project_type.feature8==1){$('#feature8').attr('checked',true);}
               if(project_obj.project_type.category==1){
                 $('#project-category').val('1');
                 $("#"+project_id+" i").removeClass('fa-globe');
                 $("#"+project_id+" i").addClass('fa-mobile');
                 if(project_obj.caption===null){$('#project-avatar').css({"background-image": "url('{{asset('/avatar/mobile.jpg')}}')"});}else{$('#project-avatar').css({"background-image": "url('"+project_obj.caption+"')"});}
               }else if (project_obj.project_type.category==2) {
                 $('#project-category').val('2');
                 $("#"+project_id+" i").removeClass('fa-globe');
                 $("#"+project_id+" i").addClass('fa-shopping-cart');
                 if(project_obj.caption===null){$('#project-avatar').css({"background-image": "url('{{asset('/avatar/e-commerce.jpg')}}')"});}else{$('#project-avatar').css({"background-image": "url('"+project_obj.caption+"')"});}
               }else if (project_obj.project_type.category==3) {
                 $('#project-category').val('3');
                 $("#"+project_id+" i").removeClass('fa-globe');
                 $("#"+project_id+" i").addClass('fa-commenting');
                 if(project_obj.caption===null){$('#project-avatar').css({"background-image": "url('{{asset('/avatar/blog.jpg')}}')"});}else{$('#project-avatar').css({"background-image": "url('"+project_obj.caption+"')"});}
               }else if (project_obj.project_type.category==4) {
                 $('#project-category').val('4');
                 if(project_obj.caption===null){$('#project-avatar').css({"background-image": "url('{{asset('/avatar/website.jpg')}}')"});}else{$('#project-avatar').css({"background-image": "url('"+project_obj.caption+"')"});}
               }
               if(project_obj.project_type.feature9!=''){$('#feature9').html('Choose a new doc 1');}
               if(project_obj.project_type.feature10!=''){$('#feature10').html('Choose a new doc 2');}
               if(project_obj.project_type.feature11!=''){$('#feature11').html('Choose a new doc 3');}
               if(project_obj.avg_price!=''){$('#average-offer').html('$ '+project_obj.avg_price);}else{$('#average-offer').html('No offers yet');}
               load_charts(project_obj.bid,bidders_profiles,{{session('all_companies')}},project_obj);
               $('#all-bids-table').DataTable();
           });
           $( document ).ajaxStart(function() {
              $( "#loading" ).show();
              $("body").css('opacity','0.5');
           });
           $( document ).ajaxComplete(function() {
              $( "#loading" ).hide();
              $("body").css('opacity','1');
           });
     }
     function display_effect(id)
     {
       $("#"+id).slideToggle('slow','linear');
     }
     function confirmation(bidder,e)
     {
       var con=confirm('Are you sure you want to choose '+ bidder);
       e.preventDefault();
     }
    </script>
    <script>
    $( function() {
    $( "#start_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    } );
    $( function() {
    $( "#end_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    } );
    </script>
    @if(old('title'))
    <script>
    $('html,body').animate({scrollTop: $("#quick-form-sec").offset().top },2000);
    </script>
    @endif
    <!--dynamically load a projects details ends here-->
@endsection
