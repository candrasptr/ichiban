@extends('admin/layout.master')

@section('title','Dashboard')
@section('title2','index')

@section('konten')

<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-box"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Order</h4>
        </div>
        <div class="card-body">
          10
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-envelope"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pending</h4>
        </div>
        <div class="card-body">
          42
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
          <h4>Selesai</h4>
        </div>
        <div class="card-body">
          1,201
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-users"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total admin</h4>
        </div>
        <div class="card-body">
          47
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-12 col-sm-12">
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

<script src="{{ asset('assets/js/page/index-0.js')}}"></script>

@endpush