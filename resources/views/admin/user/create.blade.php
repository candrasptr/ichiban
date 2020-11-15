@extends('admin/layout.master')

@section('title','user')
@section('title2','tambah')

@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah user</h4>
  </div>
  <div class="card-body">
    <form action="#" method="POST">
    <!-- @csrf -->
    <div class="row">

      <div class="col-md-6">
          <div class="form-group">
            <label>Nama user</label>
            <input type="text" name="namauser" value="" class="form-control">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label>username</label>
            <input type="text" name="username" value="" class="form-control">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label>password</label>
            <input type="password" name="password" value="" class="form-control">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
            <label>level</label>
            <input type="text" name="level" value="" class="form-control">  
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

