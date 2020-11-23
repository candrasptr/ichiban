@extends('guest.master')

@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-10 offset-md-1">    
      <div class="card mt-3">
          <div class="card-body">
            <a href="/menu" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i class="fas fa-plus"></i> Tambah</a>
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
                          <th scope="col">Pesanan</th>
                          <th></th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody class="mt-2">
                      <tr>
                          <th scope="row">1</th>
                          <td>
                            <img src="{{asset('assets/img/news/img01.jpg')}}" width="100" class="img-thumbnail mr-3 mt-2" align="left">
                            
                            <a href="#" class="font-weight-normal">
                                <b>Ramen</b>
                            </a><br>
                            <span>  <b>Harga  :</b> Rp 10.000</span><br>
                            <span>  <b>Kategori  :</b> Makanan</span><br>
                            <span>  <b>Status :</b> Tersedia</span><br>
                          </td>
                          <td></td>
                          <td>
                            <div class="input-group row">
                              <input type="number" class="form-control col-md-2" aria-label="Username" value="1" aria-describedby="basic-addon1">
                              <a href="#" class="btn btn-danger ml-2"><i class="fas fa-trash"></i></a>
                              <!-- <a href="#" data-id="" class="btn btn-danger confirm_script col-md-1 ml-2">
                                </a> -->
                            </div>
                          </td>
                      </tr>             
                  </tbody>
              </table>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                      <label>No meja</label>
                      <input type="number" class="form-control" name="nomeja">
                    </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" rows="1" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="col-md-11 offset-md-1">
                  <a href="" class="btn btn-danger px-5 mt-3 float-right">Pesan</a>
                </div>
              </div>  
          </div>

      </div>
    </div>
  </div>    
</div>

@endsection

@push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script").click(function(e) {
  // id = e.target.dataset.id;
  swal({
      title: 'Yakin hapus data?',
      text: 'Data yang dihapus tidak bisa dibalikin',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      // $('#delete').submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});
</script>
@endpush