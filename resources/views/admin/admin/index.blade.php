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
            
          {{-- Button tambah --}}
          <a href="{{ route('admin.tambah') }}" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i class="fas fa-plus"></i></a>
            
          {{-- Form search --}}
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

          {{-- Alert --}}
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

          {{-- tabel --}}
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
 
                  {{-- Button edit --}}
                  <a href="{{ route('admin.edit',$data->id_admin) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  <a href="#" data-id="" class="btn btn-danger confirm_script-{{$data->id_admin}} mr-3">
                    <form action="{{ route('admin.delete',$data->id_admin)}}" class="delete_form-{{$data->id_admin}}" method="POST">
                    @method('DELETE')
                    @csrf
                    </form>
                    <i class="fas fa-trash"></i>
                </a>
                </td>
              </tr>
              @push('page-scripts')
              <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
              @endpush

              @push('after-scripts')
              <script>
              $(".confirm_script-{{$data->id_admin}}").click(function(e) {
                // id = e.target.dataset.id;
                swal({
                    title: 'Yakin hapus data?',
                    text: 'Data yang dihapus tidak bisa di kembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      $('.delete_form-{{$data->id_admin}}').submit();
                    } else {
                    swal('Hapus data telah di batalkan');
                    }
                  });
              });
              </script>
              @endpush
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

