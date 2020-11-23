@extends('admin/layout.master')

@section('title','Orderan')
@section('title2','index')

@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      
      <div class="card mt-3">

          <div class="card-body">
            <a href="{{ route('masakan.tambah') }}" class="btn btn-icon icon-left btn-primary mb-3 px-3"><i class="fas fa-plus"></i> Tambah</a>
            @if(session('message'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                {{ session('message') }}
              </div>
            </div>
            @endif
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Orderan</th>
                          <th></th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                      <tr>
                          <th scope="row">1</th>
                          <td>
                            <br>
                            <a href="{{ route('orderan.detail')}}" class="font-weight-normal">
                                <b>Candra saputra</b>
                            </a><br>
                            <span>  <b>Masakan :</b> Ramen</span><br>
                            <span>  <b>No meja  :</b> Meja 1</span><br>
                            <span>  <b>Status  :</b> Belum bayar</span><br>                            
                          </td>
                          <td></td>
                          <td>
                            <a href="#" class="btn btn-success">Selesai</a>
                          </td>
                      </tr>
                      
                  </tbody>
              </table>
              
          </div>
      </div>
    </div>
  </div>    
</div>

@endsection

