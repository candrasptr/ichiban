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
<div class="row">
  <div class="col-lg-8 col-md-8 col-8 col-sm-8" >
    <div class="card">
      <div class="card-header">
        <h4>Statistics</h4>
        <div class="card-header-action">
          <div class="btn-group">
            <a href="#" class="btn btn-primary">Week</a>
            <a href="#" class="btn">Month</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <canvas id="myChart" height="182"></canvas>
        <div class="statistic-details mt-sm-4">
          <div class="statistic-details-item">
            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
            <div class="detail-value">$243</div>
            <div class="detail-name">Today's Sales</div>
          </div>
          <div class="statistic-details-item">
            <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
            <div class="detail-value">$2,902</div>
            <div class="detail-name">This Week's Sales</div>
          </div>
          <div class="statistic-details-item">
            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
            <div class="detail-value">$12,821</div>
            <div class="detail-name">This Month's Sales</div>
          </div>
          <div class="statistic-details-item">
            <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
            <div class="detail-value">$92,142</div>
            <div class="detail-name">This Year's Sales</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 col-lg-4">
    <div class="card">
      <div class="card-header">
        <h4>Doughnut Chart</h4>
      </div>
      <div class="card-body py-5">
        <br><br><br>
        <canvas id="myChart3"></canvas>
        <br><br><br><br><br>
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