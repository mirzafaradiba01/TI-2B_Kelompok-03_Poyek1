<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> --}}
            <!-- Brand Logo -->
            {{-- <a href="{{ asset('assets/index3.html" class="brand-link') }}"> --}}
                {{-- <img src="https://www.eatlogos.com/food_and_drinks/png/vector_ice_cream_food_logo.png"
                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="50"
                    height="50"> --}}
                {{-- <span class="brand-text font-weight-light">AYA LAUNDRY</span>
            </a> --}}

            <!-- Sidebar -->
            {{-- @include('layouts.sidebar')

            <!-- /.sidebar -->
        </aside> --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                {{-- <div class="container-fluid"> --}}
                    {{-- <div class="row mb-2"> --}}
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <h1>AYA LAUNDRY</h1>
                          </div>                          

                        <!-- main content -->
                        @yield('content')
                        <section class="content">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kode Status</th>
                                <th>Tanggal Laundry</th>
                                <th>Jenis Laundry</th>
                                <th>Biaya Laudry</th>
                                <th>Total Biaya Laundry</th>
                                <th>No Hp</th>
                            </thead>
                            <body>
                                @if($status->count() > 0)
                                @foreach($status as $st => $s)
                                <tr>
                                    <td>{{++$se}}</td>
                                    <td>{{$s->nama_pelanggan}}</td>
                                    <td>{{$s->kode_status}}</td>
                                    <td>{{$s->tanggal_laundry}}</td>
                                    <td>{{$s->jenis_laundry}}</td>
                                    <td>{{$s->biaya_JL}}</td>
                                    <td>{{$s->total_laundry}}</td>
                                    <td>{{$s->no_hp}}</td>

                                </tr>
                            </body>
                        </section>
                        <!-- /.content -->

                        <!-- footer -->
                        @include('layouts.footer')
                        <!-- /.footer -->
                    {{-- </div> --}}
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
</body>
</html>
