@extends('layouts.app')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('body')
  <div class="row">
    <div class="col-xs-12 col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            Transaksi Penjualan Per Bulan
          </h4>
        </div>
        <div class="card-body">
          <div class="chart-responsive">
            <canvas id="chart" height="135"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            Paving Terjual Per Tahun
          </h4>
        </div>
        <div class="card-body">
          <div class="chart-responsive">
            <canvas id="pie" height="120"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script>
    const barLabels = {!! json_encode($barLabels) !!};
    const pieLabels = {!! json_encode($pieLabels) !!};

    const barData = {
      labels: barLabels,
      datasets: [{
        label: 'Banyak Penjualan',
        backgroundColor: [
          'rgb(143, 214, 232)',
        ],
        borderColor: 'rgb(143, 214, 232)',
        data: {!! json_encode($barData) !!},
        // data: [1, 4, 3, 2, 2, 2, 5, 4, 5, 6, 3, 2, 3, 5, 6, 4, 2, 3, 5, 6, 6, 3, 1, 2, 3, 4, 5, 4, 3, 1, 2],
      }]
    };

    const pieData = {
      labels: pieLabels,
      datasets: [{
        label: 'Banyak Penjualan',
        backgroundColor: ['rgb(43, 79, 240)', 'rgb(8, 203, 207)', 'rgb(24, 20, 105)'],
        borderColor: 'rgb(255, 255, 255)',
        data: {!! json_encode($pieData) !!},
      }]
    };

    const barConfig = {
      type: 'line',
      data: barData,
    };

    const pieConfig = {
      type: 'pie',
      data: pieData,
    };

    const barChart = new Chart(
      document.getElementById('chart'),
      barConfig
    );

    const pieChart = new Chart(
      document.getElementById('pie'),
      pieConfig
    );
  </script>
@endsection
