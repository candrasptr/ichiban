@extends('guest.master')
@section('title','dessert')
@section('konten')
<div class="container-fluid mb-5">
	<div class="row mt-2">
	  <div class="col-md-12 text-center">
	    <h1 class="text-light mb-5" id="bo"> DESSERT </h1>
	  </div>
	  <div class="col-md-7 offset-md-1">
	    <div class="input-group mb-3">
	      <input type="text" class="form-control" placeholder="Cari menu" aria-label="Recipient's username" aria-describedby="basic-addon2" id="input-cari">
	      <div class="input-group-append">
	        <a class="btn btn-danger btn-cari px-5" href="#" id="basic-addon2"><i class="fas fa-search"></i></a>
	      </div>
	    </div>
	  </div>
	  <div class="col-md-4">
	  	<a href="/makanan" class="btn btn-danger ml-3" id="btn-menu">Makanan</a>
	  	<a href="/minuman" class="btn btn-danger ml-2" id="btn-menu">Minuman</a>
	  	<a href="/dessert" class="btn btn-danger ml-2" id="btn-menu">Dessert</a>
	  </div>
	    <div class="col-md-10 col-xs-10 offset-md-1 mb-3" >
	      <div class="card-deck" >
	        <div class="card shadow-sm" id="card">
	        	<img src="{{asset('assets/img/produk/donut.png')}}" class="card-img-top" alt="...">
	          <div class="card-body">
	            <h5 class="card-title text-center">Ichiban donut</h5>
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
	          <img src="{{asset('assets/img/produk/dorayaki.png')}}" class="card-img-top" alt="...">
	          <div class="card-body">
	            <h5 class="card-title text-center">Dorayaki</h5>
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
	          <img src="{{asset('assets/img/produk/takiyaki.png')}}" class="card-img-top" alt="...">
	          <div class="card-body">
	            <h5 class="card-title text-center">Takiyaki</h5>
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
	</div>
</div>
@endsection

