<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aya Laundry</title>
    <link rel="stylesheet" href="{{ mix('css/homepage/homepage.css') }}">
</head>
<body>

    <div class="wrapper">
        <header>
            <nav>
                <section class="sec-one">
                    <img src="" alt="logo aya laundry">
                    <ul>
                        <li><a href="#">home</a></li>
                        <li><a href="#">about</a></li>
                        <li><a href="#">service</a></li>
                        <li><a href="#">contact</a></li>
                        <li><a href="#">pricing</a></li>
                    </ul>
                </section>
                <section class="sec-two">
                    <div class="contact-our">
                        <img src="{{ asset('images/telph-icon.png') }}" alt="telph-icn">
                        <div>
                            <p>kontak kami</p>
                            <p>+62 8953 9909 1596</p>
                        </div>
                    </div>
                    <a href="{{ url('/login'); }}">daftar</a>
                </section>
            </nav>
        </header>

        <main>
            <div class="main-wrapper">
                <p class="subtext-one">jasa laundry berpengalaman</p>
                <section class="text-header">
                    <p>
                        baju wangi bersih dan bebas <br> kotoran sampai ke serat <br> pakaian terdalam
                    </p>
                </section>
                <section class="subtext-two">
                    <p>awali harimu dengan pakaian wangi dan rapi</p>
                    <p>dijamin makin pede deh!</p>
                </section>
                <section class="btn-wrap">
                    <div>
                        <a class="to-login" href="#">masuk</a>
                        <a class="to-more" href="#">selengkapnya</a>
                    </div>
                </section>
            </div>
            <section class="bottom-main-content">
                <div class="main-desc">
                    <img src="{{ asset('images/ilustration.png'); }}" alt="ilustration-3d">
                </div>
                <div class="option-delivery">
                    <h2>bisa diantar atau diambil</h2>
                    <div class="sub-option-delivery-text">
                        <p>
                            kami telah memiliki pengalaman selama 25 tahun <br> selalu memberikan pelayanan yang terbaik bagi <br> pelanggan kami
                        </p>
                    </div>
                    <div class="advantage">
                        <li class="fas fa-check">buka setiap hari</li>
                        <li class="fas fa-check">berpengalaman</li>
                        <li class="fas fa-check">pelayanan terbaik</li>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>
</html>
