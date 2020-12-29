<!DOCTYPE html>
<html>
<head>
	<title>Ichiban resto</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <span>
            ICHIBANresto_Kedungwuluh <br>
            Babakanjaya RT 17 RW 06, Padaherang <br>
            Pangandaran, jawa barat
        </span>
        <hr>
    </center>

    <span>
        Kode order : {{ $transaksi->id_transaksi }} <br>
        Nama : {{ $order2->nama_pelanggan }} <br>
        No meja : {{ $order2->no_meja }} <br>
        Tanggal : {{ $transaksi->tanggal_transaksi }}          
    </span>
    <hr>
 
	<table class="table table-sm table-hover mt-3 mb-5">
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

    <center>
        <span>
            ~ LUNAS ~
         </span> <br> <br>
         <span>
             Arigatou gozaimasu
         </span>
         <hr>
         <span>
             ICHIBAN RESTO
         </span>
    </center>
 
</body>
</html>