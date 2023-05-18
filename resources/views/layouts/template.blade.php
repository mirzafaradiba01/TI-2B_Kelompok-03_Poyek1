<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.navbar')

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ asset('assets/index3.html" class="brand-link') }}">
                {{-- <img src="https://www.eatlogos.com/food_and_drinks/png/vector_ice_cream_food_logo.png"
                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="50"
                    height="50"> --}}
                <span class="brand-text font-weight-light">AYA LAUNDRY</span>
            </a>

            @include('layouts.sidebar')

        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <h1>AYA LAUNDRY</h1>
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
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    
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
    @stack('js')
</body>
</html>
