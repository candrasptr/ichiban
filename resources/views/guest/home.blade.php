@extends('guest.master')
@section('title','home')

@section('konten')
<div class="container-fluid">
	<div class="row d-flex justify-content-end float-right mb-5 mr-5 fixed-bottom ">
		<a href="{{ route('pelanggan.logout') }}" class="btn btn-danger btn-circle btn-lg p-0"><i class=" text-light fas fa-sign-out-alt mt-3"></i></a>
	</div>
</div>

<div class="container-fluid mb-5 mt-3">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="owl-carousel owl-theme">
			    <div class="item"><img src="{{asset('assets/img/banner1.png')}}" style="width:99%"></div>
			    <div class="item"><img src="{{asset('assets/img/banner2.png')}}" style="width:99%"></div>
			    <div class="item"><img src="{{asset('assets/img/banner3.png')}}" style="width:99%"></div>
			</div>
		</div>
		{{-- <div class="col-md-3">
			<div><img src="{{asset('assets/img/banner4.png')}}" style="width:97%" class="mb-3"></div><hr class="bg-danger">
			<div><img src="{{asset('assets/img/banner5.png')}}" style="width:97%" class="mt-3"></div>
		</div> --}}
	</div>
	{{-- makanan --}}
	<div class="row mt-5">
	  <div class="col-md-12 text-center">
	    <h1 class="text-danger mb-5" id="bo"> Makanan </h1>
	  </div>
	  <div class="col-md-10 col-xs-10 offset-md-1 mb-3" >
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
        <div class="row">
		<div class="text-center col-md-10 offset-md-1">
			<h1 class="text-danger my-5" id="bo">PESANAN</h1>
		</div>
        <div class="card col-lg-10 offset-lg-1">
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-hover" id="example"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th> Nama Masakan </th>
                    <th> Jumlah </th>
                    <th> Harga </th>
                    <th> Sub Total </th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    
                @foreach($order as $m)
                <tr>
                  <td></td>
                  <td>{{$m->nama_masakan}} </td>
                  <form action="/order_update" method="POST">
                  @csrf
                  <input type="hidden" value="{{$m->id_order}}" name="id_order">
                  <td> <input type="text" value="{{$m->jumlah}}" maxlength="4" size="4" name="jumlah"> </td>
                  <td>{{$m->harga}} </td>
                  <td> {{$m->jumlah * $m->harga }} </td>
                  <td>
                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Update"><i class="fas fa-edit"></i></button>
                    <a href="order_hapus/{{$m->id_order}}" onclick="return confirm('Anda yakin ?')" data-toggle="tooltip" data-placement="top" title="Hapus"><ion-icon name="trash-outline" class="text-danger"></ion-icon></a>
                    </form>
                  </td>
                </tr>
                @endforeach
				</tbody>
				
			</table>
			
			{{-- BAYAR --}}
			<div class="row">
				<div class="col-md-7"></div>
				<div class="col-md-5">
					<form action="/order_bayar" method="POST">
						@csrf
						<div class="row mb-5">
							<div class="col-md-5"></div>
							<div class="col-md-3">
								<span>Rp. {{$order->sum('sub_total')}}</span>
								<input type="hidden" id="total" value="{{$order->sum('sub_total')}}" class="total" name="total_bayar">
							</div>
							<div class="col-md-4">
								<button class="btn btn-primary btn-sm btn-block btn-danger" id="bayar">Bayar</button>
							</div>
						</div>
									

								
						</form>
				</div>
			</div>

            </div>
            </div>
        </div>
        <div class="col-lg-4">
        
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
@endpush