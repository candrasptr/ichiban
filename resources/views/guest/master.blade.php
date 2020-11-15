<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ config('app.name') }} - @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css')}}">

  <!-- Template CSS -->
<!--   <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}"> -->

  @yield('page-styles')
</head>

<body style="background-image: url(../assets/img/background.png);  /* Full height */
  width: 100%; 

  /* Center and scale the image nicely */
  background-repeat: no-repeat;
  background-size: cover;">

    <div class="row">
      <div class="col-md-12">
        @include('guest.header')
      </div>
    </div>

    @yield('konten')      

  <footer class="main-footer bg-dark mt-5">
    <div class="text-center text-light py-3">
      <img src="{{asset('assets/img/logo3.png')}}" style="width: 100px;" class="mb-2"><br>
      Copyright &copy; 2020 <i class="fas fa-copyright"></i> Candra saputra 
    </div></div>
  </footer>

  @stack('before-scripts')
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  @stack('page-scripts')

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  <script src="{{ asset('jquery.min.js')}}"></script>
  <script src="{{ asset('owlcarousel/owl.carousel.min.js')}}"></script>

  @stack('after-scripts')

  
</body>
</html>
