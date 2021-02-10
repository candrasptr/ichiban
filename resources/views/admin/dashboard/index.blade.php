@extends('admin/layout.master')

@section('title','Dashboard')
@section('title2','index')
@section('dashboard','active')

@section('konten')

<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-box"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Order </h4>
        </div>
        <div class="card-body">
          {{ $totaltransaksi }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-envelope"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Selesai</h4>
        </div>
        <div class="card-body">
          {{  $selesai }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-box-open"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Belum diantar</h4>
        </div>
        <div class="card-body">
          {{ $belumdiantar }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-users"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Belum dibayar</h4>
        </div>
        <div class="card-body">
          {{ $belumdibayar }}
        </div>
      </div>
    </div>
  </div>
</div>

  <h2 class="section-title">Pegawai</h2>
  <p class="section-lead">
    Daftar pegawai
  </p>

  <div class="row">
    <div class="col-12 col-md-6 col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4 class="d-inline">Kasir</h4>
          <div class="card-header-action">
            <a href="/kasirindex" class="btn btn-success">View All</a>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">
            @foreach ($kasir as $item)
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png" alt="avatar">
              <div class="media-body">
                <h6 class="media-title"><a href="#">{{ $item->username }}</a></h6>
                <div class="text-small text-muted">{{ $item->nama_kasir }} <div class="bullet"></div> <span class="text-primary">{{ $item->alamat }}</span></div>
              </div>
            </li>            
            @endforeach
          </ul>
        </div>
        <div class="card-header">
          <h4 class="d-inline">Waiter</h4>
          <div class="card-header-action">
            <a href="/waiterindex" class="btn btn-success">View All</a>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">
            @foreach ($waiter as $item)
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
              <div class="media-body">
                <h6 class="media-title"><a href="#">{{ $item->username }}</a></h6>
                <div class="text-small text-muted">{{ $item->nama_waiter }} <div class="bullet"></div> <span class="text-primary">{{ $item->alamat }}</span></div>
              </div>
            </li>            
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-hero">
        <div class="card-header">
          <div class="card-icon">
            <i class="far fa-question-circle"></i>
          </div>
          <h4>{{ $countfeedback }}</h4>
          <div class="card-description">Customers feedback</div>
        </div>
        <div class="card-body p-0">
          <div class="tickets-list">
            @foreach ($feedback as $item)
            <a href="#" class="ticket-item">
              <div class="ticket-title">
                <h4>{{ $item->isi }}</h4>
              </div>
              <div class="ticket-info">
                <div class="text-primary">{{ $item->tanggal }}</div>
              </div>
            </a>
            @endforeach
            <a href="/feedback-list" class="ticket-item ticket-more">
              View All <i class="fas fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

@push('page-scripts')

<script src="{{ asset('node_modules/simpleweather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{ asset('node_modules/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{ asset('node_modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('node_modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{ asset('node_modules/summernote/dist/summernote-bs4.js')}}"></script>
<script src="{{ asset('node_modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

@endpush

@push('after-scripts')

{{-- <script src="{{ asset('assets/js/page/index-0.js')}}"></script> --}}
<script>
  "use strict";
    
var statistics_chart = document.getElementById("myChart").getContext('2d');

var myChart = new Chart(statistics_chart, {
  type: 'line',
  data: {
    labels: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "jumat", "Sabtu"],
    datasets: [{
      label: 'Statistics',
      data: {{ $dataorderchrt }},
      borderWidth: 5,
      borderColor: '#6777ef',
      backgroundColor: '#6777ef',
      backgroundColor: 'transparent',
      pointBackgroundColor: '#fff',
      pointBorderColor: '#6777ef',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          stepSize: 150
        }
      }],
      xAxes: [{
        gridLines: {
          color: '#fbfbfb',
          lineWidth: 2
        }
      }]
    },
  }
});

var ctx = document.getElementById("myChart3").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [
        80,
        50,
        40,
        30,
        20,
      ],
      backgroundColor: [
        '#191d21',
        '#63ed7a',
        '#ffa426',
        '#fc544b',
        '#6777ef',
      ],
      label: 'Dataset 1'
    }],
    labels: [
      'Black',
      'Green',
      'Yellow',
      'Red',
      'Blue'
    ],
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});

// $('#visitorMap').vectorMap(
// {
//   map: 'world_en',
//   backgroundColor: '#ffffff',
//   borderColor: '#f2f2f2',
//   borderOpacity: .8,
//   borderWidth: 1,
//   hoverColor: '#000',
//   hoverOpacity: .8,
//   color: '#ddd',
//   normalizeFunction: 'linear',
//   selectedRegions: false,
//   showTooltip: true,
//   pins: {
//     id: '<div class="jqvmap-circle"></div>',
//     my: '<div class="jqvmap-circle"></div>',
//     th: '<div class="jqvmap-circle"></div>',
//     sy: '<div class="jqvmap-circle"></div>',
//     eg: '<div class="jqvmap-circle"></div>',
//     ae: '<div class="jqvmap-circle"></div>',
//     nz: '<div class="jqvmap-circle"></div>',
//     tl: '<div class="jqvmap-circle"></div>',
//     ng: '<div class="jqvmap-circle"></div>',
//     si: '<div class="jqvmap-circle"></div>',
//     pa: '<div class="jqvmap-circle"></div>',
//     au: '<div class="jqvmap-circle"></div>',
//     ca: '<div class="jqvmap-circle"></div>',
//     tr: '<div class="jqvmap-circle"></div>',
//   },
// });
</script>

@endpush