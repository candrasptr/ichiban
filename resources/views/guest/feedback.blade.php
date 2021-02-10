<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ichiban - @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('node_modules/ionicons201/css/ionicons.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css')}}">

  <style>
    .btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}

.screen{
  position: relative;
}
.innerdiv {
  position: absolute;
  bottom: 0;
  right: 0;
}
  </style>

  @yield('page-styles')
</head>

<body style="background-image: url(../assets/img/background-feedback.png);  /* Full height */
  width: 100%; 

  /* Center and scale the image nicely */
  background-repeat: no-repeat;
  background-size: cover;">

    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent shadow-sm fixed-top mb-3">
          <img src="{{asset('assets/img/logo3.png')}}" style="width: 100px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon pt-1"><i class="fas fa-bars text-light"></i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav ml-3">
                <li class="nav-item">
                  <a class="nav-link text-light" href="/home" id="me">Hi, {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</span></a>
                </li>
              </ul>
            </div>
            </div>
          </nav>
          <br><br><br><br><br>
      </div>
    </div>
    <br><br><br><br><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-3" id="feedback-head">
          <h1 class="text-center text-danger py-3 mt-2" id="bo">FEEDBACK</h1>
        </div>
        <div class="col-md-12" id="feedback-body">
          <form class="row py-5 px-5" action="/feedback-confirm" method="POST">
            @csrf
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Kritik & saran</label>
                <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <a href="/home" class="btn btn-secondary float-right" id="feedback-button-back">Kembali</a>
              <button class="btn btn px-4 float-right mr-2" id="feedback-button">Submit</button>
            </div>
          </form>
          <br><br><br><br>
        </div>
      </div>
    </div>     

  <footer class="main-footer" id="feedback-body">
    <div class="text-center text-secondary py-3">
      <img src="{{asset('assets/img/logo4.png')}}" style="width: 100px;" class="mb-2"><br>
      Copyright &copy; 2020 Candra saputra 
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
  <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>

  <!-- Page Specific JS File -->
  @stack('page-scripts')

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  <script src="{{ asset('jquery.min.js')}}"></script>
  <script src="{{ asset('owlcarousel/owl.carousel.min.js')}}"></script>

  <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>
  @stack('after-scripts')
  

  
</body>
</html>