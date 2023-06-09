<div class="sidebar ">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            {{-- <img src="https://www.eatlogos.com/food_and_drinks/png/vector_ice_cream_food_logo.png" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->username }}</a>
        </div>
    </div>
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
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href={{ url('/' . auth()->user()->role . '/dashboard') }} class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt" style="color: #fff;"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            {{-- jika yang login admin atau petugas, selain itu tidak akan muncul --}}
            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'petugas')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users" style="color: #ffffff"></i>
                        <p>
                            Pelanggan
                            <i class="fas fa-angle-left right "></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . auth()->user()->role . '/pelanggan') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-check"></i>
                                <p>Data Pelanggan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- jika yang login hanya admin, maka menu di bawah akan muncul, kalau petugas dan pelanggan tidak akan muncul --}}
                @if (auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a href={{ url('/' . auth()->user()->role . '/petugas') }} class="nav-link">
                            <i class="nav-icon fas fa-user-tie" style="color: #fafafa;"></i>
                            <p>Data Petugas</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ url( auth()->user()->role . '/status_admin') }}" class="nav-link">
                    @elseif(auth()->user()->role === 'petugas')
                        <a href="{{ url( auth()->user()->role . '/status_petugas') }}" class="nav-link">
                    @endif
                        <i class="nav-icon fas fa-check" style="color: #fafafa;"></i>
                        <p>Status Laundry</p>
                    </a>
                </li>
            @endif

            {{-- jika yang login admin, maka menu di bawah akan muncul, kalau petugas, pelanggan tidak akan muncul --}}
            @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a href={{ url('/' . auth()->user()->role . '/transaksi') }} class="nav-link">
                        <i class="nav-icon fas fa-wallet" style="color: #fff;"></i>
                        <p>Status Pembayaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-window-restore " style="color: #ffffff"></i>
                        <p>
                            Order
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . auth()->user()->role . '/order/create') }}" class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p> Add Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . auth()->user()->role . '/order_selesai') }}" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>Orderan Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href={{ url('/' . auth()->user()->role . '/komplain') }} class="nav-link">
                        <i class="nav-icon fas fa-comment-dots" style="color: #ffffff;"></i>
                        <p>Komplain</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"style="color: #ffffff"></i>
                        <p>
                            Jenis Layanan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . auth()->user()->role . '/jenis_laundry') }}" class="nav-link">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p>Data Jenis</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-print " style="color: #ffffff"></i>
                        <p>
                            Cetak Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"">
                        <li class="nav-item">
                            <a href="{{ url( auth()->user()->role . '/form_cetak') }}" class="nav-link">
                                <i class="nav-icon fas fa-print" style="color: #ffffff;"></i>
                                <p>Cetak Transaksi</p>
                            </a>
                        </li>
                    </ul>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . auth()->user()->role . '/formLaporan') }}" class="nav-link">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p> Cetak Keuangan</p>
                            </a>
                        </li>
                    </ul>
                </li>

            @endif

            {{-- jika yang login pelanggan, maka menu di bawah akan muncul, kalau petugas, pelanggan tidak akan muncul --}}
            @if (auth()->user()->role === 'pelanggan')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/' . auth()->user()->role . '/profile') }}" class="nav-link">
                                <i class="fas fa-book pr-2"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/' . auth()->user()->role . '/pelanggan') }}" class="nav-link">
                                <i class="fas fa-book pr-2"></i>
                                <p>Hapus Akun</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php
                    $users = DB::table('pelanggan')->where('id_user', '=', auth()->user()->id)->get();
                    ?>
                    @foreach($users as $u)
                    <a href={{ url('/' . auth()->user()->role . '/status/'.$u->id) }} class="nav-link">
                        <i class="nav-icon fas fa-check" style="color: #fafafa;"></i>
                        <p>Cek Status</p>
                    </a>
                    @endforeach
                </li>
                <li class="nav-item">
                    <a href={{ url('/' . auth()->user()->role . '/komplain') }} class="nav-link">
                        <i class="nav-icon fas fa-comment-dots" style="color: #ffffff;"></i>
                        <p>Komplain</p>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href={{ url('/logout') }} class="nav-link">
                    <i class="nav-icon fas fa-power-off" style="color: #ffffff"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
