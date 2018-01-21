<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Web design, Mobile app, E-learning, Website project, Blog project, Online bidding, Nairobi web Designers, Kenya online projects, service providers, bidders">
    <meta property="og:url"           content="{{url()->current()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Welcome to Web Designers Center" />
    <meta property="og:description"   content="Create your web, mobile app, blog.. projects and receive competitive prices from various tech companies in our system!" />
    <meta property="og:image"         content="{{ url('/img/logo.png') }}" />
    <meta name="description" content="Simply create a project, get bids from industry leaders, review each bidder’s profile and choose the best offer!">
    <meta name="author" content="Web Designers Center">

    <title>{{Route::currentRouteName()}} | Welcome to Web Designers Center </title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('/landing/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{asset('/landing/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('/landing/css/creative.css')}}" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset('/img/logo.png')}}" class="img-responsive" height="50" width="50" alt="Web Designers Center">Web Designers Center</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#how-it-works">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Find developers through our bidding system</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5 font-weight-bold text-uppercase">Simply create an e-commerce, mobile app, blog or other project, receive bids from market leading companies, review each bidder’s profile and choose the best offer!</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>
    <section class="bg-primary" id="how-it-works">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Process flow</h2>
            <hr class="light my-4">
              <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box  mx-auto">
                    <i class="fa fa-2x text-white fa-list-ul mb-3 sr-icons"></i>
                    <p class="mb-5 text-white">Post your project's requirements and schedule.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box  mx-auto">
                    <i class="fa fa-2x text-white fa-bell mb-3 sr-icons"></i>
                    <p class="mb-5 text-white">Receive bids from interested companies.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mt-0">
                  <div class="service-box  mx-auto">
                    <i class="fa fa-2x text-white fa-check-circle mb-3 sr-icons"></i>
                    <p class="mb-5 text-white">Evaluate the received offers and select the best one.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                  <div class="service-box mx-auto">
                    <i class="fa fa-2x text-white  fa-commenting mb-3 sr-icons"></i>
                    <p class="mb-5 text-white">Chat up your chosen bidder and finalize the execution plan.</p>
                  </div>
                </div>
              </div>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="/sign-up">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">At Your Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-globe text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Web Design</h3>
              <p class="text-muted mb-0">Our bidders are experienced in responsive and adaptable designs using modern techniques.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-search text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">S.E.O</h3>
              <p class="text-muted mb-0">Do you need to improve the visibility of your site? Get competitive offers from S.E.O experts to get the job done!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-camera text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Web Photography</h3>
              <p class="text-muted mb-0">We have bidders who specialize in website photography. They will ensure your photos are of high quality and convey necessary meaning to your users.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-graduation-cap text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">E-learning</h3>
              <p class="text-muted mb-0">Creating an e-learning portal can be daunting. Here you get to compare different service providers easily including checking out their portfolio.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Some of our Bidders</h2>
        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box  mx-auto">
              <img src="/landing/img/egalaxy.PNG" class="img-responsive rounded-circle mb-3" width="138" height="81"   alt="EgalaxyKenya">
              <p class="text-white text-left">
                EgalaxyKenya Offers A Cost Effective Solution For Companies And Individuals.
              </p>
              <a href="/provider-profile/3" class="btn btn-default">More..</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box  mx-auto">
              <img src="/landing/img/topedge.PNG" class="img-responsive rounded-circle mb-3" width="138" height="81"  alt="Top Edge" >
              <p class="text-white text-left">We Pride Ourselves In Helping Our Customers Grow Their Online Businesses.</p>
              <a href="/provider-profile/2" class="btn btn-default">More..</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center mt-0">
            <div class="service-box  mx-auto">
              <img src="/landing/img/pyneshoots.PNG" class="img-responsive rounded-circle mb-3" width="138" height="81"  alt="Pyne shoots">
              <p class="text-white text-left">Pyneshoots Works To Capture The Beauty Of The World.</p>
              <a href="/provider-profile/1" class="btn btn-default">More..</a>
            </div>
          </div>
        </div>
        <a href="/service-provider-sign-up" class="btn btn-danger mb-0 mt-5 pull-right">Become a bidder</a>
      </div>
    </section>
    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="/landing/img/portfolio/fullsize/1.PNG">
              <img class="img-fluid" src="/landing/img/portfolio/thumbnails/1.PNG" height="175" width="100%" alt="Project one">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    E-commerce
                  </div>
                  <div class="project-name">
                    E-commerce Project
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="/landing/img/portfolio/fullsize/2.PNG">
              <img class="img-fluid" src="/landing/img/portfolio/thumbnails/2.PNG" height="175" width="100%" alt="Project two">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Mobile App
                  </div>
                  <div class="project-name">
                    Church Mobile Application
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="/landing/img/portfolio/fullsize/3.PNG">
              <img class="img-fluid" src="/landing/img/portfolio/thumbnails/3.PNG" height="175" width="100%" alt="Project three">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Website
                  </div>
                  <div class="project-name">
                    E-learning design and packaging
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <a href="/projects" class="btn btn-primary pull-right">View more projects</a>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Want to learn about our service even more? That's great! Send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mr-auto text-center">
            <img src="img/map.jpg" width="100%" class="img-responsive mt-5 rounded-circle" alt="@ your service">
          </div>
          <div class="col-lg-6 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <article>
             <form action="/make-enquiry" method="POST" >
               {{csrf_field()}}
                <h5>Contact Form</h5>
                <div class="row">
                  <div class="col-md-2">
                    <label>Name<span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-10">
                    <input name="prospective_name" type="text" class="form-control" value="{{old('prospective_name')}}" required/>
                    @if ($errors->has('prospective_name'))
                      <span class="text-danger">
                          <strong>{{ $errors->first('prospective_name') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-2">
                    <label>Subject<span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-10">
                    <select name="prospective_subject" class="form-control">
                      <option <?php if(old('prospective_subject')=='General enquiry'){?>selected<?php }?>>General enquiry</option>
                      <option <?php if(old('prospective_subject')=='Bidding'){?>selected<?php }?>>Bidding</option>
                      <option <?php if(old('prospective_subject')=='Registration'){?>selected<?php }?>>Registration</option>
                      <option <?php if(old('prospective_subject')=='Service Provider Registration'){?>selected<?php }?>>Service Provider Registration</option>
                    </select>
                    @if ($errors->has('prospective_subject'))
                      <span class="text-danger">
                          <strong>{{ $errors->first('prospective_subject') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-2">
                    <label>Email<span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-10">
                    <input name="prospective_email" type="email" class="form-control" value="{{old('prospective_email')}}" required/>
                    @if ($errors->has('prospective_email'))
                      <span class="text-danger">
                          <strong>{{ $errors->first('prospective_email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-2">
                    <label>Phone</label>
                  </div>
                  <div class="col-md-10">
                    <input name="prospective_phone" type="text" class="form-control" value="{{old('prospective_phone')}}" />
                    @if ($errors->has('prospective_phone'))
                      <span class="text-danger">
                          <strong>{{ $errors->first('prospective_phone') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-2">
                    <label>Message<span class="text-danger">*</span></label>
                  </div>
                  <div class="col-md-10">
                    <textarea name="prospective_message" class="form-control" required>{{old('prospective_message')}}</textarea>
                    @if ($errors->has('prospective_message'))
                      <span class="text-danger">
                          <strong>{{ $errors->first('prospective_message') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">

                  </div>
                  <div class="col-md-10">
                    <button class="btn btn-primary mt-4" type="submit"><span class="fa fa-send"></span> Send</button>
                </div>
              </form>
            </article>
          </div>
        </div>
      </div>
    </section>
    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p>Copyright <span class="fa fa-copyright"></span> {{ date('Y') }} webdesignerscenter.com</p>
          </div>
          <div class="col-md-6">
            <ul class="list-inline pull-right">
              <li class="list-inline-item"><a href="/about-us" class="text-white">About</a></li>
              <li class="list-inline-item"><a href="{{asset('/agreement/general-terms-conditions.pdf')}}" class="text-white" target="_blank">Terms & conditions</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pull-right social">
            <ul class="list-inline pull-right">
              <li class="list-inline-item"><a class="text-white" href="https://www.linkedin.com/company/13608183/" target="_blank" title="linkedin"><big><span class="fa fa-linkedin-square"></span></big></a></li>
              <li class="list-inline-item"><a class="text-white" href="https://www.facebook.com/Web-Designers-Center-1908267229501969/" target="_blank" title="Facebook"><big><span class="fa fa-facebook-square"></span></big></a></li>
              <li class="list-inline-item"><a class="text-white" href="https://twitter.com/webDcenter" target="_blank" title="Twitter"><big><span class="fa fa-twitter-square"></span></big></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('/landing/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('/landing/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('/landing/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('/landing/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('/landing/js/creative.min.js')}}"></script>
    @if (Session::has('update_success'))
    <script>
      $( document ).ready(function() {
        alert("{{ Session::get('update_success') }}")
      });
    </script>
    @endif
    @if (Session::has('update_error'))
          <script>
          $( document ).ready(function() {
            alert("{{ Session::get('update_error') }}")
          });
        </script>
    @endif

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109033027-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-109033027-1');
    </script>

  </body>

</html>
