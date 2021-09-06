<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Laundry Sejahtera</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">L.S</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role == 'admin')
            <li class="active"><a class="nav-link" href="{{ url('/admin/home') }}"><i class="fas fa-columns"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Manajemen Pelanggan</li>
            <li class="nav-item">
                <a href="{{ url('/admin/registrasi_pelanggan') }}" class="nav-link"><i class="fas fa-users"></i><span>Registrasi
                    Pelanggan</span></a>
            </li>
            <li class="menu-header">Manajemen Toko</li>
            <li class="nav-item">
                <a href="{{ url('/admin/manajemen_outlet') }}" class="nav-link"><i class="fas fa-store"></i> <span>Manajemen Outlet</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-cube"></i> <span>Manajemen Produk</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-user"></i> <span>Manajemen Pegawai</span></a>
            </li>
            <li class="menu-header">Transaksi</li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-cash-register"></i> <span>Entri Transaksi</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
            </li>
            @elseif (auth()->user()->role == 'owner')
            <li class="active"><a class="nav-link" href="#"><i class="fas fa-columns"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Transaksi</li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
            </li>
            @elseif (auth()->user()->role == 'cashier')
            <li class="active"><a class="nav-link" href="#"><i class="fas fa-columns"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Manajemen Pelanggan</li>
            <li class="nav-item">
                <a href="{{ url('/admin/registrasi_pelanggan') }}" class="nav-link"><i class="fas fa-users"></i><span>Registrasi
                        Pelanggan</span></a>
            </li>
            <li class="menu-header">Transaksi</li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-cash-register"></i> <span>Entri Transaksi</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
            </li>
            @endif


        </ul>
        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div> --}}
    </aside>
</div>
