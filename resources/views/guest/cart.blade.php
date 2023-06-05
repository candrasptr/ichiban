@extends('guest.master')
@section('title', 'home')

@section('konten')
    @if ($order)
        <div class="row pb-5">
            <div class="text-center col-md-10 offset-md-1">
                <h1 class="text-dark my-5" id="bo">PESANAN</h1>
            </div>

            {{-- Keranjang --}}
            <div class="col-lg-7 offset-lg-1">
                <div class="row shadow p-3" style="background-color: #ffffff;" id="card-cart">
                    @foreach ($order as $item)
                        <div class="col-md-3">
                            <img src="{{ asset('assets/img/produk/' . $item->gambar_masakan) }}" style="width: 150px;"
                                alt="...">
                        </div>
                        <div class="col-md-4 my-auto">
                            <span id="me">{{ $item->nama_masakan }}</span><br>
                            <span id="me" class="text-dark">Rp {{ $item->harga }}</span>
                        </div>
                        <div class="col-md-4 offset-md-1 my-auto ">
                            <form action="/order_update" class="row justify-content-end" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id_order }}" name="id_order">
                                <div class="input-group col-md-8 ml-2">
                                    <div class="input-group-prepend my-auto mr-2">
                                        <a href="{{ route('order.hapus', $item->id_order) }}" class=""
                                            id="button-cart"><i class="fas fa-trash"></i></a>
                                    </div>
                                    <input type="number" class="form-control text-center" value="{{ $item->jumlah }}"
                                        maxlength="4" size="4" id="input" name="jumlah">
                                    <div class="input-group-append">
                                        <button id="button-cart" type="submit" class="btn btn-transparent"
                                            data-toggle="tooltip" data-placement="top" title="Update"><i
                                                class="fas fa-edit"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 my-4 garis-bawah"></div>
                    @endforeach
                </div>
                <div class="col-md-4 my-4 offset-lg-8">
                <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block btn-dark py-2"><i
                class="fas fa-shopping-cart fas-2x"></i> Lanjutkan Belanja</a>
                </div>
            </div>

            {{-- Card pembayaran --}}
            <div class="col-md-3">
                <div class="card shadow" id="card-cart">
                    <div class="card-body">
                        <form action="/order_bayar" id="payment-form" class="row" method="POST">
                            @csrf
                            @php($no = 1)
                            @foreach ($order as $item)
                                <input type="hidden" value="{{ $item->id_order }}" name="id_order[{{ $no }}]">
                                <input type="hidden" name="idproduk[{{ $no }}]" id="idproduk"
                                    value="{{ $item->id_masakan }}">
                                <input type="hidden" name="namaproduk[{{ $no }}]" id="namaproduk"
                                    value="{{ $item->nama_masakan }}">
                                <input type="hidden" name="qty[{{ $no }}]" id="qty"
                                    value="{{ $item->jumlah }}">
                                <input type="hidden" name="harga[{{ $no }}]" id="harga"
                                    value="{{ $item->harga }}">
                                @php($no++)
                            @endforeach
                            <div class="col-md-12 mb-3">
                                <span id="bo">Ringkasan pesanan</span>
                            </div>
                            <div class="col-md-6">
                                <span id="me">Total harga :</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <span class="text-dark" id="bo">Rp. {{ $order->sum('sub_total') }}</span>
                            </div> <input type="hidden" id="total" value="{{ $order->sum('sub_total') }}"
                                class="total" name="total_bayar">
                            <div class="col-md-12">
                                <hr>
                            </div>
                            @if ($snapToken)
                                <input type="hidden" id="snaptoken" name="snaptoken" value="{{ $snapToken }}">
                            @else
                                <input type="hidden" id="snaptoken" name="snaptoken" value="">
                            @endif
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-sm btn-block btn-danger py-2" id="bayar"><i
                                        class="fas fa-shopping-cart fas-2x"></i> Bayar Cash</button>
                            </div>
                        </form>
                        <br>

                        @if ($snapToken)
                            <button id="pay-button" class="btn btn-primary btn-sm btn-block btn-success py-2"
                                id=""><i class="fas fa-shopping-cart fas-2x"></i> Lanjutkan</button>
                            {{-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> --}}

                            <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-uTQvvFYtZNAJCfot"></script>
                            <script type="text/javascript">
                                document.getElementById('pay-button').onclick = function() {
                                    // SnapToken acquired from previous step
                                    snap.pay('<?php echo $snapToken; ?>', {
                                        onSuccess: function(result) {
                                            /* You may add your own js here, this is just example */
                                            $("#payment-form").submit();
                                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                        },
                                        // Optional
                                        onPending: function(result) {
                                            // $("#payment-form").submit();
                                            alert("Selesaikan Pembayaran");
                                            // window.history.back(-2)
                                            // history.go(-2);
                                            /* You may add your own js here, this is just example */
                                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                        },
                                        // Optional
                                        onError: function(result) {
                                            // $("#payment-form").submit();
                                            alert("Pembayaran Gagal");
                                            // window.history.back(-2)
                                            history.go(-2);
                                            /* You may add your own js here, this is just example */
                                            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                                        }
                                    });
                                };
                            </script>
                        @else
                            <div class="col-md-12">
                                <form action="/token" class="row" method="POST">
                                    @csrf
                                    <input type="hidden" name="count" id="count" value="{{ $count }}">
                                    <input type="hidden" id="user" name="user"
                                        value="{{ Auth::guard('pelanggan')->user()->nama_pelanggan }}">
                                    <input type="hidden" id="total" value="{{ $order->sum('sub_total') }}"
                                        class="total" name="total_bayar">
                                    @php($no = 1)
                                    @foreach ($order as $item)
                                        <input type="hidden" value="{{ $item->id_order }}"
                                            id="id_order{{ $no }}" name="id_order{{ $no }}">
                                        <input type="hidden" name="idproduk1[{{ $no }}]" id="idproduk"
                                            value="{{ $item->id_masakan }}">
                                        <input type="hidden" name="namaproduk1[{{ $no }}]" id="namaproduk"
                                            value="{{ $item->nama_masakan }}">
                                        <input type="hidden" name="qty1[{{ $no }}]" id="qty"
                                            value="{{ $item->jumlah }}">
                                        <input type="hidden" name="harga1[{{ $no }}]" id="harga"
                                            value="{{ $item->harga }}">
                                        @php($no++)
                                    @endforeach

                                    <button class="btn btn-primary btn-sm btn-block btn-success py-2" id=""><i
                                            class="fas fa-shopping-cart fas-2x"></i> Bayar Cashless</button>

                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
        <script>
            // $(document).ready(function() {
            //     // $('input[name="jumlah"]').on('change', function() {
            //     //     var qty = $("#jumlah").val();
            //     //     console.log(qty)
            //     // })

            //     $("#jumlah").keyup(function() {
            //         var x = $("#jumlah").val();
            //         // var y = $("#berat_volume").val();
            //         // var z = x * y;
            //         // $("#stok").val(z);
            // 		console.log(x)
            //     })
            // });

            //  $(document).on('change', ".input", function() {
            //     var qty = $("#jumlah").val();
            // 	console.log(qty);

            // 	// $("#qty").val(qty);
            // 	// var total = 0;

            //     // $('.subtotal').each(function() {
            //     //     total += parseFloat($(this).val());
            //     // })

            //     // $("#total").val(total);
            // })
        </script>
        {{-- <script type="text/javascript">
    $('#cashless').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");



        // var count = $("#count").val();
        // console.log(count)

        // var count = $('[idproduk1^=l]').length;
        // // var count = array.map(idproduk1,);
        
        // console.log(count);

        // var arr = [];
        // var id = "";
        // for (var i = 1; i <= count; i++) {
            //  arr = [

                // arr.push(i.toString());
                // var id[i] = jQuery('#' + id).val();
                // var idd = id + i
                // id = jQuery('#id_order' + i ).val(),
                
            // ];
            // console.log(arr);
            // console.log(id);
        // }

        // for ($i = 1; $i <= $count; $i++) {
        //     $tmp[] = [
        //         'id' => $request->idproduk1[$i],
        //         'price' => $request->harga1[$i],
        //         'quantity' => $request->qty1[$i],
        //         'name' => $request->namaproduk1[$i],
        //     ];
        //     // $x = array_map($tmp[$i]);
        // }

        // var user = $("#user").val();
        // // var kode = $("#kode").val();
        // var price = $("#price").val();
        // var produk = $("#produk").val();
        // var qty = $("#qty").val();
        // var subtotal = $("#subtotal").val();

        // var user = $("#user").val();
        // // var kode = $("#kode").val();
        // var price = $("#price").val();
        // var produk = $("#produk").val();
        // var qty = $("#qty").val();
        // var subtotal = $("#subtotal").val();

        $.ajax({
            type: "POST",
            url: '/token',
            data: {
                user: user,
                // price: price,
                // produk: produk,
                // qty: qty,
                // subtotal: subtotal,
                // no_hp: no_hp
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script> --}}
        {{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3bnAG_YN4e76vBHv"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                // SnapToken acquired from previous step
                snap.pay('<?= $snapToken ?>', {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script> --}}

    @endif

@endsection
