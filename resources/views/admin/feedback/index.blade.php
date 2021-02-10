@extends('admin/layout.master')

@section('title','feedback')
@section('title2','index')
@section('feedback','active')
@section('konten')

<div class="section-body">
  
  <div class="row">

    <div class="col-md-12">
      <div class="card mt-3">
          <div class="card-body row">

          <div class="col-md-4">
            <h5 class="text-danger">
              Kritik & saran
            </h5>
          </div>

          {{-- Form search --}}
          <div class="col-md-4 offset-md-4">
            <div class="float-right">
              <form action="?" method="GET">
                <div class="input-group mb-3">
                  <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off">
                  <div class="input-group-append">
                    <button id="btncaribuku" class="btn btn-outline-danger bg-danger" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                  </div>
                  <a href="/delete-all" class="btn btn-danger ml-3 d-flex">Hapus semua</a>
                </div>
              </form>
            </div>
          </div>

            @if(session('message'))
            <div class="col-md-12">
              <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  {{ session('message') }}
                </div>
              </div>
            </div>
            @endif

              <table class="table table-md table-striped">
                  <thead>
                      <tr>
                          <th scope="col">Kode</th>
                          <th scope="col">Nama</th>
                          <th>tanggal</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                   @php
                       $no = 1
                   @endphp
                   @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->isi }}</td>
                        <td> {{ $item->tanggal }}</td>
                        <td>
                          <a href="#" data-id="{{ $item->id_feedback }}" class="btn btn-danger confirm_script">
                            <form action="{{ route('feedback.delete',$item->id_feedback) }}" id="delete{{ $item->id_feedback }}" method="POST">
                              @csrf
                              @method('delete')
                            </form>
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                    </tr> 
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

