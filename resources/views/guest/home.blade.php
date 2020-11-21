@extends('guest.master')

@section('konten')
<div class="container-fluid mb-5 mt-3">
	<div class="row">
		<div class="col-md-7 offset-md-1">
			<div class="owl-carousel owl-theme">
			    <div class="item"><img src="{{asset('assets/img/banner1.png')}}" style="width:95%"></div>
			    <div class="item"><img src="{{asset('assets/img/banner2.png')}}" style="width:95%"></div>
			    <div class="item"><img src="{{asset('assets/img/banner3.png')}}" style="width:95%"></div>
			</div>
		</div>
		<div class="col-md-3">
			<div><img src="{{asset('assets/img/banner4.png')}}" style="width:97%" class="mb-3"></div><hr class="bg-danger">
			<div><img src="{{asset('assets/img/banner5.png')}}" style="width:97%" class="mt-3"></div>
		</div>
	</div>
	<div class="row mt-5">
	  <div class="col-md-12 text-center">
	    <h1 class="text-danger mb-5" id="bo"> MENU </h1>
	  </div>
	  <div class="col-md-10 col-xs-10 offset-md-1 mb-3" >
	    <div class="card-deck" >
	      <div class="card shadow-sm" id="card">
	      	<img src="{{asset('assets/img/produk/sushi.png')}}" class="card-img-top" alt="...">
	        <div class="card-body">
	          <h5 class="card-title text-center">Sushi</h5>
	        </div>
	        <div class="row">
	        	<div class="col-md-8">
	        		<a class="btn btn-transparent text-danger ml-2 my-3" id="sb">Rp. 10000</a>
	        	</div>
	        	<div class="col-md-4 text-right">
	        		<a href="" class="btn btn-danger text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></a>
	        	</div>
	        </div>
	      </div>
	      <div class="card shadow-sm" id="card">
	        <img src="{{asset('assets/img/produk/yakiniku.png')}}" class="card-img-top" alt="...">
	        <div class="card-body">
	          <h5 class="card-title text-center">yakiniku</h5>
	        </div>
	        <div class="row">
	        	<div class="col-md-8">
	        		<a class="btn btn-transparent text-danger ml-2 my-3" id="sb">Rp. 10000</a>
	        	</div>
	        	<div class="col-md-4 text-right">
	        		<a href="" class="btn btn-danger text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></a>
	        	</div>
	        </div>
	      </div>
	      <div class="card shadow-sm" id="card">
	        <img src="{{asset('assets/img/produk/orange.png')}}" class="card-img-top" alt="...">
	        <div class="card-body">
	          <h5 class="card-title text-center">Orange juice</h5>
	        </div>
	        <div class="row">
	        	<div class="col-md-8">
	        		<a class="btn btn-transparent text-danger ml-2 my-3" id="sb">Rp. 10000</a>
	        	</div>
	        	<div class="col-md-4 text-right">
	        		<a href="" class="btn btn-danger text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></a>
	        	</div>
	        </div>
	      </div>
	      <div class="card shadow-sm" id="card">
	        <img src="{{asset('assets/img/produk/mochi.png')}}" class="card-img-top" alt="...">
	        <div class="card-body">
	          <h5 class="card-title text-center">Mochi</h5>
	        </div>
	        <div class="row">
	        	<div class="col-md-8">
	        		<a class="btn btn-transparent text-danger ml-2 my-3" id="sb">Rp. 10000</a>
	        	</div>
	        	<div class="col-md-4 text-right">
	        		<a href="" class="btn btn-danger text-right mr-3 my-3" id="btn-shop"><i class="fas fa-shopping-cart"></i></a>
	        	</div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col-md-12 text-center">
	    <a href="/menu" class="btn btn-danger mt-5 px-3" id="btn-menu">Semua menu</a>
	  </div>
	</div>
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
@endpush