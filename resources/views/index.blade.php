<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="/YOUR_PATH/favicon.ico" rel="icon" type="image/x-icon" />
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <title>Aya Laundry</title>
</head>

<body>

    <div class="wrapper">
        <nav class="navbar navbar-expand-lg bg-light shadow-lg fixed-top">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="">
                    <a class="fs-3 fw-bold navbar-brand text-uppercase text-dark" href="#">aya laundry</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="nav-list" id="navbarNav" style="width: 40%;">
                    <ul class="navbar-nav ml-auto d-flex justify-content-evenly align-items-human">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="#">home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="#">service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="{{ url('/login') }}">masuk</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="#">home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="#">service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="{{ url('/login') }}">masuk</a>
                            </li>
                            <div class="dropdown mt-1">
                                <a class="text-capitalize btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    menu
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-capitalize" href="{{ url( auth()->user()->role . '/dashboard') }}">dashboard</a></li>
                                <li><a class="dropdown-item text-capitalize" href="{{ url('/logout') }}">keluar</a></li>
                                </ul>
                            </div>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <div class="bg">
            <main class="content-wrapper m-5">
                <div>
                    <p class="text-light text-capitalize fs-1 fw-bold">
                        baju wangi bersih dan bebas kotoran <br> sampai ke serat pakaian terdalam
                    </p>
                    <p class="text-light text-capitalize fs-5">
                        awali harimu dengan pakaian wangi dan <br> rapi dijamin makin pede deh!
                    </p>

                    <section class="btn-wrapper d-flex gap-5 align-items-center">
                        <a href="{{url ('/register')}}" class="link-reg d-flex justify-content-center align-items-center">daftar</a>
                        <a href="#" class="d-flex justify-content-center align-items-center">selengkapnya</a>
                    </section>
                </div>
            </main>
        </div>

        <main class="about-us m-5 px-5 rounded bg-white shadow-lg position-relative"
            style="height: 500px; border: 2px solid #000">
            <div class="d-flex justify-content-between align-items-center">
                <div class="left">
                    <img src="{{ url('images/about-us.png') }}" alt=""
                        class="img-one shadow-lg img-fluid rounded position-absolute">
                    <img src="{{ url('images/about-us-2.jpg') }}" alt=""
                        class="img-two shadow-lg img-fluid rounded position-absolute">
                </div>
                <div class="right">
                    <p class="fs-3 mt-5 text-capitalize fw-bold text-center">tentang kami</p>
                    <p>
                        laundry yang berdiri sejak tahun 2015. Jl. Ikhwan Hadi No.55, <br> Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311, <br>
                        yang mampu bersaing dengan daerah sekitarnya
                    </p>
                    <p class="text-capitalize">jenis layanan laundry</p>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-primary">
                            Reguler: Rp 5.000
                        </li>
                        <li class="list-group-item list-group-item-primary">
                            Express: Rp 8.000
                        </li>
                        <li class="list-group-item list-group-item-primary">
                            Kilat : Rp 12.000
                        </li>
                    </ul>
                    <div class="contact-us p-2 d-flex aligns-items-center gap-5 bg-white shadow-lg rounded">
                        <div>
                            <img src="{{ url('images/telephone.png') }}" alt="" class="img-fluid">
                        </div>
                        <div>
                            <p class="text-capitalize text-primary">
                                kontak kami <br>
                                <b class="text-primary">
                                    +62 8953 8804 1354
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="mt-5 bg-info rounded shadow-lg right-content gap-1 d-flex justify-content-evenly align-items-center flex-row">
            <div class="img-wrapper">
                <img src="{{ url('images/ilustration.png') }}" class="img-fluid" alt="...">
            </div>
            <div class="text-wrapper">
                <p class="fw-bold fs-1 text-capitalize text-primary">bisa diantar atau diambil</p>
                <p class="fs-5 text-capitalize">
                    kami telah memiliki pengalaman selama 8 tahun,
                    <br> selalu memberikan pelayanan yang terbaik bagi
                    <br> pelanggan kami
                </p>
            </div>
        </div>

         <!-- Temukan Kami -->
        <section id="temukan-kami">
            <div class="temukan-kami-container text-center">
                <h3>Temukan Kami</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.829889124381!2d112.5192799!3d-7.8747761!2m3!1f0!2f16.44!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78873247d424a7%3A0x6b8077acc42d478a!2sAya%20Laundry%20super%20expres!5e0!3m2!1sen!2sid!4v1623217235220!5m2!1sen!2sid"
                    width="1465" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="clearfix"></div>
        </section>

        <footer class="footer mt-5 bg-info py-4">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="text-uppercase mb-4">Tentang Kami</h5>
                        <p>Laundry Aya adalah layanan laundry profesional yang menyediakan berbagai jenis layanan laundry dengan kualitas terbaik dan harga terjangkau.</p>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-uppercase mb-4">Layanan Kami</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" >Laundry Reguler</a></li>
                            <li><a href="#">Laundry Express</a></li>
                            <li><a href="#">Laundry Kilat</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-uppercase mb-4">Kontak Kami</h5>
                        <p>
                            Jalan Soekarnohatta No. 19, Malang<br>
                            +62 8953 8804 1354<br>
                            info@ayalaundry.com
                        </p>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 bg-light" >
                            <p class="text-center">&copy; 2023 Aya Laundry. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
