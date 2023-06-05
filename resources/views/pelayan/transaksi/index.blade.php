@extends('pelayan/layout3.master')

@section('title', 'laporan')
@section('title2', 'index')
@section('laporanwaiter', 'active')

@section('konten')

    <div class="section-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-6 offset-md-1 mb-5 mt-5">
                    {{-- <a href="/kasir_laporan" class="btn btn-danger mb-3">Cetak laporan</a> --}}
                    <form action="/cari_order_kasir" method="POST">
                        @csrf
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Kode transaksi</span>
                            </div>
                            <input autocomplete="off" name="id" type="text" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            <div class="input-group-append">
                                <button class="btn btn-danger px-3" type="submit" id="button-addon2"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                @if (session('message'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                @endif
                @if ($transaksi !== 'abc')
                    <div class="col-md-7 offset-md-1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama menu</th>
                                    <th scope="col">harga</th>
                                    <th scope="col">jumlah</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->nama_masakan }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->jumlah * $item->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <div class="col-md-3 ">
                        <div class="row">
                            <form action="{{ route('kasir.bayar', $transaksi2->order_detail_id) }}" method="POST"
                                class="row">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <span>Total : Rp {{ $transaksi->sum('sub_total') }}</span>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Bayar</span>
                                            <input type="hidden" id="total" value="{{ $transaksi->sum('sub_total') }}"
                                                class="total" name="total_bayar">
                                        </div>
                                        <input autocomplete="off" name="jumlah_pembayaran" id="jumlah_pembayaran"
                                            onkeyup="hitung()" type="text" class="form-control"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Kembali</span>
                                        </div>
                                        <input type="text" class="form-control kembalian"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                            name="kembalian" id="kembalian" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-danger btn-block">Bayar</button>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <a href="/kasir" class="text-danger" id="bo">X Clear</a>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <!-- <div class="row">
                <div class="col-md-12 mb-5">
                  <h1 id="bo">Rekap laporan</h1>
                </div>
                <div class="col-md-6 offset-md-3 mt-3">
                  <div class="card">
                    <div class="card-body">
                      <form action="/rekap_laporan" class="row" method="GET">
                        <div class="form-group col-md-6">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            @if (request('dari') != '')
    <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" required value="{{ request('dari') }}">
@else
    <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" value="<?php echo date('Y-m-d'); ?>" id="aktif" required>
    @endif
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            @if (request('ke') != '')
    <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" required value="{{ request('ke') }}">
@else
    <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" value="<?php echo date('Y-m-d'); ?>" id="aktif" required>
    @endif
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-danger btn-sm btn-block">Rekap</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

    @endsection
    @push('page-scripts')
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
        {{-- <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script> --}}
    @endpush

    @push('after-scripts')
        <script>
            function hitung() {
                var total = $('#total').val();
                var jumlah_pembayaran = $('#jumlah_pembayaran').val();
                var kembalian = $('#kembalian').val();
                var bayar = $('#bayar').val();
                var a = jumlah_pembayaran - total;
                $('#kembalian').val(a);
                if (a < 0) {
                    $("#bayar").prop("disabled", true);
                } else {
                    $("#bayar").prop("disabled", false);
                }
            }

            // $(document).ready(function() {
            //     var t = $('#example').DataTable({
            //         "columnDefs": [{
            //             "searchable": false,
            //             "orderable": false,
            //             "targets": 0
            //         }],
            //         "order": [
            //             [1, 'asc']
            //         ]
            //     });
            //     t.on('order.dt search.dt', function() {
            //         t.column(0, {
            //             search: 'applied',
            //             order: 'applied'
            //         }).nodes().each(function(cell, i) {
            //             cell.innerHTML = i + 1;
            //         });
            //     }).draw();
            // });

            $(".confirm_script").click(function(e) {
                // id = e.target.dataset.id;
                swal({
                        title: 'Yakin ingin mencetak laporan ini?',
                        text: 'Data yang dicetak akan terdownload otomatis',
                        icon: 'info',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal('Data berhasil dicetak', {
                                icon: 'success',
                            });
                        } else {
                            swal('Your imaginary file is safe!');
                        }
                    });
            });
        </script>
    @endpush
