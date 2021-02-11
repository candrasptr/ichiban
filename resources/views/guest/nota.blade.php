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
        <h5>
            <b>ICHIBAN RESTO</b> <br>
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
            DETAIL MASAKAN         
        </span>
    </center>

    
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
 
</body>
</html>