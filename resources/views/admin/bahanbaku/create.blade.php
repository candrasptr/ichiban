@extends('admin/layout.master')

@section('title', 'Bahan Baku')
@section('title2', 'tambah')
@section('Bahan Baku', 'active')
@section('konten')

    <div class="card">
        <div class="card-header">
            <h4>Tambah Bahan Baku</h4>
        </div>
        <div class="card-body">
            <form action="/bahanbaku/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2 mt-4 mb-2">
                        <img src="{{ asset('assets/img/nonimage.jpg') }}" width="150" class="img-thumbnail mr-3"
                            align="left" id="preview">
                    </div>
                    <div class="col-md-10 mt-4">
                        <label>Pilih Gambar Bahan Baku</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input name="gambar" type="file" accept="image/x-png,image/gif,image/jpeg"
                                    class="form-control" id="inputGambar" placeholder=" masukan file gambar buku"
                                    name="gambar">
                                <label class="custom-file-label" for="inputGambar">Cari Gambar</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nama') class="text-danger" @enderror>
                                Nama Bahan Baku
                                @error('nama')
                                    {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('qty') class="text-danger" @enderror>
                                Quantity
                                @error('qty')
                                    {{ $message }}
                                @enderror
                            </label>
                            <input type="number" name="qty" value="{{ old('qty') }}" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>



                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary" type="reset">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#inputGambar').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            var panjangnamafile = fileName.length;
            if (panjangnamafile > 22) {
                hasilpotong = fileName.substring(0, 22);
                $(this).next('.custom-file-label').html(hasilpotong);
            } else {
                $(this).next('.custom-file-label').html(fileName);
            }
        })
    </script>
@endsection

@push('page-scripts')
    <script type="text/javascript">
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $("#inputGambar").change(function() {
                filePreview(this);
            });
        });
    </script>
@endpush
