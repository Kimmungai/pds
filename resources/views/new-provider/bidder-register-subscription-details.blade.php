@extends('layouts.main')

@section('content')
<div class="container">
<div class="row">
<nav class="navbar-inverse pds-menu-bar">
<div class="container">
  <div class="navbar-header">
    <a class="navbar-brand visible-sm visible-xs" href="/">Home</a>
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
      <li class="visible-xs-block"><a href="/service-provider-sign-up">Become a service provider</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/new-project">New Project</a></li>
      @if(Auth::user())
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
        <li class="active"><a href="/sign-up"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
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
        <p>Choose a membership plan and get started</p>
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
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><span class="fa">1</span><p>Contacts <br /><span class="fa fa-check"></span></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white inactive-step"><span class="fa">2</span><p>Company <br /><span class="fa fa-check"></span></p></div></div>
          <div class="col-xs-4"><div class="desired-feature dark-bg white"><span class="fa">3</span><p>Subscribe</p></div></div>
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
            <div class="row">
              <div class="col-xs-3  project-btn">
                <a class="btn btn-primary " href="/provider-company-registration-back"><span class="fa  fa-chevron-left "></span> Back</a>
              </div>
              <div class="col-xs-3 col-xs-offset-6 project-btn">
                @if(Session::has('finish_registration'))
                <a class="btn btn-primary" href="/profile">Finish Registration</a>
                @else
                <a class="btn btn-primary" href="#" onclick="alert('PLease select a membership plan first')">Finish Registration</a>
                @endif
              </div>
            </div>
            <div class="row">
              <p class="p-center">Please select one of the plans. For paid plans, all payments will be processed through paypal</p>
              <p class="payment-icons p-center"><span class="fa fa-cc-paypal"></span> <span class="fa fa-cc-visa"></span> <span class="fa fa-cc-mastercard"></span></p>

              <div class="col-md-6">
                <div class="membership-plan">
                  <form method="post" action="/provider-membership" />
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="1" />
                    <h5>Promotional
                      @if (Session::has('plan') && Session('plan')==1)
                      <span class="fa fa-check-circle green"></span>
                      @endif
                    </h5>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Feature</th><td>Details</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>Bidding Access</th><td>2 bids per day</td>
                          </tr>
                          <tr>
                            <th>Portfolio Advertising</th><td><span class="fa fa-close red"></span></td>
                          </tr>
                          <tr>
                            <th>Project alerts</th><td><span class="fa fa-check green"></span></td>
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
                    <span class="fa fa-check-circle green"></span>
                    @endif
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Feature</th><td>Details</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Bidding access</th><td>7 bids per day</td>
                        </tr>
                        <tr>
                          <th>Portfolio Advertising</th><td>up to 5 projects</td>
                        </tr>
                        <tr>
                          <th>Project Alerts</th><td><span class="fa fa-check green"></span></td>
                        </tr>
                        <tr>
                          <th>Price</th><td><strong>$ 100</strong></td>
                        </tr>
                        <tr>
                          <th>Billing cycle</th>
                          <td>
                            <select name="billing-cycle" class="form-control">
                              <option value="1" <?php if(session('billing_cycle') && session('billing_cycle')==1){?>selected<?php }?>>Monthly</option>
                              <option value="4" <?php if(session('billing_cycle') && session('billing_cycle')==4){?>selected<?php }?>>Quarterly</option>
                              <option value="6" <?php if(session('billing_cycle') && session('billing_cycle')==6){?>selected<?php }?>>Half year</option>
                              <option value="12" <?php if(session('billing_cycle') && session('billing_cycle')==12){?>selected<?php }?>>Annually</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  @if((Session::has('plan') && Session('plan')!=2) || !Session::has('plan'))
                    <button class="btn btn-primary form-control green-bg inactive-step" type="submit"> Subscribe ($ 100)</button>
                  @else
                    <button class="btn btn-primary form-control green-bg" type="submit"> Current plan ($ 100)</button>
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
                    <span class="fa fa-check-circle green"></span>
                    @endif
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Feature</th><td>Details</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Bidding access</th><td>14 bids per day</td>
                        </tr>
                        <tr>
                          <th>Portfolio Advertising</th><td>Up to 10 projects</td>
                        </tr>
                        <tr>
                          <th>Project Alerts</th><td><span class="fa fa-check green"></span></td>
                        </tr>
                        <tr>
                          <th>Price</th><td><strong>$ 200</strong></td>
                        </tr>
                        <tr>
                          <th>Billing cycle</th>
                          <td>
                            <select name="billing-cycle" class="form-control">
                              <option value="1" <?php if(session('billing_cycle') && session('billing_cycle')==1){?>selected<?php }?>>Monthly</option>
                              <option value="4" <?php if(session('billing_cycle') && session('billing_cycle')==4){?>selected<?php }?>>Quarterly</option>
                              <option value="6" <?php if(session('billing_cycle') && session('billing_cycle')==6){?>selected<?php }?>>Half year</option>
                              <option value="12" <?php if(session('billing_cycle') && session('billing_cycle')==12){?>selected<?php }?>>Annually</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  @if((Session::has('plan') && Session('plan')!=3) || !Session::has('plan'))
                    <button class="btn btn-primary form-control green-bg inactive-step" type="submit"> Subscribe ($ 200)</button>
                  @else
                    <button class="btn btn-primary form-control green-bg" type="submit"> Current plan ($ 200)</button>
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
                    <span class="fa fa-check-circle green"></span>
                    @endif
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Feature</th><td>Details</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Bidding access</th><td>Unlimited</td>
                        </tr>
                        <tr>
                          <th>Portfolio Advertising</th><td>Unlimited</td>
                        </tr>
                        <tr>
                          <th>Project Alerts</th><td><span class="fa fa-check green"></span></td>
                        </tr>
                        <tr>
                          <th>Price</th><td><strong>$ 350</strong></td>
                        </tr>
                        <tr>
                          <th>Billing cycle</th>
                          <td>
                            <select name="billing-cycle" class="form-control">
                              <option value="1" <?php if(session('billing_cycle') && session('billing_cycle')==1){?>selected<?php }?>>Monthly</option>
                              <option value="4" <?php if(session('billing_cycle') && session('billing_cycle')==4){?>selected<?php }?>>Quarterly</option>
                              <option value="6" <?php if(session('billing_cycle') && session('billing_cycle')==6){?>selected<?php }?>>Half year</option>
                              <option value="12" <?php if(session('billing_cycle') && session('billing_cycle')==12){?>selected<?php }?>>Annually</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  @if((Session::has('plan') && Session('plan')!=4) || !Session::has('plan'))
                    <button class="btn btn-primary form-control green-bg inactive-step" type="submit"> Subscribe ($ 350)</button>
                  @else
                    <button class="btn btn-primary form-control green-bg" type="submit"> Current plan ($ 350)</button>
                  @endif
                </div>
              </form>
              </div>
            </div>
            @if (Session::has('plan') && Session('plan')==2)
            <div class="row">
              <div class="col-xs-12 seleted-plan">
                <hr>
                <div class="panel panel-success">
                  <div class="panel-heading"><span class="fa fa-fw fa-star-o"></span> Basic plan</div>
                  <div class="panel-body">
                    <ul class="list-group plan-info">
                      <li class="list-group-item">Bidding limit: <strong>7 per day</strong></li>
                      <li class="list-group-item">Portfolio advertisement: <strong>Up to 5 projects</strong></li>
                      <li class="list-group-item">Latest projects view: <strong>Unlimited</strong></li>
                      <li class="list-group-item">New projects alerts: <strong>Yes</strong></li>
                    </ul>
                    <div id="pay-btn"></div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if (Session::has('plan') && Session('plan')==3)
            <div class="row">
              <div class="col-xs-12 seleted-plan">
                <hr>
                <div class="panel panel-success">
                  <div class="panel-heading"><span class="fa fa-fw fa-star-half-full"></span> Silver plan</div>
                  <div class="panel-body">
                    <ul class="list-group plan-info">
                      <li class="list-group-item">Bidding limit: <strong>7 per day</strong></li>
                      <li class="list-group-item">Portfolio advertisement: <strong>Up to 10 projects</strong></li>
                      <li class="list-group-item">Latest projects view: <strong>Unlimited</strong></li>
                      <li class="list-group-item">New projects alerts: <strong>Yes</strong></li>
                    </ul>
                    <div id="pay-btn"></div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if (Session::has('plan') && Session('plan')==4)
            <div class="row">
              <div class="col-xs-12 seleted-plan">
                <hr>
                <div class="panel panel-success">
                  <div class="panel-heading"><span class="fa fa-fw fa-star"></span> Gold plan</div>
                  <div class="panel-body">
                    <ul class="list-group plan-info">
                      <li class="list-group-item">Bidding limit: <strong>Unlimited</strong></li>
                      <li class="list-group-item">Portfolio advertisement: <strong>All  projects</strong></li>
                      <li class="list-group-item">Latest projects view: <strong>Unlimited</strong></li>
                      <li class="list-group-item">New projects alerts: <strong>Yes</strong></li>
                    </ul>
                    <div id="pay-btn"></div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <div class="row">
              <div class="col-xs-3  project-btn">
                <a class="btn btn-primary " href="/provider-company-registration-back"><span class="fa  fa-chevron-left "></span> Back</a>
              </div>
              <div class="col-xs-3 col-xs-offset-6 project-btn">
                @if(Session::has('finish_registration'))
                <a class="btn btn-primary" href="/profile">Finish Registration</a>
                @else
                <a class="btn btn-primary" href="#" onclick="alert('PLease select a membership plan first')">Finish Registration</a>
                @endif
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
@if (Session::has('plan'))
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({

    env: 'production', // Or 'sandbox'

    client: {
        sandbox:    'AVmtFmCtIYmW-wowsvx_G77friO7Y0kD8sHa3j1wpw-2BinKjbq1tFqUgSnPCOzp6K_h-lj8t4_DbYUe',
        production: 'AVmHEmP0XXrZ6g39PR8jQLCtkU6z3sI7g_8dAHE7Zieeh8OMO_Gam1F-IF9H51GnieOMPQxUZE_K0qxw'
    },


    commit: true, // Show a 'Pay Now' button

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: { total: {{session('total_subscription_fee')}}, currency: 'USD' }
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {

            // The payment is complete!
            // You can now show a confirmation message to the customer
            call_after_paypal_payment();
        });
    },
    onCancel: function(data, actions) {
        // Show a cancel page or return to cart
    }


}, '#pay-btn');
</script>
<script>
$('html,body').animate({scrollTop: $(".seleted-plan").offset().top },2000);
</script>
<script>
function call_after_paypal_payment()
{
  $.get("/provider-renew-membership",
        {
          choosen_plan:{{session('plan')}},
          billing_cycle:{{session('billing_cycle')}},
          total_price:{{session('total_subscription_fee')}}
        },
        function(data,status){
          if(data==1)
          {
            var goOn=confirm('Payment successful. Your account is now ready');
            if(goOn)
            {
              window.open('/profile','_self');
            }
            else {
              location.reload();
            }
          }
      });
}
</script>
@endif

@endsection
