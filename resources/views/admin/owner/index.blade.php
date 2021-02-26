@extends('admin/layout.master')

@section('title','Owner')
@section('title2','index')
@section('user','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-body">
            
          {{-- Alert --}}
          @if(session('store'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>×</span>
              </button>
              {{ session('store') }}
            </div>
          </div>
          @endif

          {{-- tabel --}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Owner</th>
                <th>username</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="mt-2">
            @php
                $no = 1;
            @endphp
            @foreach ($data as $dt)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $dt->nama_owner }}</td>
                    <td>{{ $dt->username }}</td>
                    <td>

                    {{-- Button edit --}}
                    <a href="{{ route('owner.edit',$dt->id_owner) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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

