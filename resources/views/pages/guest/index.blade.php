<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="mitracare">
    <link rel="icon" href="{{ asset('assets/images/logo/mc-icon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/mc-icon.png') }}" type="image/x-icon">
    <title>Mitra Care</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&amp;display=swap" rel="stylesheet">

    @vite(['public/assets/scss/app.scss'])
</head>

<body class="landing-page">
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper landing-page">
        <section class="section-space feature-section pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-4">
                        <img class="img-fluid for-light" src="{{ asset('assets/images/logo/mc-logo.png') }}"
                            alt="mitracare">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 wow pulse">
                        <div class="landing-title">
                            <h3>Komitmen kami memberi kepastian <span class="gradient-1">layanan terbaik</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-4">
                    <div class="col-xxl-4 col-lg-4 col-sm-12">
                        <div class="feature-box common-card bg-feature-1">
                            <div class="text-center">
                                <div class="feature-icon mx-auto">
                                    <i class="fa fa-user fa-lg fa-2x"></i>
                                </div>
                                <h5>Login Member</h5>
                                <p class="mb-0 f-light">Nikmati kemudahan mengakses semua fitur dalam genggaman</p>
                                <div class="mt-5">
                                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-lg-4 col-sm-12">
                        <div class="feature-box common-card bg-feature-1">
                            <div class="text-center">
                                <div class="feature-icon mx-auto">
                                    <i class="fa fa-user-plus fa-lg fa-2x"></i>
                                </div>
                                <h5>Daftar Member</h5>
                                <p class="mb-0 f-light">Kemudahan mendaftar tanpa biaya untuk dapat akses fitur
                                    yang tersedia</p>
                                <div class="mt-5">
                                    <a href="{{ route('register') }}" class="btn btn-outline-dark">Daftar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-lg-4 col-sm-12">
                        <div class="feature-box common-card bg-feature-1">
                            <div class="text-center">
                                <div class="feature-icon mx-auto">
                                    <i class="fa fa-calendar fa-lg fa-2x"></i>
                                </div>
                                <h5>Reservasi Perbaikan</h5>
                                <p class="mb-0 f-light">Pilih lokasi dan waktu perbaikan unit sesuai keinginan kamu.</p>
                                <div class="mt-5">
                                    <a href="{{ route('booking') }}" class="btn btn-outline-dark">Booking</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
