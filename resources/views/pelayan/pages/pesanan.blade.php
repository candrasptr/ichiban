@extends('pelayan/layout3.master')

@section('title','Pelayan')
@section('title2','Pesanan')
@section('pesanan','active')
@section('konten')

<div class="section-body">

    <div class="row">
        <!-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/waiter_filter_penjualan" class="row" method="GET">
                        <div class="form-group col-md-6">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                @if( request('dari') !='' )
                                <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" required value="{{request('dari')}}">
                                @else
                                <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" value="<?php echo date('Y-m-d') ?>" id="aktif" required>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                @if( request('ke') !='' )
                                <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" required value="{{request('ke')}}">
                                @else
                                <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" value="<?php echo date('Y-m-d') ?>" id="aktif" required>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-danger btn-sm btn-block">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">

                    <div class="container m-0">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
                                <h5 class="text-danger">Sudah dibayar</h5>
                            </div>
                            <div class="col-md-6 ">
                                <div class="row">

                                    <a href="#" class="btn btn-danger mr-2">Selesai</a>
                                    <a href="#" class="btn btn-outline-danger mr-2">Belum diantar</a>
                                    <a href="/waiter_belum" class="btn btn-outline-danger mr-2">Belum dibayar</a>
                                    <a href="/waiter_batal" class="btn btn-outline-danger">Dibatalakan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->
                <div class="card-header row">
                    <div class="col-md-4">
                        <h5 class="text-danger">Daftar Transaksi</h5>
                    </div>
                    <div class="col-md-4 offset-md-4 align-items-end d-flex flex-column">
                        <div>

                            <a href="/pesanan" class="btn btn-danger">Selesai</a>
                            <a href="/belumdiantar" class="btn btn-outline-danger">Transaksi</a>
                            <!-- <a href="/waiter_belum" class="btn btn-outline-danger mr-2">Belum dibayar</a> -->
                            <!-- <a href="/waiter_batal" class="btn btn-outline-danger">Dibatalakan</a> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                    <table class="table table-md table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th>No meja</th>
                                <th>tanggal</th>
                                <th>total</th>
                                <th>bayar</th>
                                <th>kembalian</th>
                                <th>diantar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="mt-2">
                            @foreach ($transaksi as $item)
                            <tr>
                                <th scope="row">{{ $item->id_transaksi }}</th>
                                <td>
                                    <a href="{{ route('waiter.detail',$item->order_detail_id)}}" class="font-weight-normal">
                                        {{ $item->nama_pelanggan }}
                                    </a>
                                </td>
                                <td>{{ $item->no_meja }}</td>
                                <td>{{ $item->tanggal_transaksi }}</td>
                                <td>{{ $item->total_bayar }}</td>
                                <td>{{ $item->jumlah_pembayaran }}</td>
                                <td>{{ $item->kembalian }}</td>
                                <td>{{ $item->diantar }}</td>
                                <td>
                                    <a href="{{ route('waiter.struk',$item->order_detail_id)}}" class="btn btn-primary btn-block my-2"><i class="fas fa-print"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$transaksi->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection