@extends('admin/layout.master')

@section('title','User')
@section('title2','index')
@section('user','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      
      <div class="card mt-3">

          <div class="card-body">
            <a href="{{ route('user.tambah') }}" class="btn btn-icon icon-left btn-primary mb-3 px-3"><i class="fas fa-plus"></i> Tambah</a>
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
                          <th scope="col">Nama user</th>
                          <th>username</th>
                          <th>Level</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                      <tr>
                          <th scope="row">1</th>
                          <td>Candra</td>
                          <td>Candra</td>
                          <td>Admin</td>
                          <td>
                            <a href="{{ route('user.edit') }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="" class="btn btn-danger confirm_script">
                              <form action="" id="delete" method="POST">
                                
                              </form>
                              <i class="fas fa-trash"></i></a>
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
      swal('Data berhasil dihapus', {
        icon: 'success',
      });
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush