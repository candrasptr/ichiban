@extends('pelayan/layout3.master')

@section('title', 'Masakan')
@section('title2', 'edit')
@section('masakan', 'active')
@section('konten')

    <div class="card">
        <div class="card-header">
            <h4>Tambah masakan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pelayan.editmenu', $data->id_masakan) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @method('patch') --}}
                <div class="row">
                    <div class="col-md-2 mt-4 mb-2">
                        <img src="{{ asset('assets/img/produk/' . $data->gambar_masakan) }}" width="150"
                            class="img-thumbnail mr-3" align="left" id="preview">
                    </div>
                    <div class="col-md-10">
                        <label>Pilih Gambar Masakan</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input name="gambar_masakan" value="" type="file"
                                    accept="image/x-png,image/gif,image/jpeg" class="form-control" id="inputGambar_masakan"
                                    placeholder=" masukan file gambar buku" name="gambar">
                                <label class="custom-file-label" for="inputGambar_masakan">Cari Gambar</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label @error('namamasakan') class="text-danger" @enderror>
                                Nama Masakan
                                @error('namamasakan')
                                    {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="namamasakan"
                                @if (old('namamasakan')) value="{{ old('namamasakan') }}"
                                @else
                                value="{{ $data->nama_masakan }}"
                                 @endif
                                class="form-control" autocomplete="off">
                          </div>
                     </div>


                      <div class="col-md-6">
                        <div class="form-group">
                            <label @error('hargamasakan') class="text-danger" @enderror>
                                Harga Masakan
                                @error('hargamasakan')
                                    {{ $message }}
                                @enderror
                            </label>
                            <input type="number" name="hargamasakan"
                                @if (old('hargamasakan')) value="{{ old('hargamasakan') }}"
                                @else
                                    value="{{ $data->harga }}"
                                 @endif
                                class="form-control" autocomplete="off">
                          </div>
                      </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control" id="exampleFormControlSelect1">
              <option value="makanan">Coffee</option>
              <option value="minuman">Non Coffee</option>
              <option value="dessert">Makanan</option>
            </select>
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
        $('#inputGambar_masakan').on('change', function() {
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
            $("#inputGambar_masakan").change(function() {
                filePreview(this);
            });
        });
    </script>
@endpush
