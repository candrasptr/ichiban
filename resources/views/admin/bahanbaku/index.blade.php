@extends('admin/layout.master')

@section('title', 'Bahan Baku')
@section('title2', 'Index')
@section('Bahan Baku', 'active')
@section('konten')

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <a href="{{ route('bahanbaku.create') }}" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i
                                class="fas fa-plus"></i></a>
                        <div class="float-right">
                            <form action="{{route('bahanbaku.search')}}" method="GET">
                                <div class="input-group mb-3">
                                    <input name="keyword" id="cari" type="text" name="cari" class="form-control"
                                        placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2"
                                        value="{{ Request()->keyword }}">
                                    <div class="input-group-append">
                                        <button id="btncaribuku" class="btn btn-outline-danger bg-danger" type="submit"
                                            id="button-addon2"><i class="fas fa-search text-light"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('message') }}
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">bahanbakun</th>
                                        <th></th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="mt-2">
                                    @foreach ($databahan as $no => $data)
                                        <tr>
                                            <th scope="row">{{ $databahan->firstItem() + $no }}</th>
                                            <td>
                                                <img src="{{ asset('assets/img/bahanbaku/' . $data->gambar) }}"
                                                    width="100" class="img-thumbnail mr-3 mt-4" align="left">
                                                <br>
                                                <a href="#" class="font-weight-normal" style="color: black">
                                                    <b>{{ $data->nama_bahanbaku }}</b> |
                                                    @if ($data->qty > 5)
                                                        <b class="text-success">Tersedia</b>
                                                    @else
                                                        <b class="text-danger">Tambah Bahan Baku</b>
                                                    @endif
                                                </a><br>
                                                <span> <b>Quantity :</b> {{ $data->qty }}</span><br>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="mt-4">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <form action="/bahanbaku/edit" class=""
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="row">

                                                                        <button type="submit" class="btn btn-success"
                                                                            title="Update">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <input type="hidden" name="id" id="id"
                                                                            value="{{ $data->id_bahanbaku }}">
                                                                        <input type="number" name="qty" id="qty"
                                                                            class="form-control my-1">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-5 ">


                                                                <a href="#" data-id=""
                                                                    class="btn btn-danger confirm_script-{{ $data->id_bahanbaku }}">
                                                                    <form
                                                                        action="{{ route('bahanbaku.delete', $data->id_bahanbaku) }}"
                                                                        class="delete_form-{{ $data->id_bahanbaku }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                    </form>
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        {{-- <a href="{{ route('bahanbaku.edit', $data->id_bahanbaku) }}"
                                                            class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                        <input type="number" name="qty" id="qty"
                                                            class="form-control mx-1" style="width: 30%">
                                                        <a href="#" data-id=""
                                                            class="btn btn-danger confirm_script-{{ $data->id_bahanbaku }} mr-3">
                                                            <form
                                                                action="{{ route('bahanbaku.delete', $data->id_bahanbaku) }}"
                                                                class="delete_form-{{ $data->id_bahanbaku }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                            </form>
                                                            <i class="fas fa-trash"></i>
                                                        </a> --}}

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @push('page-scripts')
                                            <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
                                        @endpush

                                        @push('after-scripts')
                                            <script>
                                                $(".confirm_script-{{ $data->id_bahanbaku }}").click(function(e) {
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
                                                                $('.delete_form-{{ $data->id_bahanbaku }}').submit();
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
                            {{ $databahan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('page-scripts')
    <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
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
                        swal('Data berhasil diubah', {
                            icon: 'success',
                            buttons: false,
                        });
                        $(`#delete${id}`).submit();
                    } else {
                        swal('Your imaginary file is safe!');
                    }
                });
        });
    </script>
@endpush
