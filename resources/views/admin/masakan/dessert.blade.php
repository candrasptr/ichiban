@extends('admin/layout.master')

@section('title','Menu')
@section('title2','Dessert')
@section('masakan','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      
      <div class="card mt-3">

          <div class="card-body">
            <a href="{{ route('masakan.tambah') }}" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i class="fas fa-plus"></i></a>
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
                          <th scope="col">Makanan</th>
                          <th></th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                    @foreach ($data_masakan as $no => $data)
                      <tr>
                          <th scope="row">{{ $data_masakan->firstItem()+$no }}</th>
                          <td>
                            <img src="{{asset('assets/img/produk/'.$data->gambar_masakan)}}" width="100" class="img-thumbnail mr-3 mt-4" align="left">
                            <br>
                            <a href="#" class="font-weight-normal">
                                <b>{{ $data->nama_masakan }}</b> | 
                                @if ($data->status == 'tersedia')
                                    <b class="text-success">Tersedia</b>    
                                @else
                                    <b class="text-danger">Tidak tersedia</b>
                                @endif
                            </a><br>
                            <span>  <b>Harga  :</b> {{ $data->harga}}</span><br>
                            <span>  <b>Kategori  :</b> {{ $data->nama_kategori }}</span><br>
                          </td>
                          <td></td>
                          <td>
                            <a href="{{ route('masakan.edit',$data->id_masakan) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            <a href="#" data-id="" class="btn btn-danger confirm_script-{{$data->id_masakan}} mr-3">
                              <form action="{{ route('masakan.delete',$data->id_masakan)}}" class="delete_form-{{$data->id_masakan}}" method="POST">
                              @method('DELETE')
                              @csrf
                              </form>
                              <i class="fas fa-trash"></i>
                              </a>
                              <form action="{{route('masakan.updatestatus',$data->id_masakan)}}" method="post">
                                @csrf
                                @if ($data->status == 'tersedia')
                                  <button class="btn btn-warning mt-2 px-4" name='status' value="habis" type="submit">Habis</a>
                                @else
                                  <button class="btn btn-success mt-2 px-4" name='status' value="tersedia" type="submit">Tersedia</a>
                                @endif 
                              </form>
                          </td>
                        </tr>
                        @push('page-scripts')

                        <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>
              
                        @endpush
              
                        @push('after-scripts')
              
                        <script>
                        $(".confirm_script-{{$data->id_masakan}}").click(function(e) {
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
                                $('.delete_form-{{$data->id_masakan}}').submit();
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
              {{$data_masakan->links()}}
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

$(".habis").click(function() {
  swal('Good Job', 'Data berhasil diubah', 'success');
});
</script>
@endpush