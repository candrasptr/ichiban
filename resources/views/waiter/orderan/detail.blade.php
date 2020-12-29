@extends('waiter/layout.master')

@section('title','Orderan')
@section('title2','detail')
@section('orderan','active')
@section('konten')

<div class="container-fluid">
  <div class="row mt-1">
    <!-- Judul Buku -->
    
    <h1>{{ $order2->nama_pelanggan }}</h1>
    
    
    <div class="col-md-12">
      <div class="card border rounded shadow-sm">
        <!-- Status -->
        <h5 class="card-header text-warning">
          @if ($transaksi->status_order == 'sudah_dibayar')
              {{ $transaksi->status_order }} | {{ $transaksi->diantar }} diantar
          @else
              {{ $transaksi->status_order }}
          @endif
        </h5>

        <div class="card-body row">
          <div class="col-md-12">
            <table class="table table-sm table-hover mb-5">
              <thead>
                <tr>
                  <th>Nama masakan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Sub total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order as $item)
                <tr>
                  <td>{{ $item->nama_masakan }}</td>
                  <td>{{ $item->jumlah }}</td>
                  <td>{{ $item->harga }}</td>
                  <td>{{ $item->harga*$item->jumlah }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
          <div class="col-md-6 mb-4">
            <table class="table table-hover table-border borderless">
              <thead>
                <tr>
                  <th>total_harga</th>
                  <td>Rp {{ $transaksi->total_bayar }}</td>
                </tr>
                <tr>
                  <th>Jumlah bayar</th>
                  <td>Rp {{ $transaksi->jumlah_pembayaran }}</td>
                </tr>
                <tr>
                  <th>Kembalian</th>
                  <td>Rp {{ $transaksi->kembalian }}</td>
                </tr>
              </thead>
            </table>
          </div>

          <div class="col-md-6"></div>

          <div class="col-md-3 offset-md-9">
            <a href="{{ url()->previous() }}" class="btn btn-danger btn-block">Kembali</a>
          </div>
              

              
               
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
      title: 'Yakin hapus data?',
      text: 'Data yang dihapus tidak bisa dibalikin',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      // $('#delete').submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush