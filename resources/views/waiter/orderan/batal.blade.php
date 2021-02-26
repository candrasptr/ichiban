@extends('waiter/layout.master')

@section('title','Orderan')
@section('title2','index')
@section('orderan','active')
@section('konten')

<div class="section-body">
  
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <form action="/waiter_filter_penjualan_batal" class="row" method="GET">
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
              <button type="submit" class="btn btn-danger btn-sm btn-block">Filter</button>
            </div> 
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-header row my-auto">
          <div class="col-md-6 mt-2">
            <h5 class="text-danger">Batal</h5>
          </div>
          <div class="col-md-6 justify-content-end">
            <a href="/waiter" class="btn btn-outline-danger mr-2">Selesai</a>
            <a href="/waiter_belum_diantar" class="btn btn-outline-danger mr-2">Belum diantar</a>
            <a href="/waiter_belum" class="btn btn-outline-danger mr-2">Belum dibayar</a>
            <a href="/waiter_batal" class="btn btn-danger">Dibatalakan</a>
          </div>
        </div>
          <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                {{ session('message') }}
              </div>
            </div>
            @endif
              <table class="table table-md table-striped">
                  <thead>
                      <tr>
                          <th scope="col">Kode</th>
                          <th scope="col">Nama</th>
                          <th>No meja</th>
                          <th>tanggal</th>
                          <th>total</th>
                          <th>bayar</th>
                          <th>kembalian</th>
                          <th>status</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                    @foreach ($transaksi as $item)
                    <tr>
                      <th scope="row">{{ $item->id_transaksi }}</th>
                      <td>
                        <a href="{{ route('waiter.detail',$item->order_detail_id)}}" class="font-weight-normal">
                            {{ $item->nama_pelanggan }}
                        </a>                           
                      </td>
                      <td>{{ $item->no_meja }}</td>
                      <td>{{ $item->tanggal_transaksi }}</td>
                      <td>{{ $item->total_bayar }}</td>
                      <td>{{ $item->jumlah_pembayaran }}</td>
                      <td>{{ $item->kembalian }}</td>
                      <td>{{ $item->status_order }}</td>
                      <td>
                        <a href="{{ route('waiter.order.delete',$item->order_detail_id) }}" class="btn btn-danger btn-block my-2"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                    @endforeach
                  </tbody>
              </table>
              {{$transaksi->links()}}
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

{{-- <script>
$(".confirm_script").click(function(e) {
  // id = e.target.dataset.id;
  swal({
      title: 'Yakin menyelesaikan orderan?',
      text: 'Data yang diubah tidak bisa dibalikin',
      icon: 'info',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Data berhasil diubah', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script> --}}
@endpush
