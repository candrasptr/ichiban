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
            <b>Laporan penjualan</b> <br> {{ $dari }} - {{ $ke }}
        </span>
        <hr>
    </center>

    <span>
        <b>Total pemasukan</b>  :  Rp {{ $transaksi->sum('sub_total') }}           
    </span>
    <hr>
    
    <br> <b>Detail transaksi</b>  : <br>
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
            @foreach ($transaksi as $item)
            <tr>
                <td>{{ $item->nama_masakan }}</td> 
                <td>{{ $item->jumlah }}</td>
                <td>Rp{{ $item->harga }}</td>
                <td>Rp{{ $item->jumlah*$item->harga }}</td>
            </tr>
            @endforeach          
        </tbody>
    </table>
    <hr>

        <span>Dibuat oleh</span>
        <br>
        <br>
        <br>
        <br>
        <hr style="width: 200px; margin-left: 0px;">
        <span>{{ $item->nama_pelanggan }}</span>
</body>
</html>