<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aya Laundry | Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- File style tambahan -->
    <link rel="stylesheet" href="{{ url('css/register.css') }}">
</head>

<body class="bg hold-transition register-page">
    <div class="register-box rounded" style="height: 600px;">
        <div class="card rounded">
            <div class="card-body register-card-body rounded">
                <p class="login-box-msg">Daftar Pengguna Baru Aya Laundry</p>
                <form action="{{ url('/register') }}" method="post">
                    @csrf
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="password" type="password" onkeyup="checkPassword()" class="form-control"
                            placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="retype-password" onkeyup=checkPassword() type="password" class="form-control" placeholder="Verify Password" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="social-auth-links text-center">
                        <button id="submit-btn" type="submit" class="btn btn-primary btn-block disabled">Daftar</button>
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p> Sudah Punya Akun? </p>
                    <a href="{{ url('/login') }}" class="text-center">
                        Masuk Sebagai Pengguna
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <script>
        function checkPassword() {
            let password = document.querySelector('#password').value;
            let retypePassword = document.querySelector('#retype-password').value;
            if (password === retypePassword) {
                document.querySelector('#submit-btn').classList.remove('disabled');
            } else {
                document.querySelector('#submit-btn').classList.add('disabled');
            }
        }
    </script>
</body>
</html>
