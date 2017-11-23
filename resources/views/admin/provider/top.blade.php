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
          <a class="nav-link" href="/provider-chats">
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
      <div class="row project-control-bar">
        <div class="col-md-5">
          <ul class="list-inline">
            <li class="list-inline-item"><a class="btn btn-success active" href="#">All <i class="fa fa-list"></i></a></li>
            <li class="list-inline-item"><a class="btn btn-success" href="#">Open <i class="fa  fa-folder-open"></i></a></li>
            <li class="list-inline-item"><a class="btn btn-success" href="#">Closed <i class="fa fa-folder"></i></a></li>
            <li class="list-inline-item"><a class="btn btn-success" href="#">My Bids <i class="fa fa-user"></i></a></li>
          </ul>
        </div>
        <div class="col-md-5">
          <label for="sort-projects"><i class="fa  fa-filter"></i> Filter</lable>
            <ul class="list-inline">
              <li class="list-inline-item"><input type="radio" name="project-category" /> Mobile App</li>
              <li class="list-inline-item"><input type="radio" name="project-category" /> E-commerce</li>
              <li class="list-inline-item"><input type="radio" name="project-category" /> Blog</li>
              <li class="list-inline-item"><input type="radio" name="project-category" /> Website</li>
            </ul>
        </div>
        <div class="col-md-2">
          <label for="sort-projects"><i class="fa fa-sort-amount-asc"></i> Sort</lable>
            <select class="form-control" name="sort-projects">
              <option>Newest - Oldest</option>
              <option>Oldest - Newest</option>
            </select>
        </div>
      </div>
      <div class="row projects-view">
        <div class="col-md-6">
          <article>
            <h3>mahgathe</h3>
            <div class="container">
              <div class="row">
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Front-end</b></li>
                    <li class="list-group-item">Check out <small><i class="fa fa-cart-plus"></i></small></li>
                    <li class="list-group-item">Responsive <small><i class="fa fa-desktop"></i><i class="fa fa-tablet"></i> <i class="fa fa-mobile-phone"></i></small></li>
                    <li class="list-group-item">Membership <small><i class="fa fa-users"></i></small></li>
                    <li class="list-group-item">Notifications <small><i class="fa fa-envelope"></i></small></li>
                  </ul>
                </div>
                <div class="col-md-4 nopadding">
                  <h5>Requirements</h5>
                  <div class="project-icon" style="background:url('{{asset('/avatar/avatar.jpg')}}') center no-repeat;"></div>
                  <h5 class="red">ClOSED</h5>
                  <p>On: <strong>11/12/2015</strong></p>
                </div>
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Back-end</b></li>
                    <li class="list-group-item">Cloud hosted <small><i class="fa fa-cloud-upload"></i></small></li>
                    <li class="list-group-item">Admin panel <small><i class="fa fa-dashboard"></i></small></li>
                    <li class="list-group-item">Back up <small><i class="fa fa-hdd-o"></i></small></li>
                    <li class="list-group-item">Bulk sms <small><i class="fa fa-envelope-open"></i></small></li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Avg price now <strong class="gold">KSH. 1,000</strong></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Schedule & User preference</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Start on: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Finish by: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Target: <strong>KSH. 100,000</strong></li>
                      <li class="list-group-item">User: <strong>Wajui</strong> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                    </div>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Description & technical specs</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Description: <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small></li>
                      <li class="list-group-item">Doc 1: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 2: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 3: <small><i class="fa fa-file-pdf-o"></i></small></li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h6>Client message: <strong class="green">Weka wega niwe weika!</strong></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h5>Your offer</h5>
                  <form>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="price"><strong>Amount</strong></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control"  />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="message"><strong>Message</strong></label>
                      </div>
                      <div class="col-md-10">
                        <textarea class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-danger pull-right" disabled><i class="fa fa-bell-slash"></i> Bid</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
        <div class="col-md-6">
          <article>
            <h3>mahgathe</h3>
            <div class="container">
              <div class="row">
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Front-end</b></li>
                    <li class="list-group-item">Check out <small><i class="fa fa-cart-plus"></i></small></li>
                    <li class="list-group-item">Responsive <small><i class="fa fa-desktop"></i><i class="fa fa-tablet"></i> <i class="fa fa-mobile-phone"></i></small></li>
                    <li class="list-group-item">Membership <small><i class="fa fa-users"></i></small></li>
                    <li class="list-group-item">Notifications <small><i class="fa fa-envelope"></i></small></li>
                  </ul>
                </div>
                <div class="col-md-4 nopadding">
                  <h5>Requirements</h5>
                  <div class="project-icon" style="background:url('{{asset('/avatar/avatar.jpg')}}') center no-repeat;"></div>
                  <h5>OPEN</h5>
                  <p>Time <strong>1:53:20</strong></p>
                </div>
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Back-end</b></li>
                    <li class="list-group-item">Cloud hosted <small><i class="fa fa-cloud-upload"></i></small></li>
                    <li class="list-group-item">Admin panel <small><i class="fa fa-dashboard"></i></small></li>
                    <li class="list-group-item">Back up <small><i class="fa fa-hdd-o"></i></small></li>
                    <li class="list-group-item">Bulk sms <small><i class="fa fa-envelope-open"></i></small></li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Avg price now <strong class="gold">KSH. 1,000</strong></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Schedule & User preference</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Start on: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Finish by: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Target: <strong>KSH. 100,000</strong></li>
                      <li class="list-group-item">User: <strong>Wajui</strong> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                    </div>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Description & technical specs</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Description: <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small></li>
                      <li class="list-group-item">Doc 1: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 2: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 3: <small><i class="fa fa-file-pdf-o"></i></small></li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h6>Client message: <strong class="green">Weka wega niwe weika!</strong></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h5>Your offer</h5>
                  <form>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="price"><strong>Amount</strong></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control"  />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="message"><strong>Message</strong></label>
                      </div>
                      <div class="col-md-10">
                        <textarea class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-danger pull-right"><i class="fa fa-bell"></i> Bid</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
      <div class="row projects-view">
        <div class="col-md-6">
          <article>
            <h3>mahgathe</h3>
            <div class="container">
              <div class="row">
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Front-end</b></li>
                    <li class="list-group-item">Check out <small><i class="fa fa-cart-plus"></i></small></li>
                    <li class="list-group-item">Responsive <small><i class="fa fa-desktop"></i><i class="fa fa-tablet"></i> <i class="fa fa-mobile-phone"></i></small></li>
                    <li class="list-group-item">Membership <small><i class="fa fa-users"></i></small></li>
                    <li class="list-group-item">Notifications <small><i class="fa fa-envelope"></i></small></li>
                  </ul>
                </div>
                <div class="col-md-4 nopadding">
                  <h5>Requirements</h5>
                  <div class="project-icon" style="background:url('{{asset('/avatar/avatar.jpg')}}') center no-repeat;"></div>
                  <h5 class="red">ClOSED</h5>
                  <p>On: <strong>11/12/2015</strong></p>
                </div>
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Back-end</b></li>
                    <li class="list-group-item">Cloud hosted <small><i class="fa fa-cloud-upload"></i></small></li>
                    <li class="list-group-item">Admin panel <small><i class="fa fa-dashboard"></i></small></li>
                    <li class="list-group-item">Back up <small><i class="fa fa-hdd-o"></i></small></li>
                    <li class="list-group-item">Bulk sms <small><i class="fa fa-envelope-open"></i></small></li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Avg price now <strong class="gold">KSH. 1,000</strong></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Schedule & User preference</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Start on: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Finish by: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Target: <strong>KSH. 100,000</strong></li>
                      <li class="list-group-item">User: <strong>Wajui</strong> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                    </div>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Description & technical specs</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Description: <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small></li>
                      <li class="list-group-item">Doc 1: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 2: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 3: <small><i class="fa fa-file-pdf-o"></i></small></li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h6>Client message: <strong class="green">Weka wega niwe weika!</strong></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h5>Your offer</h5>
                  <form>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="price"><strong>Amount</strong></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control"  />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="message"><strong>Message</strong></label>
                      </div>
                      <div class="col-md-10">
                        <textarea class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-danger pull-right" disabled><i class="fa fa-bell-slash"></i> Bid</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
        <div class="col-md-6">
          <article>
            <h3>mahgathe</h3>
            <div class="container">
              <div class="row">
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Front-end</b></li>
                    <li class="list-group-item">Check out <small><i class="fa fa-cart-plus"></i></small></li>
                    <li class="list-group-item">Responsive <small><i class="fa fa-desktop"></i><i class="fa fa-tablet"></i> <i class="fa fa-mobile-phone"></i></small></li>
                    <li class="list-group-item">Membership <small><i class="fa fa-users"></i></small></li>
                    <li class="list-group-item">Notifications <small><i class="fa fa-envelope"></i></small></li>
                  </ul>
                </div>
                <div class="col-md-4 nopadding">
                  <h5>Requirements</h5>
                  <div class="project-icon" style="background:url('{{asset('/avatar/avatar.jpg')}}') center no-repeat;"></div>
                  <h5>OPEN</h5>
                  <p>Time <strong>1:53:20</strong></p>
                </div>
                <div class="col-md-4 nopadding">
                  <ul class="list-group">
                    <li class="list-group-item"><b>Back-end</b></li>
                    <li class="list-group-item">Cloud hosted <small><i class="fa fa-cloud-upload"></i></small></li>
                    <li class="list-group-item">Admin panel <small><i class="fa fa-dashboard"></i></small></li>
                    <li class="list-group-item">Back up <small><i class="fa fa-hdd-o"></i></small></li>
                    <li class="list-group-item">Bulk sms <small><i class="fa fa-envelope-open"></i></small></li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h4>Avg price now <strong class="gold">KSH. 1,000</strong></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Schedule & User preference</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Start on: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Finish by: <strong>12/12/2015</strong></li>
                      <li class="list-group-item">Target: <strong>KSH. 100,000</strong></li>
                      <li class="list-group-item">User: <strong>Wajui</strong> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></li>
                    </div>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item list-header"><b>Description & technical specs</b></li>
                    <div class="no-display">
                      <li class="list-group-item">Description: <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small></li>
                      <li class="list-group-item">Doc 1: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 2: <small><i class="fa fa-file-pdf-o"></i></small></li>
                      <li class="list-group-item">Doc 3: <small><i class="fa fa-file-pdf-o"></i></small></li>
                    </div>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h6>Client message: <strong class="green">Weka wega niwe weika!</strong></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h5>Your offer</h5>
                  <form>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="price"><strong>Amount</strong></label>
                      </div>
                      <div class="col-md-10">
                        <input type="text" class="form-control"  />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <label for="message"><strong>Message</strong></label>
                      </div>
                      <div class="col-md-10">
                        <textarea class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-danger pull-right"><i class="fa fa-bell"></i> Bid</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
      <nav aria-label="Page navigation example">
  <ul class="pagination pull-right">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
    </div>
    <!-- /.container-fluid-->
@endsection
