@extends('layouts.app')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('body')
  <div class="row">
    <div class="col-xs-12 col-md-6">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <i class="fas fa-chart-pie"></i>
            Sales
          </h4>
          <span class="float-right">
            <i class="fa fa-fw fa-chevron-up clickable"></i>
            <i class="fa fa-fw fa-times removecard clickable"></i>
          </span>
        </div>
        <div class="card-body">
          <div class="chart-responsive">
            <canvas id="pieChart" height="150"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

@endsection
