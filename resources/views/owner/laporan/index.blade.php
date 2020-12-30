@extends('owner/layout.master')

@section('title','laporan')
@section('title2','index')
@section('laporanwaiter','active')

@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12 mb-5">
      <h1 id="bo">Rekap laporan</h1>
    </div>
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

@endsection
@push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script").click(function(e) {
  // id = e.target.dataset.id;
  swal({
      title: 'Yakin ingin mencetak laporan ini?',
      text: 'Data yang dicetak akan terdownload otomatis',
      icon: 'info',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Data berhasil dicetak', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush
