@extends('guest.master')
@section('title','home')

@section('konten')
{{-- <div class="container-fluid">
	<div class="row d-flex justify-content-end float-right mb-5 mr-5 fixed-bottom ">
		<a href="{{ route('pelanggan.logout') }}" class="btn-logout btn btn-danger btn-circle btn-lg p-0">
			<i class="fas fa-sign-out-alt mt-3"></i>
		</a>
	</div>
</div> --}}

<div class="container-fluid">
	<div class="row d-flex justify-content-end float-right mb-5 mr-5 fixed-bottom ">
		<div class="dropup">
			<button class="dropbtn"><i class="fas fa-bars"></i></button>
			<div class="dropup-content">
			  <a href="/feedback"><i class="ion ion-chatbox"></i> Feedback</a>
			  <a href="{{ Route('pelanggan.logout') }}"><i class="ion ion-android-exit"></i> logout</a>
			</div>
		  </div>
	</div>
</div>


<div class="container-fluid mt-3">
	<div class="row">

		@if (session('feedback'))
		<div class="col-md-10 offset-md-1">
		  <div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Berhasil!</strong> {{ session('feedback') }}
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		</div>	 
		@endif

		<div class="col-md-10 offset-md-1">
			<div class="owl-carousel owl-theme">
			    <div class="item"><img src="{{asset('assets/img/banner1.png')}}" style="width:99%"></div>
			    <div class="item"><img src="{{asset('assets/img/banner2.png')}}" style="width:99%"></div>
			    <div class="item"><img src="{{asset('assets/img/banner3.png')}}" style="width:99%"></div>
			</div>
		</div>
	</div>

	{{-- makanan --}}
	<div class="row mt-5">
	  <div class="col-md-12 text-center">
	    <h1 class="text-danger mb-5" id="bo"> Makanan </h1>
	  </div>

	  @if (session('makanan'))
	  <div class="col-md-10 offset-md-1">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil!</strong> {{ session('makanan') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
	  </div>	 
	  @endif

	  <div class="col-sm-10 col-md-10 col-xs-10 offset-sm-1 offset-md-1 mb-3" >
	    <div class="card-deck" >
			@foreach ($makanan as $key)
			<div class="card shadow-sm" id="card">
				<img src="{{asset('assets/img/produk/'.$key->gambar_masakan)}}" class="card-img-top" alt="...">
			  <div class="card-body">
				<h5 class="card-title text-center">{{ $key->nama_masakan }}</h5>
			  </div>
			  <div class="row">
				  <div class="col-md-8">
					  <a class="btn btn-transparent text-danger ml-2 my-3" id="sb">Rp. {{ $key->harga }}</a>
				  </div>
				  <div class="col-md-4 text-right">
					<form action="/pesan_order" method="POST">
						@csrf
						<div class="form-group">
						  <input type="hidden" class="form-control" value="{{ $key->id_masakan }}" name="id_masakan">
						</div>
						<button type="submit" class="btn btn-danger text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></button>
					</form>
				  </div>
			  </div>
			</div>
			@endforeach
	    </div>
	  </div>
	</div>

	{{-- minuman --}}
	<div class="row mt-5">
		<div class="col-md-12 text-center">
		  <h1 class="text-danger mb-5" id="bo"> Minuman </h1>
		</div>

		@if (session('minuman'))
		<div class="col-md-10 offset-md-1">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Berhasil!</strong> {{ session('minuman') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>	
		@endif

		<div class="col-md-10 col-xs-10 offset-md-1 mb-3" >
		  <div class="card-deck" >
			@foreach ($minuman as $key)
			<div class="card shadow-sm" id="card">
				<img src="{{asset('assets/img/produk/'.$key->gambar_masakan)}}" class="card-img-top" alt="...">
			  <div class="card-body">
				<h5 class="card-title text-center">{{ $key->nama_masakan }}</h5>
			  </div>
			  <div class="row">
				  <div class="col-md-8">
					  <a class="btn btn-transparent text-danger ml-2 my-3" id="sb">Rp. {{ $key->harga }}</a>
				  </div>
				  <div class="col-md-4 text-right">
					<form action="/pesan_order" method="POST">
						@csrf
						<div class="form-group">
						  <input type="hidden" class="form-control" value="{{ $key->id_masakan }}" name="id_masakan">
						</div>
						<button type="submit" class="btn btn-danger text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></button>
					</form>
				  </div>
			  </div>
			</div>
			@endforeach
		  </div>
		</div>
	</div>

	{{-- Dessert --}}
	<div class="row mt-5">
		<div class="col-md-12 text-center">
		  <h1 class="text-danger mb-5" id="bo"> Dessert </h1>
		</div>

		@if (session('dessert'))
		<div class="col-md-10 offset-md-1">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Berhasil!</strong> {{ session('dessert') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>	
		@endif

		<div class="col-md-10 col-xs-10 offset-md-1 mb-3" >
		  <div class="card-deck" >
			@foreach ($dessert as $key)
			<div class="card shadow-sm" id="card">
				<img src="{{asset('assets/img/produk/'.$key->gambar_masakan)}}" class="card-img-top" alt="...">
			  <div class="card-body">
				<h5 class="card-title text-center">{{ $key->nama_masakan }}</h5>
			  </div>
			  <div class="row">
				  <div class="col-md-8">
					  <a class="btn btn-transparent text-danger ml-2 mt-4" id="sb">Rp. {{ $key->harga }}</a>
				  </div>
				  <div class="col-md-4 text-right">
					<form action="/pesan_order" method="POST">
						@csrf
						<div class="form-group">
						  <input type="hidden" class="form-control" value="{{ $key->id_masakan }}" name="id_masakan">
						</div>
						<button type="submit" class="btn btn-danger text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></button>
					</form>
				  </div>
			  </div>
			</div>
			@endforeach
		  </div>
		</div>
	</div>

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
</div>



@endsection

@push('after-scripts')
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    autoplay:1000,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	})
</script>

<script type="text/javascript">
$("#feedback").click(function() {
  swal({
    title: 'Feedback',
    content: {
    element: 'input',
    attributes: {
      placeholder: 'Masukan kritik & saran',
      type: 'text',
    },
    },
  }).then((ata) => {
	$(ata).submit();
  });
});
</script>

<script src="{{ asset('assets/js/page/modules-ion-icons.js') }}"></script>
@endpush
