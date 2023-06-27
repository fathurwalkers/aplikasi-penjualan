<div>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="{{ route('dashboard') }}">Stisla</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('dashboard') }}">St</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class=""><a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-square"></i>
                        <span>
                            Dashboard
                        </span></a>
                </li>
                <li class="menu-header">Menu Kelola</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Data Penjualan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('cek-penjualan') }}">Cek Penjualan</a></li>
                        <li><a class="nav-link" href="{{ route('daftar-penjualan', 'SD') }}">Data Penjualan SD</a></li>
                        <li><a class="nav-link" href="{{ route('daftar-penjualan', 'SMP') }}">Data Penjualan SMP</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('daftar-penjualan', 'SMA') }}">Data Penjualan SMA</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                        <span>Data Produk</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('daftar-produk', 'SD') }}">Produk SD</a></li>
                        <li><a class="nav-link" href="{{ route('daftar-produk', 'SMP') }}">Produk SMP</a></li>
                        <li><a class="nav-link" href="{{ route('daftar-produk', 'SMA') }}">Produk SMA</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                        <span>Peramalan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('perhitungan-peramalan') }}">Perhitungan Peramalan</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('dashboard') }}">Hasil Peramalan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i>
                        <span>Kelola User</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('dashboard') }}">Daftar User</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i>
                        <span>Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('laporan-penjualan') }}">Laporan Penjualan</a></li>
                    </ul>
                </li>
        </aside>
    </div>
</div>
