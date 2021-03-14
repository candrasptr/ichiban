@extends('admin/layout.master')

@section('title','Admin')
@section('title2','edit')
@section('user','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Edit admin</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('prosesedit',$admin->id_admin) }}" method="POST">
      @csrf
      @method('patch')
    <div class="row">

      <div class="col-md-6">
          <div class="form-group">
            <label @error('namauser') class="text-danger" @enderror>
              Nama admin
              @error('namauser')
              {{$message}}
              @enderror
            </label>
            <input type="text" name="namauser"
            @if(old('namauser'))
              value="{{ old('namauser') }}" 
            @else
              value="{{ $admin->nama_admin }}"
            @endif 
            class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
          <label @error('username') class="text-danger" @enderror>
              username
              @error('username')
                | {{ $message }}
              @enderror
            </label>
            <input type="text" name="username" 
            @if(old('username'))
              value="{{ old('username') }}" 
            @else
              value="{{ $admin->username }}"
            @endif 
            class="form-control" autocomplete="off">  
          </div>
        </div>

      <div class="col-md-6">
          <div class="form-group">
          <label @error('password') class="text-danger" @enderror>
              password
              @error('password')
               | {{$message}}
              @enderror
            </label>
            <input type="password" name="password" value="" class="form-control" autocomplete="off">  
          </div>
        </div>

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="{{ route('admin') }}" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>


@endsection

