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
  <div class="container"><div class="row"><h2>Service Subscription</h2></div></div>
  <div class="container section-decoration">
    <div class="row">
      <div class="strip"></div>
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">1</i><p>Contacts <br /><i class="fa fa-check"></i></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><i class="fa">2</i><p>Company <br /><i class="fa fa-check"></i></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><i class="fa">3</i><p>Subscribe</p></div></div>
        </div>
        <div class="row">
          <article class="subscription-area">
            <h5>Service Subscription Form</h5>
            @if (Session::has('update_success'))
              <div class="alert alert-success">
                  {{ Session::get('update_success') }}
              </div>
            @endif
            @if (Session::has('plan_success'))
              <div class="alert alert-success">
                  {{ Session::get('plan_success') }}
              </div>
            @endif
            @if (Session::has('plan_error'))
              <div class="alert alert-danger">
                  {{ Session::get('plan_error') }}
              </div>
            @endif
            <p>Please select one of the plans. For paid plans, all payments will be processed through paypal</p>
            <p class="payment-icons"><i class="fa fa-cc-paypal"></i> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i></p>
            <div class="row">
              <div class="col-md-6">
                <div class="membership-plan">
                  <form method="post" action="/provider-membership" />
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="1" />
                    <h5>Promotional
                      @if (Session::has('plan') && Session('plan')==1)
                      <i class="fa fa-check-circle green"></i>
                      @endif
                    </h5>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Feature</th><td>Present?</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>Bidding access</th><td><i class="fa fa-check green"></i></td>
                          </tr>
                          <tr>
                            <th>Advertising space</th><td><i class="fa fa-check green"></i></td>
                          </tr>
                          <tr>
                            <th>Unlimited bidding</th><td><i class="fa fa-close red"></i></td>
                          </tr>
                          <tr>
                            <th>Validity</th><td><strong>3 months</strong></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    @if((Session::has('plan') && Session('plan')!=1) || !Session::has('plan'))
                      <button class="btn btn-primary form-control green-bg inactive-step" type="submit"> Subscribe (FREE)</button>
                    @else
                      <button class="btn btn-primary form-control green-bg" type="submit"> Current plan (FREE)</button>
                    @endif
                  </div>
                </div>
              </form>
              <div class="col-md-6">
                <div class="membership-plan">
                  <form method="post" action="/provider-membership" />
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="2" />
                  <h5>Basic
                    @if (Session::has('plan') && Session('plan')==2)
                    <i class="fa fa-check-circle green"></i>
                    @endif
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Feature</th><td>Present?</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Bidding access</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Advertising space</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Unlimited bidding</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Billing cycle</th><td><strong>Monthly</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  @if((Session::has('plan') && Session('plan')!=2) || !Session::has('plan'))
                    <button class="btn btn-primary form-control green-bg inactive-step paypal-button" type="submit"> Subscribe (Ksh. 10,000)</button>
                  @else
                    <button class="btn btn-primary form-control green-bg" type="submit"> Current plan (Ksh. 10,000)</button>
                  @endif
                </form>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="membership-plan">
                  <form method="post" action="/provider-membership" />
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="3" />
                  <h5>Silver
                    @if (Session::has('plan') && Session('plan')==3)
                    <i class="fa fa-check-circle green"></i>
                    @endif
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Feature</th><td>Present?</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Bidding access</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Advertising space</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Unlimited bidding</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Billing cycle</th><td><strong>Quarterly</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  @if((Session::has('plan') && Session('plan')!=3) || !Session::has('plan'))
                    <button class="btn btn-primary form-control green-bg inactive-step" type="submit"> Subscribe (Ksh. 27,500)</button>
                  @else
                    <button class="btn btn-primary form-control green-bg" type="submit"> Current plan (Ksh. 27,500)</button>
                  @endif
                </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="membership-plan">
                  <form method="post" action="/provider-membership" />
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="4" />
                  <h5>Gold
                    @if (Session::has('plan') && Session('plan')==4)
                    <i class="fa fa-check-circle green"></i>
                    @endif
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Feature</th><td>Present?</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Bidding access</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Advertising space</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Unlimited bidding</th><td><i class="fa fa-check green"></i></td>
                        </tr>
                        <tr>
                          <th>Billing cycle</th><td><strong>Yearly</strong></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  @if((Session::has('plan') && Session('plan')!=4) || !Session::has('plan'))
                    <button class="btn btn-primary form-control green-bg inactive-step" type="submit"> Subscribe (Ksh. 100,000)</button>
                  @else
                    <button class="btn btn-primary form-control green-bg" type="submit"> Current plan (Ksh. 100,000)</button>
                  @endif
                </div>
              </form>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3  project-btn">
                <a class="btn btn-primary " href="/provider-company-registration-back"><i class="fa  fa-chevron-left "></i> Back</a>
              </div>
              <div class="col-xs-3 col-xs-offset-6 project-btn">
                @if(Session::has('finish_registration'))
                <a class="btn btn-primary" href="/profile">Finish Registration</a>
                @else
                <a class="btn btn-primary" href="" onclick="alert('PLease select a membership plan first')">Finish Registration</a>
                @endif
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
        paypal.Button.render({

            env: 'sandbox', // Or 'sandbox',

            client:{
              sandbox:    'access_token$sandbox$6vs789sbz2445hvc$bb5f4a60e8b5ef9711eea999f819c10f',
              production: 'access_token$production$6csgx2862fq2nw4v$8845a9dbc9ca548b4c8ffe38754d5956'
            },

            commit: true, // Show a 'Pay Now' button

            style: {
                color: 'gold',
                size: 'small'
            },

            payment: function(data, actions) {
                    return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '1.00', currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            onAuthorize: function(data, actions) {
              return actions.payment.execute().then(function(payment) {
                alert('how good');
              });
            },

            onCancel: function(data, actions) {
                /*
                 * Buyer cancelled the payment
                 */
            },

            onError: function(err) {
                /*
                 * An error occurred during the transaction
                 */
            }

        }, '.paypal-button');
    </script>
@endsection
