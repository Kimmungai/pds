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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
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
        <li class="breadcrumb-item active">Contact Person</li>
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
            <i class="fa fa-list"></i> Registration details</div>
          <hr class="mt-2">
          <div class="card-columns">
            <!-- Example Social Card-->
            <form class="" action="/update-basic-details" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PUT" />
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="card-title mb-1"><a href="#">Basic details</a></h6>
                  @if($user['avatar']=='')
                    <div class="avatar" style="background:url('{{asset('/avatar/avatar.jpg')}}') center no-repeat;"></div>
                  @else
                    <div class="avatar" style="background:url('{{ url($user['avatar']) }}') center no-repeat;"></div>
                  @endif
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Picture</label>
                    <div class="col-md-9">
                        <input name="avatar" type="file" class="form-control" style="height:auto;">
                        @if ($errors->has('avatar'))
                          <span class="red">
                              <strong>{{ $errors->first('avatar') }}</strong>
                          </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">First name</label>
                    <div class="col-md-9">
                      <input name="first_name" class="form-control" type="text" value="{{$user['first_name']}}" required>
                      @if ($errors->has('first_name'))
                        <span class="red">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Middle name</label>
                    <div class="col-md-9">
                      <input name="middle_name" class="form-control" type="text" value="{{$user['middle_name']}}">
                      @if ($errors->has('middle_name'))
                        <span class="red">
                            <strong>{{ $errors->first('middle_name') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Last name</label>
                    <div class="col-md-9">
                      <input name="last_name" class="form-control" type="text" value="{{$user['last_name']}}" required>
                      @if ($errors->has('last_name'))
                        <span class="red">
                            <strong>{{ $errors->first('last_name') }}</strong>
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
            <div class="card mb-3">
              <div class="card-body">
                <form class="" action="/update-contact-details" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT" />
                    <h6 class="card-title mb-1"><a href="#">Contact details</a></h6>
                    <div class="form-group row">
                      <label for="example-search-input" class="col-md-3 col-form-label">Phone</label>
                      <div class="col-md-9">
                        <input name="phone" class="form-control" type="text" value="{{$user['phone']}}">
                        @if ($errors->has('phone'))
                          <span class="red">
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="example-search-input" class="col-md-3 col-form-label">Address</label>
                      <div class="col-md-9">
                        <input name="address" class="form-control" type="text" value="{{$user['address']}}">
                        @if ($errors->has('address'))
                          <span class="red">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="example-search-input" class="col-md-3 col-form-label">Website</label>
                      <div class="col-md-9">
                        <input name="website" class="form-control" type="text" value="{{$user['website']}}">
                        @if ($errors->has('website'))
                          <span class="red">
                              <strong>{{ $errors->first('website') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-9">
                        <button class="btn btn-success" href="#">Update</button>
                      </div>
                    </div>
               </form>
              </div>
              <hr class="my-0">
            </div>
            <!-- Example Social Card-->
            <form class="" action="/update-personal-details" method="post">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PUT" />
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="card-title mb-1"><a href="#">Personal details</a></h6>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">ID no.</label>
                    <div class="col-md-9">
                      <input name="id_no" class="form-control" type="text" value="{{$user['id_no']}}">
                      @if ($errors->has('id_no'))
                        <span class="red">
                            <strong>{{ $errors->first('id_no') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Passport</label>
                    <div class="col-md-9">
                      <input name="passport" class="form-control" type="text" value="{{$user['passport']}}">
                      @if ($errors->has('passport'))
                        <span class="red">
                            <strong>{{ $errors->first('passport') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Nationality</label>
                    <div class="col-md-9">
                        <select class="form-control" name="nationality"><option <?php if($user['nationality']=="") {?>selected <?php }?> value="">-- select one --</option><option <?php if($user['nationality']=="afghan") {?>selected <?php }?> value="afghan">Afghan</option><option <?php if($user['nationality']=="albanian") {?>selected <?php }?> value="albanian">Albanian</option><option <?php if($user['nationality']=="algerian") {?>selected <?php }?> value="algerian">Algerian</option><option <?php if($user['nationality']=="american") {?>selected <?php }?> value="american">American</option><option <?php if($user['nationality']=="andorran") {?>selected <?php }?> value="andorran">Andorran</option><option <?php if($user['nationality']=="angolan") {?>selected <?php }?> value="angolan">Angolan</option><option <?php if($user['nationality']=="antiguans") {?>selected <?php }?> value="antiguans">Antiguans</option><option <?php if($user['nationality']=="argentinean") {?>selected <?php }?> value="argentinean">Argentinean</option><option <?php if($user['nationality']=="armenian") {?>selected <?php }?> value="armenian">Armenian</option><option <?php if($user['nationality']=="australian") {?>selected <?php }?> value="australian">Australian</option><option <?php if($user['nationality']=="austrian") {?>selected <?php }?> value="austrian">Austrian</option><option <?php if($user['nationality']=="azerbaijani") {?>selected <?php }?> value="azerbaijani">Azerbaijani</option><option <?php if($user['nationality']=="bahamian") {?>selected <?php }?> value="bahamian">Bahamian</option><option <?php if($user['nationality']=="bahraini") {?>selected <?php }?> value="bahraini">Bahraini</option><option <?php if($user['nationality']=="bangladeshi") {?>selected <?php }?> value="bangladeshi">Bangladeshi</option><option <?php if($user['nationality']=="barbadian") {?>selected <?php }?> value="barbadian">Barbadian</option><option <?php if($user['nationality']=="barbudans") {?>selected <?php }?> value="barbudans">Barbudans</option><option <?php if($user['nationality']=="batswana") {?>selected <?php }?> value="batswana">Batswana</option><option <?php if($user['nationality']=="belarusian") {?>selected <?php }?> value="belarusian">Belarusian</option><option <?php if($user['nationality']=="belgian") {?>selected <?php }?> value="belgian">Belgian</option><option <?php if($user['nationality']=="belizean") {?>selected <?php }?> value="belizean">Belizean</option><option <?php if($user['nationality']=="beninese") {?>selected <?php }?> value="beninese">Beninese</option><option <?php if($user['nationality']=="bhutanese") {?>selected <?php }?> value="bhutanese">Bhutanese</option><option <?php if($user['nationality']=="bolivian") {?>selected <?php }?> value="bolivian">Bolivian</option><option <?php if($user['nationality']=="bosnian") {?>selected <?php }?> value="bosnian">Bosnian</option><option <?php if($user['nationality']=="brazilian") {?>selected <?php }?> value="brazilian">Brazilian</option><option <?php if($user['nationality']=="british") {?>selected <?php }?> value="british">British</option><option <?php if($user['nationality']=="bruneian") {?>selected <?php }?> value="bruneian">Bruneian</option><option <?php if($user['nationality']=="bulgarian") {?>selected <?php }?> value="bulgarian">Bulgarian</option><option <?php if($user['nationality']=="burkinabe") {?>selected <?php }?> value="burkinabe">Burkinabe</option><option <?php if($user['nationality']=="burmese") {?>selected <?php }?> value="burmese">Burmese</option><option <?php if($user['nationality']=="burundian") {?>selected <?php }?> value="burundian">Burundian</option><option <?php if($user['nationality']=="cambodian") {?>selected <?php }?> value="cambodian">Cambodian</option><option <?php if($user['nationality']=="cameroonian") {?>selected <?php }?> value="cameroonian">Cameroonian</option><option <?php if($user['nationality']=="canadian") {?>selected <?php }?> value="canadian">Canadian</option><option <?php if($user['nationality']=="cape verdean") {?>selected <?php }?> value="cape verdean">Cape Verdean</option><option <?php if($user['nationality']=="central african") {?>selected <?php }?> value="central african">Central African</option><option <?php if($user['nationality']=="chadian") {?>selected <?php }?> value="chadian">Chadian</option><option <?php if($user['nationality']=="chilean") {?>selected <?php }?> value="chilean">Chilean</option><option <?php if($user['nationality']=="chinese") {?>selected <?php }?> value="chinese">Chinese</option><option <?php if($user['nationality']=="colombian") {?>selected <?php }?> value="colombian">Colombian</option><option <?php if($user['nationality']=="comoran") {?>selected <?php }?> value="comoran">Comoran</option><option <?php if($user['nationality']=="congolese") {?>selected <?php }?> value="congolese">Congolese</option><option <?php if($user['nationality']=="costa rican") {?>selected <?php }?> value="costa rican">Costa Rican</option><option <?php if($user['nationality']=="croatian") {?>selected <?php }?> value="croatian">Croatian</option><option <?php if($user['nationality']=="cuban") {?>selected <?php }?> value="cuban">Cuban</option><option <?php if($user['nationality']=="cypriot") {?>selected <?php }?> value="cypriot">Cypriot</option><option <?php if($user['nationality']=="czech") {?>selected <?php }?> value="czech">Czech</option><option <?php if($user['nationality']=="danish") {?>selected <?php }?> value="danish">Danish</option><option <?php if($user['nationality']=="djibouti") {?>selected <?php }?> value="djibouti">Djibouti</option><option <?php if($user['nationality']=="dominican") {?>selected <?php }?> value="dominican">Dominican</option><option <?php if($user['nationality']=="dutch") {?>selected <?php }?> value="dutch">Dutch</option><option <?php if($user['nationality']=="east timorese") {?>selected <?php }?> value="east timorese">East Timorese</option><option <?php if($user['nationality']=="ecuadorean") {?>selected <?php }?> value="ecuadorean">Ecuadorean</option><option <?php if($user['nationality']=="egyptian") {?>selected <?php }?> value="egyptian">Egyptian</option><option <?php if($user['nationality']=="emirian") {?>selected <?php }?> value="emirian">Emirian</option><option <?php if($user['nationality']=="equatorial guinean") {?>selected <?php }?> value="equatorial guinean">Equatorial Guinean</option><option <?php if($user['nationality']=="eritrean") {?>selected <?php }?> value="eritrean">Eritrean</option><option <?php if($user['nationality']=="estonian") {?>selected <?php }?> value="estonian">Estonian</option><option <?php if($user['nationality']=="ethiopian") {?>selected <?php }?> value="ethiopian">Ethiopian</option><option <?php if($user['nationality']=="fijian") {?>selected <?php }?> value="fijian">Fijian</option><option <?php if($user['nationality']=="filipino") {?>selected <?php }?> value="filipino">Filipino</option><option <?php if($user['nationality']=="finnish") {?>selected <?php }?> value="finnish">Finnish</option><option <?php if($user['nationality']=="french") {?>selected <?php }?> value="french">French</option><option <?php if($user['nationality']=="gabonese") {?>selected <?php }?> value="gabonese">Gabonese</option><option <?php if($user['nationality']=="gambian") {?>selected <?php }?> value="gambian">Gambian</option><option <?php if($user['nationality']=="georgian") {?>selected <?php }?> value="georgian">Georgian</option><option <?php if($user['nationality']=="german") {?>selected <?php }?> value="german">German</option><option <?php if($user['nationality']=="ghanaian") {?>selected <?php }?> value="ghanaian">Ghanaian</option><option <?php if($user['nationality']=="greek") {?>selected <?php }?> value="greek">Greek</option><option <?php if($user['nationality']=="grenadian") {?>selected <?php }?> value="grenadian">Grenadian</option><option <?php if($user['nationality']=="guatemalan") {?>selected <?php }?> value="guatemalan">Guatemalan</option><option <?php if($user['nationality']=="guinea-bissauan") {?>selected <?php }?> value="guinea-bissauan">Guinea-Bissauan</option><option <?php if($user['nationality']=="guinean") {?>selected <?php }?> value="guinean">Guinean</option><option <?php if($user['nationality']=="guyanese") {?>selected <?php }?> value="guyanese">Guyanese</option><option <?php if($user['nationality']=="haitian") {?>selected <?php }?> value="haitian">Haitian</option><option <?php if($user['nationality']=="herzegovinian") {?>selected <?php }?> value="herzegovinian">Herzegovinian</option><option <?php if($user['nationality']=="honduran") {?>selected <?php }?> value="honduran">Honduran</option><option <?php if($user['nationality']=="hungarian") {?>selected <?php }?> value="hungarian">Hungarian</option><option <?php if($user['nationality']=="icelander") {?>selected <?php }?> value="icelander">Icelander</option><option <?php if($user['nationality']=="indian") {?>selected <?php }?> value="indian">Indian</option><option <?php if($user['nationality']=="indonesian") {?>selected <?php }?> value="indonesian">Indonesian</option><option <?php if($user['nationality']=="iranian") {?>selected <?php }?> value="iranian">Iranian</option><option <?php if($user['nationality']=="iraqi") {?>selected <?php }?> value="iraqi">Iraqi</option><option <?php if($user['nationality']=="irish") {?>selected <?php }?> value="irish">Irish</option><option <?php if($user['nationality']=="israeli") {?>selected <?php }?> value="israeli">Israeli</option><option <?php if($user['nationality']=="italian") {?>selected <?php }?> value="italian">Italian</option><option <?php if($user['nationality']=="ivorian") {?>selected <?php }?> value="ivorian">Ivorian</option><option <?php if($user['nationality']=="jamaican") {?>selected <?php }?> value="jamaican">Jamaican</option><option <?php if($user['nationality']=="japanese") {?>selected <?php }?> value="japanese">Japanese</option><option <?php if($user['nationality']=="jordanian") {?>selected <?php }?> value="jordanian">Jordanian</option><option <?php if($user['nationality']=="kazakhstani") {?>selected <?php }?> value="kazakhstani">Kazakhstani</option><option <?php if($user['nationality']=="kenyan") {?>selected <?php }?> value="kenyan">Kenyan</option><option <?php if($user['nationality']=="kittian and nevisian") {?>selected <?php }?> value="kittian and nevisian">Kittian and Nevisian</option><option <?php if($user['nationality']=="kuwaiti") {?>selected <?php }?> value="kuwaiti">Kuwaiti</option><option <?php if($user['nationality']=="kyrgyz") {?>selected <?php }?> value="kyrgyz">Kyrgyz</option><option <?php if($user['nationality']=="laotian") {?>selected <?php }?> value="laotian">Laotian</option><option <?php if($user['nationality']=="latvian") {?>selected <?php }?> value="latvian">Latvian</option><option <?php if($user['nationality']=="lebanese") {?>selected <?php }?> value="lebanese">Lebanese</option><option <?php if($user['nationality']=="liberian") {?>selected <?php }?> value="liberian">Liberian</option><option <?php if($user['nationality']=="libyan") {?>selected <?php }?> value="libyan">Libyan</option><option <?php if($user['nationality']=="liechtensteiner") {?>selected <?php }?> value="liechtensteiner">Liechtensteiner</option><option <?php if($user['nationality']=="lithuanian") {?>selected <?php }?> value="lithuanian">Lithuanian</option><option <?php if($user['nationality']=="luxembourger") {?>selected <?php }?> value="luxembourger">Luxembourger</option><option <?php if($user['nationality']=="macedonian") {?>selected <?php }?> value="macedonian">Macedonian</option><option <?php if($user['nationality']=="malagasy") {?>selected <?php }?> value="malagasy">Malagasy</option><option <?php if($user['nationality']=="malawian") {?>selected <?php }?> value="malawian">Malawian</option><option <?php if($user['nationality']=="malaysian") {?>selected <?php }?> value="malaysian">Malaysian</option><option <?php if($user['nationality']=="maldivan") {?>selected <?php }?> value="maldivan">Maldivan</option><option <?php if($user['nationality']=="malian") {?>selected <?php }?> value="malian">Malian</option><option <?php if($user['nationality']=="maltese") {?>selected <?php }?> value="maltese">Maltese</option><option <?php if($user['nationality']=="marshallese") {?>selected <?php }?> value="marshallese">Marshallese</option><option <?php if($user['nationality']=="mauritanian") {?>selected <?php }?> value="mauritanian">Mauritanian</option><option <?php if($user['nationality']=="mauritian") {?>selected <?php }?> value="mauritian">Mauritian</option><option <?php if($user['nationality']=="mexican") {?>selected <?php }?> value="mexican">Mexican</option><option <?php if($user['nationality']=="micronesian") {?>selected <?php }?> value="micronesian">Micronesian</option><option <?php if($user['nationality']=="moldovan") {?>selected <?php }?> value="moldovan">Moldovan</option><option <?php if($user['nationality']=="monacan") {?>selected <?php }?> value="monacan">Monacan</option><option <?php if($user['nationality']=="mongolian") {?>selected <?php }?> value="mongolian">Mongolian</option><option <?php if($user['nationality']=="moroccan") {?>selected <?php }?> value="moroccan">Moroccan</option><option <?php if($user['nationality']=="mosotho") {?>selected <?php }?> value="mosotho">Mosotho</option><option <?php if($user['nationality']=="motswana") {?>selected <?php }?> value="motswana">Motswana</option><option <?php if($user['nationality']=="mozambican") {?>selected <?php }?> value="mozambican">Mozambican</option><option <?php if($user['nationality']=="namibian") {?>selected <?php }?> value="namibian">Namibian</option><option <?php if($user['nationality']=="nauruan") {?>selected <?php }?> value="nauruan">Nauruan</option><option <?php if($user['nationality']=="nepalese") {?>selected <?php }?> value="nepalese">Nepalese</option><option <?php if($user['nationality']=="new zealander") {?>selected <?php }?> value="new zealander">New Zealander</option><option <?php if($user['nationality']=="ni-vanuatu") {?>selected <?php }?> value="ni-vanuatu">Ni-Vanuatu</option><option <?php if($user['nationality']=="nicaraguan") {?>selected <?php }?> value="nicaraguan">Nicaraguan</option><option <?php if($user['nationality']=="nigerien") {?>selected <?php }?> value="nigerien">Nigerien</option><option <?php if($user['nationality']=="north korean") {?>selected <?php }?> value="north korean">North Korean</option><option <?php if($user['nationality']=="northern irish") {?>selected <?php }?> value="northern irish">Northern Irish</option><option <?php if($user['nationality']=="norwegian") {?>selected <?php }?> value="norwegian">Norwegian</option><option <?php if($user['nationality']=="omani") {?>selected <?php }?> value="omani">Omani</option><option <?php if($user['nationality']=="pakistani") {?>selected <?php }?> value="pakistani">Pakistani</option><option <?php if($user['nationality']=="palauan") {?>selected <?php }?> value="palauan">Palauan</option><option <?php if($user['nationality']=="panamanian") {?>selected <?php }?> value="panamanian">Panamanian</option><option <?php if($user['nationality']=="papua new guinean") {?>selected <?php }?> value="papua new guinean">Papua New Guinean</option><option <?php if($user['nationality']=="paraguayan") {?>selected <?php }?> value="paraguayan">Paraguayan</option><option <?php if($user['nationality']=="peruvian") {?>selected <?php }?> value="peruvian">Peruvian</option><option <?php if($user['nationality']=="polish") {?>selected <?php }?> value="polish">Polish</option><option <?php if($user['nationality']=="portuguese") {?>selected <?php }?> value="portuguese">Portuguese</option><option <?php if($user['nationality']=="qatari") {?>selected <?php }?> value="qatari">Qatari</option><option <?php if($user['nationality']=="romanian") {?>selected <?php }?> value="romanian">Romanian</option><option <?php if($user['nationality']=="russian") {?>selected <?php }?> value="russian">Russian</option><option <?php if($user['nationality']=="rwandan") {?>selected <?php }?> value="rwandan">Rwandan</option><option <?php if($user['nationality']=="saint lucian") {?>selected <?php }?> value="saint lucian">Saint Lucian</option><option <?php if($user['nationality']=="salvadoran") {?>selected <?php }?> value="salvadoran">Salvadoran</option><option <?php if($user['nationality']=="samoan") {?>selected <?php }?> value="samoan">Samoan</option><option <?php if($user['nationality']=="san marinese") {?>selected <?php }?> value="san marinese">San Marinese</option><option <?php if($user['nationality']=="sao tomean") {?>selected <?php }?> value="sao tomean">Sao Tomean</option><option <?php if($user['nationality']=="saudi") {?>selected <?php }?> value="saudi">Saudi</option><option <?php if($user['nationality']=="scottish") {?>selected <?php }?> value="scottish">Scottish</option><option <?php if($user['nationality']=="senegalese") {?>selected <?php }?> value="senegalese">Senegalese</option><option <?php if($user['nationality']=="serbian") {?>selected <?php }?> value="serbian">Serbian</option><option <?php if($user['nationality']=="seychellois") {?>selected <?php }?> value="seychellois">Seychellois</option><option <?php if($user['nationality']=="sierra leonean") {?>selected <?php }?> value="sierra leonean">Sierra Leonean</option><option <?php if($user['nationality']=="singaporean") {?>selected <?php }?> value="singaporean">Singaporean</option><option <?php if($user['nationality']=="slovakian") {?>selected <?php }?> value="slovakian">Slovakian</option><option <?php if($user['nationality']=="slovenian") {?>selected <?php }?> value="slovenian">Slovenian</option><option <?php if($user['nationality']=="solomon islander") {?>selected <?php }?> value="solomon islander">Solomon Islander</option><option <?php if($user['nationality']=="somali") {?>selected <?php }?> value="somali">Somali</option><option <?php if($user['nationality']=="south african") {?>selected <?php }?> value="south african">South African</option><option <?php if($user['nationality']=="south korean") {?>selected <?php }?> value="south korean">South Korean</option><option <?php if($user['nationality']=="spanish") {?>selected <?php }?> value="spanish">Spanish</option><option <?php if($user['nationality']=="sri lankan") {?>selected <?php }?> value="sri lankan">Sri Lankan</option><option <?php if($user['nationality']=="sudanese") {?>selected <?php }?> value="sudanese">Sudanese</option><option <?php if($user['nationality']=="surinamer") {?>selected <?php }?> value="surinamer">Surinamer</option><option <?php if($user['nationality']=="swazi") {?>selected <?php }?> value="swazi">Swazi</option><option <?php if($user['nationality']=="swedish") {?>selected <?php }?> value="swedish">Swedish</option><option <?php if($user['nationality']=="swiss") {?>selected <?php }?> value="swiss">Swiss</option><option <?php if($user['nationality']=="syrian") {?>selected <?php }?> value="syrian">Syrian</option><option <?php if($user['nationality']=="taiwanese") {?>selected <?php }?> value="taiwanese">Taiwanese</option><option <?php if($user['nationality']=="tajik") {?>selected <?php }?> value="tajik">Tajik</option><option <?php if($user['nationality']=="tanzanian") {?>selected <?php }?> value="tanzanian">Tanzanian</option><option <?php if($user['nationality']=="thai") {?>selected <?php }?> value="thai">Thai</option><option <?php if($user['nationality']=="togolese") {?>selected <?php }?> value="togolese">Togolese</option><option <?php if($user['nationality']=="tongan") {?>selected <?php }?> value="tongan">Tongan</option><option <?php if($user['nationality']=="trinidadian or tobagonian") {?>selected <?php }?> value="trinidadian or tobagonian">Trinidadian or Tobagonian</option><option <?php if($user['nationality']=="tunisian") {?>selected <?php }?> value="tunisian">Tunisian</option><option <?php if($user['nationality']=="turkish") {?>selected <?php }?> value="turkish">Turkish</option><option <?php if($user['nationality']=="tuvaluan") {?>selected <?php }?> value="tuvaluan">Tuvaluan</option><option <?php if($user['nationality']=="ugandan") {?>selected <?php }?> value="ugandan">Ugandan</option><option <?php if($user['nationality']=="ukrainian") {?>selected <?php }?> value="ukrainian">Ukrainian</option><option <?php if($user['nationality']=="uruguayan") {?>selected <?php }?> value="uruguayan">Uruguayan</option><option <?php if($user['nationality']=="uzbekistani") {?>selected <?php }?> value="uzbekistani">Uzbekistani</option><option <?php if($user['nationality']=="venezuelan") {?>selected <?php }?> value="venezuelan">Venezuelan</option><option <?php if($user['nationality']=="vietnamese") {?>selected <?php }?> value="vietnamese">Vietnamese</option><option <?php if($user['nationality']=="welsh") {?>selected <?php }?> value="welsh">Welsh</option><option <?php if($user['nationality']=="yemenite") {?>selected <?php }?> value="yemenite">Yemenite</option><option <?php if($user['nationality']=="zambian") {?>selected <?php }?> value="zambian">Zambian</option><option <?php if($user['nationality']=="zimbabwean") {?>selected <?php }?> value="zimbabwean">Zimbabwean</option>
                      </select>
                      @if ($errors->has('nationality'))
                        <span class="red">
                            <strong>{{ $errors->first('nationality') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="example-search-input" class="col-md-3 col-form-label">Birthday</label>
                    <div class="col-md-9">
                      <input id="dob" name="dob" class="form-control" type="text" value="{{$user['dob']}}">
                      @if ($errors->has('dob'))
                        <span class="red">
                            <strong>{{ $errors->first('dob') }}</strong>
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
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Password change</a></h6>
                <form class="" action="/update-password-change" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="form-group row">
                      <label for="example-search-input" class="col-md-3 col-form-label">Current password</label>
                      <div class="col-md-9">
                        <input name="current_password" class="form-control" type="password" value="">
                        @if ($errors->has('current_password'))
                          <span class="red">
                              <strong>{{ $errors->first('current_password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="example-search-input" class="col-md-3 col-form-label">New password</label>
                      <div class="col-md-9">
                        <input name="new_password" class="form-control" type="password" value="">
                        @if ($errors->has('new_password'))
                          <span class="red">
                              <strong>{{ $errors->first('new_password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="example-search-input" class="col-md-3 col-form-label">New password confirm</label>
                      <div class="col-md-9">
                        <input name="new_password_confirmation" class="form-control" type="password" value="">
                        @if ($errors->has('new_password_confirm'))
                          <span class="red">
                              <strong>{{ $errors->first('new_password_confirm') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-9">
                        <button class="btn btn-success" type="submit">Update</button>
                      </div>
                    </div>
              </form>
              </div>
              <hr class="my-0">
            </div>

            <!-- Example Social Card-->
            <div class="card mb-3">
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Account Deactivation</a></h6>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small"></div>
              <hr class="my-0">
              <button class="btn btn-danger" data-toggle="modal" data-target="#deactivateModal">Delete my account</button>
            </div>
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
    $( "#dob" ).datepicker();
  } );
  </script>
@endsection
