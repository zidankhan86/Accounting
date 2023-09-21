<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accounting</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset ('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset ('frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{asset ('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset ('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset ('frontend/css/magnific-popup.css') }}">
    <script src="{{asset('frontend/js/axios.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset ('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{asset ('frontend/css/style.css') }}">
  </head>
  <body>
    <!-- loader -->
  {{-- <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
</svg>
</div> --}}




      @include('frontend\component\nav')
    <!-- END nav -->





    @yield('content')







    @include('frontend\component\footer')





  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('frontend/js/jquery.min.js') }}"></script>
  <script src="{{asset ('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{asset ('frontend/js/popper.min.js') }}"></script>
  <script src="{{asset ('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{asset ('frontend/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{asset ('frontend/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{asset ('frontend/js/jquery.stellar.min.js') }}"></script>
  <script src="{{asset ('frontend/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{asset ('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{asset ('frontend/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{asset ('frontend/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset ('frontend/js/google-map.js') }}"></script>
  <script src="{{asset ('frontend/js/main.js') }}"></script>

  </body>
</html>
