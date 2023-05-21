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
                        <li class="nav-item">
                            <a class="nav-link text-dark fs-5" aria-current="page" href="#">home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fs-5" href="#">cek status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fs-5" href="#">service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark fs-5" href="#">masuk</a>
                        </li>
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
                        <form action="#" method="POST">
                            <button class="fw-bold text-capitalize d-flex justify-content-center align-items-center"
                                type="sumbmit">daftar</button>
                        </form>
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
                        laundry yang berdiri sejak tahun 2015. berlokasi di jalan soekarnohatta <br> no. 19 malang, yang
                        mampu bersaing dengan daerah sekitarnya
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
                                <b class="text-primary">+62 8953 8804 1354</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div
            class="mt-5 bg-info rounded shadow-lg right-content gap-1 d-flex justify-content-evenly align-items-center flex-row">
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

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
