<!DOCTYPE html>
<html>
<head>
	<title>KASIR</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid mt-3">
		<div class="row">
			<div class="col-md-6">
				<h1 id="sbita" class="text-danger">RESTO</h1>
			</div>
			<div class="col-md-6 text-right">
				<span id="me">Kasir</span><br>
				<span class="text-danger"><i class="fas fa-user"></i> Candra saputra</span>
			</div>
			<div class="col-md-6 mt-5">
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Id/nama</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Barang</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				  <div class="input-group-append">
				      <button class="btn btn-danger" type="button" id="button-addon2">Tambahkan</button>
				    </div>
				</div>
			</div>
			<div class="col-md-12">
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama menu</th>
				      <th scope="col">harga</th>
				      <th scope="col">jumlah</th>
				      <th scope="col">total</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Ramen</td>
				      <td>10000</td>
				      <td>1</td>
				      <td>10000</td>
				    </tr>
				  </tbody>
				</table>
				<hr>
			</div>
			<div class="col-md-8 text-right justfy-content-end">
				<span>Total : Rp 10.000</span> |
			</div>
			<div class="col-md-2">
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Bayar</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="inputGroup-sizing-sm">Kembali</span>
				  </div>
				  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled value="0">
				</div>
			</div>
			<div class="col-md-2">
				<a href="#" class="btn btn-danger btn-block">Bayar</a>
			</div>
		</div>		
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>	