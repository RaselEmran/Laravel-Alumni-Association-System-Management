<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
         <title>{{ isset($title) ? $title .' | '. get_option('site_title') :  get_option('site_title')}}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="icon" type="image/png" sizes="16x16" href="{{asset(get_option('favicon')?'storage/logo/'.get_option('favicon'):'favicon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/ionicons.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/parsley.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
     <link href="{{asset('backend/css/toastr.min.css')}}" rel="stylesheet">
     @stack('font.css')
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    
       @include('_partials.frontend.navbar')

       @section('content')
     @show

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About MeetUp.</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="get_option('fb')"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="get_option('twiter')"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="get_option('linkedin')"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#home-section"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#speakers-section"><span class="icon-long-arrow-right mr-2"></span>Schedule</a></li>
                <li><a href="#schedule-section"><span class="icon-long-arrow-right mr-2"></span>Speakers</a></li>
                <li><a href="#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
  
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">{{ get_option('address') }}</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ get_option('phone') }}</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ get_option('email') }}</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Design And Developed  <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://sattit.com" target="_blank">SATT IT</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('frontend/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('frontend/js/google-map.js')}}"></script>
  <script src="{{ asset('backend/js/parsley.min.js') }}"></script>
      <script type="text/javascript" src="{{asset('backend/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/plugins/select2.min.js')}}"></script>
  <script src="{{asset('backend/js/toastr.min.js')}}"></script>
  
  <script src="{{asset('frontend/js/fontend.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  @stack('font.scripts')
    
  </body>
</html>