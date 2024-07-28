<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .color{
                color: #2e3135 !important;
        }
        .header .logo img {
        max-height: 51px !important;
        }
        </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>EXCELLENCE TECHNOLOGY CO.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="..." rel="icon">
  <link href="..." rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"
    integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg=="
    crossorigin="anonymous"></script>
  <!-- Vendor CSS Files -->
  <link href="{{asset('assetss/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assetss/css/main.css')}}" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->

  <!--  <div class="logog d-flex align-items-center">-->
  <!--    <a href="index.html" class="logo d-flex align-items-center">-->
  <!-- <h1>Logo<span>.</span></h1> -->
  <!--      <h1><img src="assets/img/logo2-defaultA.png" alt=""></h1>-->
  <!--    </a>-->
  <!--</div>-->
  <!-- ======= Header ======= -->

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center editSmall">
      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <!--<h1>Logo<span>.</span></h1> -->
        <h1><img src="{{asset('assetss/img/logo2-defaultA.png')}}" alt=""></h1>
      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#about">About us</a></li>
          <!-- <li><a href="vision.html">VISION</a></li> -->
          <!-- <li><a href="certificate.html">Certificate</a></li> -->
           <li><a href="#Jumbotron">Services</a></li>
          <li class="loggo">
            <a href="{{url('/')}}" class="logoo d-flex align-items-center">
              <img src="{{asset('assetss/img/logo2-defaultA.png')}}" alt="">
            </a>
          </li>

          <li><a href="#recent-blog-posts">Our Solution</a></li>
            <li><a href="#clients">Our Clients</a></li>
          <li><a href="#footer">Contact us</a></li>
          <!-- <li><a href="philosophy.html">Our Philosophy</a></li> -->
          <!-- <li><a href="environmental.html">Environmental </a></li> -->
          <!-- <li><a href="flash.html">Flash back</a></li> -->
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

    @yield('content')

    <!--  Whatsapp Icon  -->
    @isset($sites)


    <div class="whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{$sites->whatsapp}}" target=_blank>
            <i class="fa-brands fa-whatsapp"></i>
            <span>How may we help you?</span>
        </a>
    </div>
    @endisset
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Excellence <span>Technology co.</span></h3>
              <p>
                P.O.Box 305055 Riyadh 11361 <br>
                Riyadh, KSA<br><br>
                @isset($sites->phone)
                <strong>Phone: </strong>{{$sites->phone}}<br>
                @endisset
                @isset($sites->fax)
                <strong>Fax:</strong> {{$sites->fax}}<br>
                @endisset
                @isset($sites->email)
                <strong>Email:</strong> {{$sites->email}}<br>
                @endisset
              </p>
              <div class="social-links d-flex mt-3">
                @isset($sites->twitter)<a href="{{$sites->twitter}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>@endisset
                @isset($sites->facebook)<a href="{{$sites->facebook}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>@endisset
                @isset($sites->instagram)<a href="{{$sites->instagram}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>@endisset
                @isset($sites->linkedin)<a href="{{$sites->linkedin}}" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>@endisset
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="{{route('home')}}">Home</a></li>
              <li><a href="{{route('contactus')}}">Contact us</a></li>
              <li><a href="{{route('about')}}">About Us</a></li>
                       @isset($HyberLink->value)
             <li><a href="//{{$HyberLink->value}}">الخدمات الالكتروينة</a></li>
             @endisset
              <!-- <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li> -->
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Services</h4>
            <ul>
              <li><a href="{{route('services')}}">Services</a></li>
              <li><a href="{{route('ourclients')}}">Our Clients</a></li>
              <li><a href="{{route('oursolution')}}">Our Solution</a></li>
     

            </ul>
          </div>
          <!-- End footer links column-->
          @isset($sites)


          <div class="col-lg-4 about-img">
              {!! $sites->maps !!}
          </div>
          @endisset
          <!-- <div class="col-lg-2 col-md-3 footer-links">
            <h4>Questions</h4>
            <ul>
              <li><a href="vision.html">Vision & Mission</a></li>
              <li><a href="certificate.html">Qualification Certificate</a></li>
              <li><a href="health.html">Health and Safety</a></li>
              <li><a href="philosophy.html">Philosophy</a></li>
              <li><a href="environmental.html">Environmental ,Sustainable</a></li>
            </ul>
          </div> -->
          <!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>EXCELLENCE TECHNOLOGY CO</span></strong>. All Rights Reserved
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assetss/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assetss/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assetss/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assetss/js/main.js')}}"></script>
  @yield('script') 
</body>

</html>
