<!DOCTYPE html>
<html>
<head>
	<title>Tampebako</title>
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
        <h5>
            <b>Tampebako Coffee</b> <br>
            Jl. Perdatam Terusan No.6D, RW.5, Ulujami, <br>
            Kec. Pesanggrahan, Kota Jakarta Selatan
        </h5>
        <hr>
        <br>
        <span>
            <b>KODE TRANSAKSI </b>  <br>
        </span>
        <span class="text-danger">
            {{ $transaksi->id_transaksi }} <br>
        </span>
        <br><br><br><br>
        <span>
            DETAIL ORDER         
        </span>
    </center>

    
    <hr>
 
	<table class="table table-sm table-hover mt-3 mb-5">
        <thead>
          <tr>
            <th>Nama Menu</th>
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
            <td>Rp.{{ $item->harga }}</td>
            <td>Rp.{{ $item->harga*$item->jumlah }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    <br>
    <table class="table table-sm table-hover mt-3 mb-5">
    <thead>
          <tr>
            <th><b>TOTAL</b></th>
            <th> </th>
            <th> </th>
            <th>Rp.{{ $transaksi->total_bayar }}</th>
          </tr>
        </thead>
    </table>
    <br>
    <br>
    <center>TERIMAKASIH.</center>
 
</body>
</html>