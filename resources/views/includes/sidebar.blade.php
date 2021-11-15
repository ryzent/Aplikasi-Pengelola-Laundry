<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">{{auth()->user()->toko['nama'] }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">L.S</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role == '1')
            <li class="nav-item {{ Request::is('superadmin') ? 'active' : '' }}">
                <a class="nav-link " href="{{ url('superadmin')}}"><i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Manajemen Pelanggan</li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_pelanggan') ? 'active' : '' }}">
                <a href="{{ route('manajemen_pelanggan.index')}}" class="nav-link "><i class="fas fa-users"></i><span>Manajemen
                    Pelanggan</span></a>
            </li>
            {{-- <li class="nav-item {{ (request()->segment(2) == 'voucher') ? 'active' : '' }}">
                <a href="{{ route('voucher.index')}}" class="nav-link "><i class="fas fa-ticket-alt"></i><span>Voucher</span></a>
            </li> --}}
            <li class="menu-header">Manajemen Toko</li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_outlet') ? 'active' : '' }}">
                <a href="{{ route('manajemen_outlet.index')}}" class="nav-link"><i class="fas fa-store"></i> <span>Manajemen Outlet</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_produk') ? 'active' : '' }}">
                <a href="{{ route('manajemen_produk.index')}}" class="nav-link"><i class="fas fa-cube"></i> <span>Manajemen Produk</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_pegawai') ? 'active' : '' }}">
                <a href="{{ route('manajemen_pegawai.index')}}" class="nav-link"><i class="fas fa-user"></i> <span>Manajemen Pegawai</span></a>
            </li>
            <li class="menu-header">Transaksi</li>
            <li class="nav-item {{ (request()->segment(2) == 'transaksi') ? 'active' : '' }}">
                <a href="{{ route('transaksi.index') }}" class="nav-link"><i class="fas fa-cash-register"></i> <span>Entri Transaksi</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(2) == 'laporan') ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
            </li>
            @elseif (auth()->user()->role == '2')
            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                <a class="nav-link " href="{{ url('admin')}}"><i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Manajemen Pelanggan</li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_pelanggan') ? 'active' : '' }}">
                <a href="{{ route('manajemen_pelanggan.index')}}" class="nav-link "><i class="fas fa-users"></i><span>Manajemen
                    Pelanggan</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(2) == 'voucher') ? 'active' : '' }}">
                <a href="{{ route('voucher.index')}}" class="nav-link "><i class="fas fa-ticket-alt"></i><span>Voucher</span></a>
            </li>
            <li class="menu-header">Manajemen Toko</li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_outlet') ? 'active' : '' }}">
                <a href="{{ route('manajemen_outlet.index')}}" class="nav-link"><i class="fas fa-store"></i> <span>Manajemen Outlet</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_produk') ? 'active' : '' }}">
                <a href="{{ route('manajemen_produk.index')}}" class="nav-link"><i class="fas fa-cube"></i> <span>Manajemen Produk</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(2) == 'manajemen_pegawai') ? 'active' : '' }}">
                <a href="{{ route('manajemen_pegawai.index')}}" class="nav-link"><i class="fas fa-user"></i> <span>Manajemen Pegawai</span></a>
            </li>
            <li class="menu-header">Transaksi</li>
            <li class="nav-item {{ (request()->segment(2) == 'transaksi') ? 'active' : '' }}">
                <a href="{{ route('transaksi.index') }}" class="nav-link"><i class="fas fa-cash-register"></i> <span>Entri Transaksi</span></a>
            </li>
            <li class="nav-item {{ (request()->segment(2) == 'laporan') ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
            </li>

            @elseif (auth()->user()->role == '4')
            <li class="nav-item {{ (request()->is('pemilik')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('pemilik') }}"><i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Transaksi</li>
            <li class="nav-item {{ (request()->is('laporan')) ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
            </li>

            @elseif (auth()->user()->role == '3')
            <li class="nav-item {{ (request()->is('kasir')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('kasir') }}"><i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Manajemen Pelanggan</li>
            <li class="nav-item {{ (request()->segment(1) == 'manajemen_pelanggan') ? 'active' : '' }}">
                <a href="{{ route('manajemen_pelanggan.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Manajemen
                        Pelanggan</span></a>
            </li>
            <li class="menu-header">Transaksi</li>
            <li class="nav-item {{ (request()->is('transaksi')) ? 'active' : '' }}">
                <a href="{{ route('transaksi.index') }}" class="nav-link"><i class="fas fa-cash-register"></i> <span>Entri Transaksi</span></a>
            </li>
            <li class="nav-item {{ (request()->is('laporan')) ? 'active' : '' }}">
                <a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
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
