@extends('admin/layout.master')

@section('title','Orderan')
@section('title2','detail')

@section('konten')

<div class="container-fluid">
  <div class="row mt-1">
    <!-- Judul Buku -->
    <h1>Candra saputra</h1>
    <div class="col-md-12">
      <div class="card border rounded shadow-sm">
        <!-- Status -->
        <h5 class="card-header text-warning">
          BELUM DIBAYAR
        </h5>

        <div class="card-body">

              <!-- Nomeja -->
              <div class="form-group row">
                <label for="Nomeja" class="col-md-3 col-form-label col-form-label-md">No meja</label>
                <div class="col-md-9">
                  <input value="Meja 1" type="text" name="nomeja" class="form-control form-control-md border bg-light" id="colFormLabelSm" disabled value="">
                </div>
              </div>

              <!-- Masakan -->
              <div class="form-group row">
                <label for="Masakan" class="col-md-3 col-form-label col-form-label-md">Masakan</label>
                <div class="col-md-9">
                  <input value="Ramen" type="text" name="masakan" class="form-control form-control-md border bg-light" id="colFormLabelSm" disabled value="">
                </div>
              </div>

              <!-- harga -->
              <div class="form-group row">
                <label for="harga" class="col-md-3 col-form-label col-form-label-md">Harga</label>
                <div class="col-md-9">
                  <input value="Rp 10.000" type="text" name="harga" class="form-control form-control-md border bg-light" id="colFormLabelSm" disabled value="">
                </div>
              </div>

              
              <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a> 
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