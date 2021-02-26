@extends('admin/layout.master')

@section('title','waiter')
@section('title2','index')
@section('user','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      
      <div class="card mt-3">

          <div class="card-body">
            <a href="{{ route('waiter.tambah') }}" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i class="fas fa-plus"></i></a>
            <div class="float-right">
              <form action="?" method="GET">
                <div class="input-group mb-3">
                  <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}">
                  <div class="input-group-append">
                    <button id="btncaribuku" class="btn btn-outline-danger bg-danger" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                  </div>
                </div>
              </form>
              </div>
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
                          <th scope="col">Nama waiter</th>
                          <th>Jenis kelamin</th>
                          <th>Alamat</th>
                          <th>Nohp</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                  @foreach($data as $no => $dt)
                        <tr>
                          <th scope="row">{{$data->firstItem()+$no}}</th>
                          <td>{{$dt->nama_waiter}}</td>
                          <td>{{$dt->jenis_kelamin}}</td>
                          <td>{{$dt->alamat}}</td>
                          <td>{{$dt->no_hp}}</td>
                          <td>{{$dt->email}}</td>
                          <td>{{$dt->username}}</td>
                          <td>
                            <a href="{{ route('waiter.edit',$dt->id_waiter) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="" class="btn btn-danger confirm_script-{{$dt->id_waiter}} mr-3">
                                <form action="{{ route('waiter.delete',$dt->id_waiter)}}" class="delete_form-{{$dt->id_waiter}}" method="POST">
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
            $(".confirm_script-{{$dt->id_waiter}}").click(function(e) {
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
                    $('.delete_form-{{$dt->id_waiter}}').submit();
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
              {{$data->links()}}
          </div>
      </div>
    </div>
  </div>    
</div>

@endsection

{{-- @push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush --}}

{{-- @push('after-scripts')

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
      $(`#delete${id}`).submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush --}}