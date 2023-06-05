@extends('admin/layout.master')

@section('title','pelayan')
@section('title2','tambah')
@section('user','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah pelayan</h4>
  </div>
  <div class="card-body">
    <form action="/prosescreatepelayan" method="POST">
    @csrf
    <div class="row">

      <div class="col-md-6">
          <div class="form-group">
          <label @error('namapelayan') class="text-danger" @enderror>
            Nama pelayan
            @error('namapelayan')
            {{$message}}
            @enderror
            </label>
            <input type="text" name="namapelayan" value="{{old('namapelayan')}}" class="form-control" autocomplete="off">  
          </div>
        </div>
      
      <div class="col-md-6">
        <div class="form-group">
          <label>Jenis kelamin</label>
          <select name="jk" class="form-control" id="exampleFormControlSelect1">
            <option value="Laki-Laki">LAKI-LAKI</option>
            <option value="Perempuan">PEREMPUAN</option>
          </select>  
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" value="{{old('alamat')}}" class="form-control" autocomplete="off">  
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
        <label @error('nohp') class="text-danger" @enderror>
          handphone
          @error('nohp')
          {{$message}}
          @enderror
          </label>
          <input type="text" name="nohp" value="{{old('nohp')}}" class="form-control" autocomplete="off">  
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
        <label @error('email') class="text-danger" @enderror>
          Email
          @error('email')
          {{$message}}
          @enderror
          </label>
          <input type="text" name="email" value="{{old('email')}}" class="form-control" autocomplete="off">  
        </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
          <label @error('username') class="text-danger" @enderror>
            username
            @error('username')
            {{$message}}
            @enderror
            </label>
            <input type="text" name="username" value="{{old('username')}}" class="form-control" autocomplete="off">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
          <label @error('password') class="text-danger" @enderror>
            password
            @error('password')
            {{$message}}
            @enderror
            </label>
            <input type="password" name="password" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="{{ route('pelayan') }}" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection

