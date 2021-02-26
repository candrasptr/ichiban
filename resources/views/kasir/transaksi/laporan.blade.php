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
            <br><br><br><br><br><br>
              <div class="col-md-6 offset-md-3 mt-3">
                <div class="card">
                  <div class="card-body">
                    <form action="/rekap_laporan" class="row" method="GET">
                      <div class="form-group col-md-6">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                          @if( request('dari') !='' )
                          <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" required value="{{request('dari')}}">
                          @else
                          <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                          @endif
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          </div>
                          @if( request('ke') !='' )
                          <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" required value="{{request('ke')}}">
                          @else
                          <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                          @endif              
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-danger btn-sm btn-block">Rekap</button>
                      </div> 
                    </form>
                  </div>
                </div>
              </div>
		</div>		
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
</body>
</html>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script>

</script>	