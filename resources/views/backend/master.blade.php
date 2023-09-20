<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Accounting &mdash; by Zidan</title>
<!-- Add these lines to your HTML layout -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{url('assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">


        @include('backend.fixed.header')




     @include('backend.fixed.sidebar')



      <!-- Main Content -->
      <div class="main-content">

       @yield('content')
       @include('sweetalert::alert')


      </div>

      @include('backend.fixed.footer')


    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{url('assets/modules/jquery.min.js')}}"></script>
  <script src="{{url('assets/modules/popper.js')}}"></script>
  <script src="{{url('assets/modules/tooltip.js')}}"></script>
  <script src="{{url('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{url('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{url('assets/modules/moment.min.js')}}"></script>
  <script src="{{url('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{url('assets/modules/jquery.sparkline.min.js"')}}></script>
  <script src="{{url('assets/modules/chart.min.js')}}"></script>
  <script src="{{url('assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
  <script src="{{url('assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{url('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{url('assets/js/page/index.js')}}"></script>
  <script src="{{asset('js/axios.min.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{url('assets/js/scripts.js')}}"></script>
  <script src="{{url('assets/js/custom.js')}}"></script>
</body>
</html>
