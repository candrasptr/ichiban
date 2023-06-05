@extends('guest.master')
@section('title','search')

@section('konten')
{{-- <div class="container-fluid">
	<div class="row d-flex justify-content-end float-right mb-5 mr-5 fixed-bottom ">
		<a href="{{ route('pelanggan.logout') }}" class="btn-logout btn btn-dark btn-circle btn-lg p-0">
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

	</div>

	{{-- Search --}}
	<div class="row mt-5">
		<div class="col-md-12 text-center">
		  <h1 class="text-dark mb-5" id="bo"> Makanan </h1>
		</div>

		@if (session('data'))
		<div class="col-md-10 offset-md-1">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Berhasil!</strong> {{ session('data') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>	
		@endif

		<div class="col-md-10 col-xs-10 offset-md-1 mb-3" >
		  <div class="card-deck" >
		  <div class="owl-carousel-2 owl-carousel owl-theme" style="width: 25%">
		 	@foreach ($data as $key)
			<div class="card shadow-sm" id="card">
				<img src="{{asset('assets/img/produk/'.$key->gambar_masakan)}}" class="card-img-top" alt="...">
			  <div class="card-body">
				<h5 class="card-title text-center">{{ $key->nama_masakan }}</h5>
			  </div>
			  <div class="row">
				  <div class="col-md-8">
					  <a class="btn btn-transparent text-dark ml-2 mt-4" id="sb">Rp. {{ $key->harga }}</a>
				  </div>
				  <div class="col-md-4 text-right">
					<form action="/pesan_order" method="POST">
						@csrf
						<div class="form-group">
						  <input type="hidden" class="form-control" value="{{ $key->id_masakan }}" name="id_masakan">
						</div>
						<button type="submit" class="btn btn-dark text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></button>
					</form>
				  </div>
			  </div>
			</div>
			@endforeach
		  </div>
		  </div>
		</div>
	</div>

	
</div>



@endsection

@push('after-scripts')
<script type="text/javascript">
	$('.owl-carousel-1').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:false,
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
	$('.owl-carousel-2').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:false,
	    autoplay:2000,
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