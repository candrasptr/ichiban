<!DOCTYPE html>
<html>
<head>
	<title>KASIR - ichiban</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid mt-3">
		<div class="row">
			<div class="col-md-6">
				<img src="{{ asset('assets/img/logo4.png') }}" style="width: 150px;" alt="">
			</div>
			<div class="col-md-6 text-right">
				<span id="me">Kasir</span><br>
				<a href="/logout" class="text-danger"><i class="fas fa-user"></i> {{ Auth::guard('kasir')->user()->nama_kasir }}</a>
			</div>
			<div class="col-md-6 offset-md-1 mb-5 mt-5">
				<a href="/kasir_laporan" class="btn btn-danger mb-3">Cetak laporan</a>
				<form action="/cari_order_kasir" method="POST">
					@csrf
					<div class="input-group input-group-sm mb-3">
						<div class="input-group-prepend">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Kode transaksi</span>
						</div>
						<input autocomplete="off" name="id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
						<div class="input-group-append">
							<button class="btn btn-danger px-3" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
						</div>
					  </div>
				</form>
			</div>
			@if(session('message'))
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
					<form action="{{ route('kasir.bayar',$transaksi2->order_detail_id) }}" method="POST" class="row">
						@csrf
						<div class="col-md-12 mb-3">
							<span>Total : Rp {{$transaksi->sum('sub_total')}}</span> 
						</div>
						<div class="col-md-12">
							<div class="input-group input-group-sm mb-3">
							  <div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Bayar</span>
								<input type="hidden" id="total" value="{{$transaksi->sum('sub_total')}}" class="total" name="total_bayar">
							  </div>
							  <input autocomplete="off" name="jumlah_pembayaran" id="jumlah_pembayaran" onkeyup="hitung()" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
							</div>
							<div class="input-group input-group-sm mb-3">
							  <div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-sm">Kembali</span>
							  </div>
							  <input type="text" class="form-control kembalian" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="kembalian" id="kembalian" disabled>
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

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
</body>
</html>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script>
    

  function hitung()
  {
    var total = $('#total').val();
    var jumlah_pembayaran = $('#jumlah_pembayaran').val();
    var kembalian = $('#kembalian').val();
    var bayar = $('#bayar').val();
    var a = jumlah_pembayaran - total;
    $('#kembalian').val(a);
    if(a < 0)
    {
      $("#bayar").prop("disabled", true);
    }
    else
    {
      $("#bayar").prop("disabled", false);
    }
  }

$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
    </script>





<script>
$(".confirm_script").click(function(e) {
  // id = e.target.dataset.id;
  swal({
      title: 'Yakin membayar oderan ini',
      text: 'status orderan akan berubah',
      icon: 'info',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Orderan berhasil dibayar', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>	