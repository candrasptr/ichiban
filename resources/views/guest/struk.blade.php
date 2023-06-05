<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Tampebako - struk</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">

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

        .screen {
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

<body>

    {{-- navbar --}}
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent shadow-sm mb-5">
                <img src="{{ asset('assets/img/logo5.png') }}" style="width: 200px;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon pt-1"><i class="fas fa-bars text-light"></i></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ml-3">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/home" id="me">Hi,
                                {{ Auth::guard('pelanggan')->user()->nama_pelanggan }}</span></a>
                        </li>
                    </ul>
                </div>
        </div>
        </nav>
    </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                @if ($snap)
                    <h5 class="text-center" id="bo">Pembayaran Lunas</h5>
                @else
                    <h5 class="text-center" id="bo">Segera selesaikan pembayaran</h5>
                @endif
            </div>
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-transparent row" id="bo">
                        <div class="col-md-6 mt-2">
                            Tampebako Coffee
                        </div>
                        <div class="col-md-6 text-right">
                            <a href=""><img src="{{ asset('assets/img/logo5.png') }}" style="width: 150px;"></a>
                        </div>
                    </div>
                    @if ($snap)
                        <div class="card-body row">
                            <div class="col-md-12">
                                <span class="card-text" id="re">Kode transaksi</span><br>
                                <span class="card-text" id="bo">{{ $transaksi->id_transaksi }}</span>
                            </div>
                            <div class="col-md-6 my-3">
                                <span class="card-text" id="re">Total pembayaran</span><br>
                                <span class="card-text" id="bo">{{ $transaksi->total_bayar }}</span>
                            </div>
                        </div>
                    @else
                        <div class="card-body row">
                            <div class="col-md-12">
                                <span class="card-text" id="re">Kode transaksi</span><br>
                                <span class="card-text" id="bo">{{ $transaksi->id_transaksi }}</span>
                            </div>
                            <div class="col-md-6 my-3">
                                <span class="card-text" id="re">Total pembayaran</span><br>
                                <span class="card-text text-danger" id="bo">{{ $transaksi->total_bayar }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3 offset-md-3">
                <a href="/home" class="btn btn-outline-danger btn-block text-danger my-3" id="me">Pesan
                    lagi</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('order.batal', $transaksi->order_detail_id) }}"
                    class="btn btn-danger btn-block text-light my-3" id="me">Batalkan pesanan</a>
            </div>
            <div class="col-md-6 offset-md-3 text-center">
                @if ($snap)
                <a href="{{ route('nota_lunas', $transaksi->order_detail_id) }}" class="text-danger" id="me"><i
                  class="fas fa-file-pdf"></i> Nota Pembayaran</a>
                @else
                    <a href="{{ route('nota', $transaksi->order_detail_id) }}" class="text-danger" id="me"><i
                            class="fas fa-file-pdf"></i> Nota kode transaksi</a>
                @endif
            </div>
            <div class="col-md-6 offset-md-3 my-3">
                <span id="bo">Detail pesanan</span>
                <div class="row my-3">
                    @foreach ($order as $item)
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('assets/img/produk/' . $item->gambar_masakan) }}"
                                style="width: 100px;">
                        </div>
                        <div class="col-md-4 my-auto">
                            <span id="me" class="text-secondary">{{ $item->jumlah }}x
                                {{ $item->nama_masakan }}</span>
                        </div>
                        <div class="col-md-4 offset-md-2 my-auto text-right">
                            <span id="me" class="text-secondary">Rp {{ $item->harga * $item->jumlah }}</span>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    <footer class="main-footer bg-transparent mt-5">
        <div class="text-center text-secondary py-3">
            <img src="{{ asset('assets/img/logo5.png') }}" style="width: 100px;" class="mb-2"><br>
            Copyright &copy; 2023
        </div>
        </div>
    </footer>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->


    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('jquery.min.js') }}"></script>
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>



</body>

</html>
