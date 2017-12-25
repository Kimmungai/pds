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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
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
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Company</li>
      </ol>
      @if (Session::has('update_success'))
        <div class="alert alert-success">
            {{ Session::get('update_success') }}
        </div>
      @endif
      @if (Session::has('update_unsuccessful'))
        <div class="alert alert-danger">
            {{ Session::get('update_unsuccessful') }}
        </div>
      @endif
      @if (Session::has('current_pass_mismatch'))
        <div class="alert alert-danger">
            {{ Session::get('current_pass_mismatch') }}
        </div>
      @endif
      <!-- Area Chart Example-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-building"></i> Company details</div>
          <hr class="mt-2">
          <div class="card-columns">
            <!-- Example Social Card-->
            <form class="" action="/incorp-details" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PUT" />
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="card-title mb-1"><a href="#">Company Registration details</a></h6>
                  <!--@if($company['company_reg_cert']=='')
                    <div class="avatar" style="background:url('{{asset('/avatar/avatar.jpg')}}') center no-repeat;"></div>
                  @else
                    <div class="avatar" style="background:url('{{ url($company['company_reg_cert']) }}') center no-repeat;"></div>
                  @endif-->
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Reg. cert.</label>
                    @if($company['company_reg_cert']=='')
                    <div class="col-md-9">
                        <input name="company_reg_cert" type="file" class="form-control" style="height:auto;" accept=".pdf*">
                        @if ($errors->has('company_reg_cert'))
                          <span class="red">
                              <strong>{{ $errors->first('company_reg_cert') }}</strong>
                          </span>
                        @endif
                    </div>
                    @else
                    <div class="col-md-9">
                      <p><big><span class="fa fa-file-pdf-o"></span></big> Uploaded!</p><a href="#" onclick="show_file_input('company_reg_cert')" style="color:inherit;">change</a> <a target="_blank" href="{{url($company['company_reg_cert'])}}" style="color:inherit;">download</a>
                        <input id="company_reg_cert" name="company_reg_cert" type="file" class="form-control no-display" style="height:auto;" accept=".pdf*">
                        @if ($errors->has('company_reg_cert'))
                          <span class="red">
                              <strong>{{ $errors->first('company_reg_cert') }}</strong>
                          </span>
                        @endif
                    </div>
                    @endif
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9">
                      <input name="company_name" class="form-control" type="text" value="{{$company['company_name']}}" required>
                      @if ($errors->has('company_name'))
                        <span class="red">
                            <strong>{{ $errors->first('company_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Legal name</label>
                    <div class="col-md-9">
                      <input name="company_legal_name" class="form-control" type="text" value="{{$company['company_legal_name']}}">
                      @if ($errors->has('company_legal_name'))
                        <span class="red">
                            <strong>{{ $errors->first('company_legal_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Reg no.</label>
                    <div class="col-md-9">
                      <input name="company_reg_no" class="form-control" type="text" value="{{$company['company_reg_no']}}" required>
                      @if ($errors->has('company_reg_no'))
                        <span class="red">
                            <strong>{{ $errors->first('company_reg_no') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Reg. Date</label>
                    <div class="col-md-9">
                      <input id="company_incoporation_date" name="company_incoporation_date" class="form-control" type="text" value="{{$company['company_incoporation_date']}}" required>
                      @if ($errors->has('company_incoporation_date'))
                        <span class="red">
                            <strong>{{ $errors->first('company_incoporation_date') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>
                </div>
                <hr class="my-0">
              </div>
            </form>
            <!-- Example Social Card-->
            <form class="" action="/contacts-update" method="post">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PUT" />
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="card-title mb-1"><a href="#">Company Contacts</a></h6>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Telephone</label>
                    <div class="col-md-9">
                      <input name="company_tel" class="form-control" type="text" value="{{$company['company_tel']}}" required>
                      @if ($errors->has('company_tel'))
                        <span class="red">
                            <strong>{{ $errors->first('company_tel') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Address</label>
                    <div class="col-md-9">
                      <input name="company_address" class="form-control" type="text" value="{{$company['company_address']}}" required>
                      @if ($errors->has('company_address'))
                        <span class="red">
                            <strong>{{ $errors->first('company_address') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Company Email</label>
                    <div class="col-md-9">
                      <input name="company_email" class="form-control" type="text" value="{{$company['company_email']}}">
                      @if ($errors->has('company_email'))
                        <span class="red">
                            <strong>{{ $errors->first('company_email') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Fax</label>
                    <div class="col-md-9">
                      <input name="company_fax" class="form-control" type="text" value="{{$company['company_fax']}}">
                      @if ($errors->has('company_fax'))
                        <span class="red">
                            <strong>{{ $errors->first('company_fax') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Website</label>
                    <div class="col-md-9">
                      <input name="company_website" class="form-control" type="url" value="{{$company['company_website']}}" required>
                      @if ($errors->has('company_website'))
                        <span class="red">
                            <strong>{{ $errors->first('company_website') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>
                </div>
                <hr class="my-0">
              </div>
            </form>
            <!-- Example Social Card-->
            <form class="" action="/company-promotion-update" method="post">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PUT" />
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="card-title mb-1"><a href="#">Company Promotion</a></h6>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Youtube video</label>
                    <div class="col-md-9">
                      <input type="url" class="form-control" name="company_youtube" placeholder="Promotional youtube video" value="<?php if($company['company_youtube']!=''){?>https://www.youtube.com/watch?v=<?php }?>{{ $company['company_youtube'] }}">
                      @if ($errors->has('company_youtube'))
                        <span class="red">
                            <strong>{{ $errors->first('company_youtube') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Industry</label>
                    <div class="col-md-9">
                      <select class="form-control" name="company_industry">
                        <option value="1" <?php if($company['company_industry']==1){?>selected<?php }?>>Software industry</option>
                        <option value="2" <?php if($company['company_industry']==2){?>selected<?php }?>>Telco industry</option>
                        <option value="3" <?php if($company['company_industry']==3){?>selected<?php }?>>Business industry</option>
                        <option value="4" <?php if($company['company_industry']==4){?>selected<?php }?>>Marketing industry</option>
                      </select>
                      @if ($errors->has('company_industry'))
                        <span class="red">
                            <strong>{{ $errors->first('company_industry') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Company Description</label>
                    <div class="col-md-9">
                      <textarea rows="5" class="form-control" name="company_description" placeholder="Give a brief description of your company" required>{{ $company['company_description'] }}</textarea>
                      @if ($errors->has('company_description'))
                        <span class="red">
                            <strong>{{ $errors->first('company_description') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-9">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>
                </div>
                <hr class="my-0">
              </div>
            </form>
            <!-- Example Social Card-->
          </div>
          <!-- /Card Columns-->
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script>
  $( function() {
    $( "#company_incoporation_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  function show_file_input(id)
  {
    $('#'+id).click();
    $('#'+id).removeClass('no-display');
  }
  </script>
@endsection
