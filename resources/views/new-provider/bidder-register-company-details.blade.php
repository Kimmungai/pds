@extends('layouts.main')

@section('content')
<div class="container">
<div class="row">
<nav class="navbar-inverse pds-menu-bar">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      <li><a href="/projects">Projects</a></li>
      <li><a href="/#how-it-works">How it works</a></li>
      <li><a href="/about-us">About us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/new-project">New Project</a></li>
      @if(Auth::id())
        <li><a href="/profile"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->first_name}}</a></li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      @else
        <li><a href="/sign-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endif
    </ul>
  </div>
</div>
</nav>
</div>
</div>
<div class="container">
<div class="row">
<div class="slider">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>Power to choose!</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <p>Brief overview of Web Designers Center</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 project-btn pull-right">
        <a class="btn btn-primary" href="/new-project">Post a new project</a>
      </div>
    </div>
 </div>
</div>
</div>
</div>
<section class="enquire">
  <div class="container"><div class="row"><h2>Company details</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">1</i><p>Contacts <br /><i class="fa fa-check"></i></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><i class="fa">2</i><p>Company</p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">3</i><p>Subscribe</p></div></div>
        </div>
        <div class="row">
          <article>
            <h5>Company Registration Form</h5>
            @if (Session::has('email_verified'))
              <div class="alert alert-success">
                  {{ Session::get('email_verified') }}
              </div>
            @endif
            @if (Session::has('email_verified_error'))
              <div class="alert alert-danger">
                  {{ Session::get('email_verified_error') }}
              </div>
            @endif
            @if (Session::has('company_update_error'))
              <div class="alert alert-danger">
                  {{ Session::get('company_update_error') }}
              </div>
            @endif
            @if(isset($data))
              <form method="POST" action="{{ url('provider-company-registration-update') }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT"/>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Company name<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="company_name" class="form-control" value="{{ $data['company_name'] }}" />
                  @if ($errors->has('company_name'))
                    <span class="red">
                        <strong>{{ $errors->first('company_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Company legal name<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="company_legal_name" class="form-control" value="{{ $data['company_legal_name'] }}" required/>
                  @if ($errors->has('company_legal_name'))
                    <span class="red">
                        <strong>{{ $errors->first('company_legal_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Reg no<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="company_reg_no" class="form-control" value="{{ $data['company_reg_no'] }}" required/>
                  @if ($errors->has('company_reg_no'))
                    <span class="red">
                        <strong>{{ $errors->first('company_reg_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Incorporation date<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input id="incorporation_date" type="text" name="company_incoporation_date" class="form-control" value="{{ $data['company_incoporation_date'] }}" required/>
                  @if ($errors->has('company_incoporation_date'))
                    <span class="red">
                        <strong>{{ $errors->first('company_incoporation_date') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Address<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="company_address" class="form-control" value="{{ $data['company_address'] }}" required/>
                  @if ($errors->has('company_address'))
                    <span class="red">
                        <strong>{{ $errors->first('company_address') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Telephone<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="company_tel" class="form-control" value="{{ $data['company_tel'] }}" required/>
                  @if ($errors->has('company_tel'))
                    <span class="red">
                        <strong>{{ $errors->first('company_tel') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Fax</label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="company_fax" class="form-control" value="{{ $data['company_fax'] }}"/>
                  @if ($errors->has('company_fax'))
                    <span class="red">
                        <strong>{{ $errors->first('company_fax') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Industry<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <select class="form-control" name="company_industry">
                    <option value="1" <?php if($data['company_industry']==1){?>selected<?php }?>>Software industry</option>
                    <option value="2" <?php if($data['company_industry']==2){?>selected<?php }?>>Telco industry</option>
                    <option value="3" <?php if($data['company_industry']==3){?>selected<?php }?>>Business industry</option>
                    <option value="4" <?php if($data['company_industry']==4){?>selected<?php }?>>Marketing industry</option>
                  </select>
                  @if ($errors->has('company_industry'))
                    <span class="red">
                        <strong>{{ $errors->first('company_industry') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Website url<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <input type="text" name="company_website" class="form-control" value="{{ $data['company_website'] }}" required/>
                  @if ($errors->has('company_website'))
                    <span class="red">
                        <strong>{{ $errors->first('company_website') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <label for="name">Description<span class="red">*</span></label>
                </div>
                <div class="col-md-10">
                  <textarea rows="5" class="form-control" name="company_description" placeholder="Give a brief description of your company" required>{{ $data['company_description'] }}</textarea>
                  @if ($errors->has('company_description'))
                    <span class="red">
                        <strong>{{ $errors->first('company_description') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-xs-3  project-btn">

                </div>
                <div class="col-xs-3 col-xs-offset-6 project-btn">
                  <button class="btn btn-primary" type="submit">Next <i class="fa  fa-chevron-right "></i></button>
                </div>
              </div>
             </form>
            @else
            <form method="POST" action="{{ url('provider-company-registration') }}">
              {{ csrf_field() }}
            <div class="row">
              <div class="col-md-2">
                <label for="name">Company name<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required/>
                @if ($errors->has('company_name'))
                  <span class="red">
                      <strong>{{ $errors->first('company_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Company legal name<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" name="company_legal_name" class="form-control" value="{{ old('company_legal_name') }}" required/>
                @if ($errors->has('company_legal_name'))
                  <span class="red">
                      <strong>{{ $errors->first('company_legal_name') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Reg no<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" name="company_reg_no" class="form-control" value="{{ old('company_reg_no') }}" required/>
                @if ($errors->has('company_reg_no'))
                  <span class="red">
                      <strong>{{ $errors->first('company_reg_no') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Incorporation date<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input id="incorporation_date" type="text" name="company_incoporation_date" class="form-control" value="{{ old('company_incoporation_date') }}" required/>
                @if ($errors->has('company_incoporation_date'))
                  <span class="red">
                      <strong>{{ $errors->first('company_incoporation_date') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Address<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" name="company_address" class="form-control" value="{{ old('company_address') }}" required/>
                @if ($errors->has('company_address'))
                  <span class="red">
                      <strong>{{ $errors->first('company_address') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Telephone<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" name="company_tel" class="form-control" value="{{ old('company_tel') }}" required/>
                @if ($errors->has('company_tel'))
                  <span class="red">
                      <strong>{{ $errors->first('company_tel') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Fax</label>
              </div>
              <div class="col-md-10">
                <input type="text" name="company_fax" class="form-control" value="{{ old('company_fax') }}"/>
                @if ($errors->has('company_fax'))
                  <span class="red">
                      <strong>{{ $errors->first('company_fax') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Industry<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <select class="form-control" name="company_industry">
                  <option value="1" <?php if(old('company_industry')==1){?>selected<?php }?>>Software industry</option>
                  <option value="2" <?php if(old('company_industry')==2){?>selected<?php }?>>Telco industry</option>
                  <option value="3" <?php if(old('company_industry')==3){?>selected<?php }?>>Business industry</option>
                  <option value="4" <?php if(old('company_industry')==4){?>selected<?php }?>>Marketing industry</option>
                </select>
                @if ($errors->has('company_industry'))
                  <span class="red">
                      <strong>{{ $errors->first('company_industry') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Website url<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" name="company_website" class="form-control" value="{{ old('company_website') }}" required/>
                @if ($errors->has('company_website'))
                  <span class="red">
                      <strong>{{ $errors->first('company_website') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="name">Description<span class="red">*</span></label>
              </div>
              <div class="col-md-10">
                <textarea rows="5" class="form-control" name="company_description" placeholder="Give a brief description of your company" required>{{ old('company_description') }}</textarea>
                @if ($errors->has('company_description'))
                  <span class="red">
                      <strong>{{ $errors->first('company_description') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3  project-btn">

              </div>
              <div class="col-xs-3 col-xs-offset-6 project-btn">
                <button class="btn btn-primary" type="submit">Next <i class="fa  fa-chevron-right "></i></button>
              </div>
            </div>
           </form>
            @endif
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script>
$( function() {
$( "#incorporation_date" ).datepicker();
} );
</script>
@endsection
