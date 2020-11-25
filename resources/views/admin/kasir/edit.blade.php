@extends('admin/layout.master')

@section('title','kasir')
@section('title2','edit')
@section('user','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Edit kasir</h4>
  </div>
  <div class="card-body">
    <form action="#" method="POST">
    <!-- @csrf -->
    <div class="row">

      <div class="col-md-6">
          <div class="form-group">
            <label>Nama kasir</label>
            <input type="text" name="namauser" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Jenis kelamin</label>
            <input type="text" name="jk" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>No handphone</label>
            <input type="text" name="nohp" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label>username</label>
            <input type="text" name="username" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label>password</label>
            <input type="password" name="password" value="" class="form-control" autocomplete="off">  
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

