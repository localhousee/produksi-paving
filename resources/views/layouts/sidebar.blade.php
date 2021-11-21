<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ADMIN</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="/">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Master Data -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
      <i class="fas fa-fw fa-cog"></i>
      <span>Master Data</span>
    </a>
    <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('pembeli.index') }}">Pembeli</a>
        <a class="collapse-item" href="{{ route('supplier.index') }}">Supplier</a>
        <a class="collapse-item" href="{{ route('bahan-baku.index') }}">Bahan Baku</a>
        <a class="collapse-item" href="{{ route('paving.index') }}">Paving</a>
        <a class="collapse-item" href="{{ route('produksi.index') }}">Produksi</a>
      </div>
    </div>
  </li>

  <!-- Transaksi -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Transaksi"
          aria-expanded="true" aria-controls="Transaksi">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Transaksi</span>
      </a>
      <div id="Transaksi" class="collapse" aria-labelledby="Transaksi"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('transaksi-jual.index') }}">Transaksi Jual</a>
              <a class="collapse-item" href="{{ route('transaksi-beli.index') }}">Transaksi Beli</a>
          </div>
      </div>
  </li>
</ul>
<!-- End of Sidebar -->