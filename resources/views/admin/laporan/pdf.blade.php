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
            <b style="font-size: 30px;">Laporan penjualan</b> <br> {{ $dari }} - {{ $ke }}
        </span>
        <hr>
    </center>

    
    
    <span>
        <b>Total pemasukan</b>  :  Rp {{ $transaksi->sum('sub_total') }}           
    </span>
    <hr>
    <b>Masakan terjual</b>  : <br><br>
    @foreach ($data as $item)
        {{ $item->nama_masakan  }} : {{ $item->count }} <br>
    @endforeach    
    <hr>
    <br> <b>Detail transaksi</b>  : <br>
	<table class="table table-sm table-hover mt-3 mb-5">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Nama masakan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
            <tr>
                <td>{{ $item->tanggal_transaksi }}</td>
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->nama_masakan }}</td> 
                <td>{{ $item->jumlah }}</td>
                <td>Rp{{ $item->harga }}</td>
                <td>Rp{{ $item->jumlah*$item->harga }}</td>
            </tr>
            @endforeach          
        </tbody>
    </table>
    <hr>
    <span style="float: right; margin-right:120px;">Dibuat oleh</span>
    <br>
    <br>
    <br>
    <br>
    <hr style="width: 200px; float: right; margin-right: 0px;">
    @if (Auth::guard('admin')->check())
    <span style="float: right; margin-top:15px; margin-right:150px;">{{ $petugas->nama_admin }}</span>
    @elseif (Auth::guard('kasir')->check())
    <span style="float: right; margin-top:15px; margin-right:150px;">{{ $petugas->nama_kasir }}</span>
    @elseif (Auth::guard('waiter')->check())
    <span style="float: right; margin-top:15px; margin-right:150px;">{{ $petugas->nama_waiter }}</span>
    @elseif (Auth::guard('owner')->check())
    <span style="float: right; margin-top:15px; margin-right:150px;">{{ $petugas->nama_owner }}</span>
    @endif                          
</body>
</html>