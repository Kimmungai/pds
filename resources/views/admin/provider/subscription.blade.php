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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
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
        <li class="breadcrumb-item active">My Subscription</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3" onclick="scrollToPayment(1)">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-star-half"></i>
              </div>
              <div class="mr-5"><big>Promotional</big></div>
              <p>FREE</p>
            </div>
            <a href="#" class="card-footer text-white clearfix small z-1">
              @if($membership->type==1)
              <span class="float-left"><span class="fa fa-fw fa-check-circle text-white"></span> Current Plan</span>
              @else
              <span class="float-left">Choose (Promotional)</span>
              @endif
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3" onclick="scrollToPayment(2)">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-star-o"></i>
              </div>
              <div class="mr-5"><big>Basic</big></div>
              <p>Ksh. 10,000</p>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              @if($membership->type==2)
              <span class="float-left"><span class="fa fa-fw fa-check-circle text-white"></span> Current Plan</span>
              @else
              <span class="float-left">Choose</span>
              @endif
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3" onclick="scrollToPayment(3)">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-star-half-full"></i>
              </div>
              <div class="mr-5"><big>Silver</big></div>
              <p>Ksh. 20,000</p>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              @if($membership->type==3)
              <span class="float-left"><span class="fa fa-fw fa-check-circle text-white"></span> Current Plan</span>
              @else
              <span class="float-left">Choose</span>
              @endif
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3" onclick="scrollToPayment(4)">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>
              </div>
              <div class="mr-5"><big>Gold</big></div>
              <p>Ksh. 35,000</p>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              @if($membership->type==4)
              <span class="float-left"><span class="fa fa-fw fa-check-circle text-white"></span> Current Plan</span>
              @else
              <span class="float-left">Choose</span>
              @endif
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div id="payment-section" class="card mb-3">
        <div class="card-header">
          <i class="fa fa-list"></i> Your subscription details</div>
        <div class="card-body">
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Subscription start date</label>
            <div class="col-10">
              <input class="form-control" type="text" value="{{$membership['start_date']}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Subscription end date</label>
            <div class="col-10">
              <input class="form-control" type="text" value="{{$membership['end_date']}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-search-input" class="col-2 col-form-label">Subscription validity period</label>
            <div class="col-10">
              <input class="form-control" type="text" value="{{\Carbon\Carbon::createFromTimeStamp(strtotime($membership['end_date']))->diffForHumans(null,true)}}" disabled>
            </div>
          </div>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-paypal"></i> Subscription renewal</div>
          <div class="card-body">
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Subscription Plan</label>
              <div class="col-10">
                <select class="form-control" id="selected-plan" onchange="scrollToPayment(this.value)">
                  <option value="1" disabled <?php if($membership->type==1){?>selected<?php }?>>Promotional plan (FREE)</option>
                  <option value="2" <?php if($membership->type==2){?>selected<?php }?>>Basic plan (Ksh. 10,000 / month)</option>
                  <option value="3" <?php if($membership->type==3){?>selected<?php }?>>Silver plan (Ksh. 20,000 / month)</option>
                  <option value="4" <?php if($membership->type==4){?>selected<?php }?>>Gold plan (Ksh. 35,000 / month)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label">Payment method</label>
              <div class="col-10">
                <select class="form-control">
                  <option value="1">Pay pal</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-2 col-form-label"></label>
              <div class="col-10">
                <div id="pay-btn"></div>
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <script>
    var pesa='';
      function scrollToPayment(type)
      {
        $('html,body').animate({scrollTop: $("#payment-section").offset().top },2000);
        if(type==1){$('#pay-btn').addClass('disabled');}else{$('#pay-btn').removeClass('disabled');}
        $('#selected-plan').val(type);

        if(type==2)
        {
          pesa='100.00';
        }
        else if(type==3)
        {
        pesa='200.00';
        }
        else if(type==4)
        {
          pesa='350.00';
        }
        else {
          pesa='';
        }

      }
    </script>
     <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
    paypal.Button.render({

        env: 'sandbox', // Or 'sandbox'

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
                            amount: { total: pesa, currency: 'USD' }
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
        }

    }, '#pay-btn');
</script>
<script>
function call_after_paypal_payment()
{
  alert('nyau');
}
</script>
@endsection
