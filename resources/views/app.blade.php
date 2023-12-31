<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Url Shorter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">



  </head>
  
  <style>
    @yield("css")
  </style>
  <body>
    
<!-- النافذة المنبثقة Modal -->
<div class="modal fade" id="resultModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- عنوان النافذة المنبثقة -->
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Link Shorted Successfully') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- محتوى النافذة المنبثقة -->
            <div class="modal-body">
                <center>
                    <img src="" id="qrcode"/>
                    <br><br>
                    <div style="align-items:center;">
                        {{ __('Shorten Link') }}: <br><span id="shorted-link"><strong> </strong></span> <span class="cp" id="copylink" onclick="toastr()"><i class="fa-solid fa-copy fa-xl"></i></span>
                        <br><br>
                        {{ __('Statics Link') }}: <br><span id="Statics-link" color="#000"><strong></strong></span> <span class="cp" id="copystaticslink" onclick="toastr()"><i class="fa-solid fa-copy fa-xl"></i></span>
                    </div>
                </center>
            </div>

            <!-- Footer للنافذة المنبثقة - اختياري -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">{{ __('Done') }}</button>
            </div>

        </div>
    </div>
</div>

{{-- END OF DATA MODAL --}}

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid px-md-4	">
        <a class="navbar-brand" href="{{env('APP_URL')}}">{{__('ShortUrl')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> {{ __('Menu') }}
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{env('APP_URL')}}" class="nav-link">{{ __('Home') }}</a></li>

                <li class="nav-item cta mr-md-1">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('Change Language')}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                                {{ $properties['native'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item cta mr-md-1"><a href="{{env('APP_URL')}}" class="nav-link">{{ __('Short New Url') }}</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<!-- Start Header -->
<div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container">
        @yield("header")
    </div>
</div>
<!--end Header-->

<section class="ftco-section bg-light">
    <div class="container">
        @yield("content")
    </div>
</section>

<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2>{{ __('Subcribe to our Newsletter') }}</h2>
                    <p>{{ __('Stay on Touch') }}</p>
                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <div class="col-md-12">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="{{ __('Enter email address') }}">
                                    <input type="submit" value="{{ __('Subscribe') }}" class="submit px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ __('Url Shorter') }}</h2>
                    <p>{{ __('You can short full link to small one easly and fast') }}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>{{ __('All rights reserved') }}</p>
            </div>
        </div>
    </div>
</footer>

    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

 <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>

<script>
new ClipboardJS('.cp');
</script>
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('js/popper.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('js/aos.js')}}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('js/scrollax.min.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>
    
  </body>
</html>