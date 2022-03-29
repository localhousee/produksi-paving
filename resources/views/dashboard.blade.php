@extends('layouts.app')
@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('body')
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Pengeluaran (Bulanan)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ format_money($monthlyExpenses) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pemasukan (Bulanan)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ format_money($monthlyEarnings) }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Presentase Pembayaran
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $tasksPercentage }}%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $tasksPercentage }}%"
                      aria-valuenow="{{ $tasksPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Transaksi DP</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingPayments }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-lg-8">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Transaksi Per Bulan
          </h6>
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
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">
            Paving Terjual Per Tahun
          </h6>
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
    const pieLabels = {!! json_encode($pieLabels) !!};
    const pieData = {!! json_encode($pieData) !!};
    const barLabels = {!! json_encode($barLabels) !!};
    const barTransaksiJual = {!! json_encode($barTransaksiJual) !!};
    const barTransaksiBeli = {!! json_encode($barTransaksiBeli) !!};

    function random(min, max) {
      return min + Math.random() * (max - min);
    }

    function generateCyanColor() {
      h = 180;
      s = random(30, 100);
      l = random(20, 70);
      return 'hsl(' + h + ', ' + s + '%, ' + l + '%)';
    }

    function generateBlueColor() {
      h = 240;
      s = random(30, 100);
      l = random(20, 70);
      return 'hsl(' + h + ', ' + s + '%, ' + l + '%)';
    }

    function generateRandomColors(count) {
      colors = [];
      for (let i = 0; i < count; i++) {
        x = random(1, 10);
        if (x < 5) {
          colors.push(generateCyanColor());
        } else {
          colors.push(generateBlueColor());
        }
      }
      return colors;
    }

    const bar = {
      labels: barLabels,
      datasets: [{
          label: 'Transaksi Jual',
          backgroundColor: [
            generateCyanColor(),
          ],
          borderColor: generateCyanColor(),
          data: barTransaksiJual,
        },
        {
          label: 'Transaksi Beli',
          backgroundColor: [
            generateBlueColor(),
          ],
          borderColor: generateBlueColor(),
          data: barTransaksiBeli,
        }
      ]
    };

    const pie = {
      labels: pieLabels,
      datasets: [{
        label: 'Banyak Penjualan',
        backgroundColor: generateRandomColors(pieLabels.length),
        borderColor: 'rgb(255, 255, 255)',
        data: pieData,
      }]
    };

    const barConfig = {
      type: 'line',
      data: bar,
    };

    const pieConfig = {
      type: 'pie',
      data: pie,
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
