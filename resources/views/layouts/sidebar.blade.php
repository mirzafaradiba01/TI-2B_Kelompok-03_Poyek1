<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            {{-- <img src="https://www.eatlogos.com/food_and_drinks/png/vector_ice_cream_food_logo.png" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->username }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href={{ url('/dashboard') }} class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt" style="color: #fff;"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/pelanggan') }} class="nav-link">
                    <i class="nav-icon fas fa-users" style="color: #fff;"></i>
                    <p>Data Pelanggan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/petugas') }} class="nav-link">
                    <i class="nav-icon fas fa-user-tie" style="color: #fafafa;"></i>
                    <p>Data Petugas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/status') }} class="nav-link">
                    <i class="nav-icon fas fa-rotate" style="color: #fafafa;"></i>
                    <p>Status Laundry</p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/transaksi') }} class="nav-link">
                    <i class="nav-icon fas fa-money-bill-transfer" style="color: #fff;"></i>
                    <p>Transaksi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/komplain') }} class="nav-link">
                    <i class="nav-icon fas fa-comment-dots" style="color: #ffffff;"></i>
                    <p>Komplain</p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/cetak_laporan') }} class="nav-link">
                    <i class="nav-icon fas fa-file-pen" style="color: #ffffff;"></i>
                    <p>Cetak Laporan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href={{ url('/logout') }} class="nav-link">
                    <i class="nav-icon fas fa-arrow-right"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
