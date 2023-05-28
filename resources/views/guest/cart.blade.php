@extends('guest.master')
@section('title','home')

@section('konten')
@if($order->count() != '')    
    <div class="row pb-5" >
		<div class="text-center col-md-10 offset-md-1">
			<h1 class="text-danger my-5" id="bo">PESANAN</h1>
		</div>
		
		{{-- Keranjang --}}
        <div class="col-lg-7 offset-lg-1">
			<div class="row shadow p-3" style="background-color: #ffffff;" id="card-cart"> 
				@foreach ($order as $item)
				<div class="col-md-3">
					<img src="{{asset('assets/img/produk/'.$item->gambar_masakan)}}" style="width: 150px;" alt="...">
				</div>
				<div class="col-md-4 my-auto">
					<span id="me">{{ $item->nama_masakan }}</span><br>
					<span id="me" class="text-danger">Rp {{ $item->harga }}</span>
				</div>
				<div class="col-md-4 offset-md-1 my-auto ">
					<form action="/order_update" class="row justify-content-end" method="POST">
						@csrf
						<input type="hidden" value="{{$item->id_order}}" name="id_order">
						<div class="input-group col-md-8 ml-2">
							<div class="input-group-prepend my-auto mr-2">
								<a href="{{ route('order.hapus',$item->id_order) }}" class="" id="button-cart"><i class="fas fa-trash"></i></a>
							</div>
							<input type="number" class="form-control text-center" value="{{$item->jumlah}}" maxlength="4" size="4" id="input" name="jumlah">
							<div class="input-group-append">
								<button id="button-cart" type="submit" class="btn btn-transparent" data-toggle="tooltip" data-placement="top" title="Update"><i class="fas fa-edit"></i></button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-12 my-4 garis-bawah"></div>
				@endforeach
			</div>
		</div>

		{{-- Card pembayaran --}}
		<div class="col-md-3">
			<div class="card shadow" id="card-cart">
				<div class="card-body">
					<form action="/order_bayar" class="row" method="POST">
						@csrf			
						<div class="col-md-12 mb-3">
							<span id="bo">Ringkasan pesanan</span>	
						</div>
						<div class="col-md-6">
							<span id="me">Total harga :</span>
						</div>
						<div class="col-md-6 text-right">
							<span class="text-danger" id="bo">Rp. {{$order->sum('sub_total')}}</span>
						</div>														<input type="hidden" id="total" value="{{$order->sum('sub_total')}}" class="total" name="total_bayar">
						<div class="col-md-12"><hr></div>
						<div class="col-md-12">
							<button class="btn btn-primary btn-sm btn-block btn-danger py-2" id="bayar"><i class="fas fa-shopping-cart fas-2x"></i> Checkout</button>		
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
    @endif  

@endsection
