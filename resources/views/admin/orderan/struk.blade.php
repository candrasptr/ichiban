<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ichiban - struk</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}

  <!-- CSS Libraries -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css')}}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css')}}"> --}}
</head>

<body>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                {{-- <img src="{{asset('assets/img/logo4.png')}}" style="width: 300px;" class="mb-2"><br> --}}
                <span id="me">
                    ICHIBANresto_Kedungwuluh <br>
                    Babakanjaya RT 17 RW 06, Padaherang <br>
                    Pangandaran, jawa barat
                </span>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-md-1">
                Kode order<br>
                Nama<br>
                No meja<br>
                Tanggal
            </div>
            <div class="col-md-2">
                : {{ $transaksi->id_transaksi }} <br>
                @foreach ($order as $item)
                : {{ $item->nama_pelanggan }} <br>
                : {{ $item->no_meja }} <br>
                @endforeach
                : {{ $transaksi->tanggal_transaksi }}
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col-md-12">
                <table class="table table-sm table-hover mb-5">
                    <thead>
                      <tr>
                        <th>Nama masakan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Sub total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($order as $item)
                      <tr>
                        <td>{{ $item->nama_masakan }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->harga*$item->jumlah }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                <hr>
            </div>
                
            <div class="col-md-4 mb-4 mt-2">
                <table class="table table-hover table-borderless">
                    <thead>
                      <tr>
                        <th>total_harga</th>
                        <td>Rp {{ $transaksi->total_bayar }}</td>
                      </tr>
                      <tr>
                        <th>Jumlah bayar</th>
                        <td>Rp {{ $transaksi->jumlah_pembayaran }}</td>
                      </tr>
                      <tr>
                        <th>Kembalian</th>
                        <td>Rp {{ $transaksi->kembalian }}</td>
                      </tr>
                    </thead>
                </table>
            </div>

            <div class="col-md-12 text-center">
                <span id="me">
                   ~ LUNAS ~
                </span> <br> <br>
                <span id="me">
                    Arigatou gozaimasu
                </span>
                <hr>
            </div>
        </div>
    </div>
  


  {{-- <footer class="main-footer bg-transparent mt-2">
    <div class="text-center text-secondary py-3">
      <img src="{{asset('assets/img/logo4.png')}}" style="width: 100px;" class="mb-2">
    </div></div>
  </footer> --}}


  <!-- General JS Scripts -->
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->


  <!-- Template JS File -->
  {{-- <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script> --}}
  <script src="{{ asset('jquery.min.js')}}"></script>
  <script src="{{ asset('owlcarousel/owl.carousel.min.js')}}"></script>


  
</body>
</html>
