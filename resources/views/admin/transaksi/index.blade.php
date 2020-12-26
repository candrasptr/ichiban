@extends('admin/layout.master')

@section('title','Admin')
@section('title2','index')
@section('user','active')
@section('konten')
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
			<form action="/cari_order" method="POST">
				@csrf
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="inputGroup-sizing-sm">Kode transaksi</span>
					</div>
					<input name="id" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					<div class="input-group-append">
						<button class="btn btn-danger" type="submit" id="button-addon2">Cari</button>
					</div>
				  </div>
			</form>
			
		</div>
		@if ($transaksi->count() != '')
		<div class="col-md-8">
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
		<div class="col-md-4 ">
			<div class="row">
				<form action="{{ route('order.bayar',$transaksi2->order_detail_id) }}" method="POST" class="row">
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
						  <input name="jumlah_pembayaran" id="jumlah_pembayaran" onkeyup="hitung()" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
						</div>
						<div class="input-group input-group-sm mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">Kembali</span>
						  </div>
						  <input type="text" class="form-control kembalian" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="kembalian" id="kembalian" disabled>
						</div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-danger btn-block">Bayar</button>
					</div>
				</form>
			</div>
		</div>
		@endif
		
	</div>		
</div>
@endsection
@push('page-scripts')
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
    @endpush