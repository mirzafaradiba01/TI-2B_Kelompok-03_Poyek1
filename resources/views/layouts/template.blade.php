<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <style>
    h1 {
      font-family: 'Josefin Sans', sans-serif;
    }
  </style>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.navbar')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ asset('assets/index3.html" class="brand-link') }}">
                <span class="brand-text font-weight-light">AYA LAUNDRY</span>
            </a>

            @include('layouts.sidebar')

        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <h1>Aya Laundry</h1>
                </div>

                    @yield('content')
                    <section class="content"></section>

                    @include('layouts.footer')
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
    </script>
    <script>
        function updateInputValue(select) {
          var biaya = select.options[select.selectedIndex].getAttribute("data-biaya");
          document.getElementById("inputBiaya").value = biaya;
          hitungTotal();
        }

        function hitungTotal() {
          var biayaInput = document.getElementById("inputBiaya").value;
          var beratInput = document.getElementsByName("berat")[0].value;

          var biaya = parseFloat(biayaInput);
          var berat = parseFloat(beratInput);

          var total = biaya * berat;

          document.getElementById("inputTotal").value = total.toFixed(0);
        }
      </script>

<script>

    // Fungsi untuk memperbarui status laundry
    function updateStatus(status) {
        // Kirim permintaan AJAX ke server untuk memperbarui status dengan status yang dipilih
        // Contoh menggunakan jQuery AJAX
        $.ajax({
            url: '/update-status', // Ganti dengan URL endpoint yang sesuai
            type: 'POST',
            data: { status: status },
            success: function(response) {
                // Berhasil memperbarui status
                var statusElement = document.querySelector("h1");
                statusElement.textContent = "Status Laundry: " + status;

                hidePopup();
            },
            error: function(error) {
                // Terjadi kesalahan dalam memperbarui status
                console.log(error);
            }
        });
    }
    </script>

    @stack('js')
</body>
</html>
