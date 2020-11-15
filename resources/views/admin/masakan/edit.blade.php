@extends('admin/layout.master')

@section('title','Masakan')
@section('title2','edit')

@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Edit masakan</h4>
  </div>
  <div class="card-body">
    <form action="#" method="POST">
    <!-- @csrf -->
    <div class="row">
      <div class="col-md-2">
        <img src="{{asset('assets/img/stisla-fill.svg')}}" width="150" class="img-thumbnail mr-3 mt-2" align="left">
      </div>
        <div class="col-md-5 mt-4">

          <div class="form-group">
            <div class="custom-file">
              <input type="file" class="form-control" id="inputGambar" placeholder=" masukan file gambar buku" name="gambar">
              <label class="custom-file-label" for="inputGambar">Pilih Gambar</label>
            </div>
          </div>

          <div class="form-group">
            <label>Nama Masakan</label>
            <input type="text" name="namamasakan" value="" class="form-control">  
          </div>
        </div>

        <div class="col-md-5">
          <div class="form-group">
            <label>Harga Masakan</label>
            <input type="number" name="hargamasakan" class="form-control">
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

@endsection

