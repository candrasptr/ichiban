@extends('admin/layout.master')

@section('title','Admin')
@section('title2','index')
@section('user','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      
      <div class="card mt-3">

          <div class="card-body">
            <a href="{{ route('admin.tambah') }}" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i class="fas fa-plus"></i></a>
            <div class="float-right">
              <form action="?" method="GET">
                <div class="input-group mb-3">
                  <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off">
                  <div class="input-group-append">
                    <button id="btncaribuku" class="btn btn-outline-danger bg-danger" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                  </div>
                </div>
              </form>
              </div>
            @if(session('store'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                {{ session('store') }}
              </div>
            </div>
            @endif
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama admin</th>
                          <th>username</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                    @foreach ($data_admin as $no => $data)
                      <tr>
                          <th scope="row">{{ $data_admin->firstItem()+$no }}</th>
                          <td>{{ $data->nama_admin }}</td>
                          <td>{{ $data->username }}</td>
                          <td>
                            <a href="{{ route('admin.edit',$data->id_admin) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="{{ $data->id_admin }}" class="btn btn-danger confirm_script">
                              <form action="{{ route('admin.delete',$data->id_admin) }}" id="delete{{ $data->id_admin }}" method="POST">
                                @csrf
                                @method('delete')
                              </form>
                              <i class="fas fa-trash"></i></a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              {{$data_admin->links()}}
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
  id = e.target.dataset.id;
  swal({
      title: 'Yakin hapus data?',
      text: 'Data yang dihapus tidak bisa dibalikin',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      $(`#delete${id}`,).submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush