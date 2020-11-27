@extends('admin/layout.master')

@section('title','waiter')
@section('title2','edit')
@section('user','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Edit waiter</h4>
  </div>
  <div class="card-body">
    <form action="{{route('waiter.prosesedit',$data->id_waiter)}}" method="POST">
    @csrf
    @method('patch')
    <div class="row">

      <div class="col-md-6">
          <div class="form-group">
            <label @error('namawaiter') class="text-danger" @enderror>
            Nama waiter
            @error('namawaiter')
            {{$message}}
            @enderror
            </label>
            <input type="text" name="namawaiter" 
            @if(old('namawaiter'))
              value="{{ old('namawaiter') }}" 
            @else
              value="{{ $data->nama_waiter }}"
            @endif 
            class="form-control" autocomplete="off">  
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
            <input type="text" name="alamat" 
            @if(old('alamat'))
              value="{{ old('alamat') }}" 
            @else
              value="{{ $data->alamat }}"
            @endif
            class="form-control" autocomplete="off">  
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
            <input type="text" name="nohp" 
            @if(old('nohp'))
              value="{{ old('nohp') }}" 
            @else
              value="{{ $data->no_hp }}"
            @endif
            class="form-control" autocomplete="off">  
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
            <input type="text" name="email" 
            @if(old('email'))
              value="{{ old('email') }}" 
            @else
              value="{{ $data->email }}"
            @endif
            class="form-control" autocomplete="off">  
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
            <input type="text" name="username" 
            @if(old('username'))
              value="{{ old('username') }}" 
            @else
              value="{{ $data->username }}"
            @endif
            class="form-control" autocomplete="off">  
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
        <a href="{{ url()->previous() }}" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>


@endsection

