@extends('admin/layout.master')

@section('title','Masakan')
@section('title2','index')

@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      
      <div class="card mt-3">

          <div class="card-body">
            <a href="{{ route('masakan.tambah') }}" class="btn btn-icon icon-left btn-primary mb-3 px-3"><i class="fas fa-plus"></i> Tambah</a>
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
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Masakan</th>
                          <th></th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                      <tr>
                          <th scope="row">1</th>
                          <td>
                            <img src="{{asset('assets/img/stisla-fill.svg')}}" width="100" class="img-thumbnail mr-3 mt-2" align="left">
                            <br>
                            <a href="#" class="font-weight-normal">
                                <b>Ramen</b>
                            </a><br>
                            <span>  <b>Harga  :</b> Rp 10.000</span><br>
                            <span>  <b>Kategori  :</b> Makanan</span><br>
                            <span>  <b>Status :</b> Tersedia</span><br>
                          </td>
                          <td></td>
                          <td>
                            <a href="{{ route('masakan.edit') }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="" class="btn btn-danger confirm_script">
                              <form action="" id="delete" method="POST">
                                
                              </form>
                              <i class="fas fa-trash"></i></a>
                            <a href="#" class="btn btn-warning">Habis</a>
                          </td>
                      </tr>
                      
                  </tbody>
              </table>
              
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