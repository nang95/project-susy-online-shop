<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
        <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin./') }}">
            <span class="material-icons">grid_view</span>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Master</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.kategori') }}">
            <span class="material-icons">category</span>
            <span class="nav-link-text ms-1">Kategori</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.produk') }}">
            <span class="material-icons">shopping_bag</span>
            <span class="nav-link-text ms-1">Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.pelanggan') }}">
            <span class="material-icons">people</span>
            <span class="nav-link-text ms-1">Pelanggan</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Transaksi</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/profile.html">
            <span class="material-icons">receipt_long</span>
            <span class="nav-link-text ms-1">Pemesanan</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Info</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/profile.html">
            <span class="material-icons">call</span>
            <span class="nav-link-text ms-1">Kontak</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>