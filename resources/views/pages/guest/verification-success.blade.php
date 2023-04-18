@extends ('layouts.main.index')
@section('title', 'Register')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-sm-12 mx-auto mt-5">
            <div class="card b-r-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="/">
                            <img src="{{ asset('assets/images/logo/mc-logo.png') }}" alt="mitracare-logo" width="200">
                        </a>
                    </div>
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/images/illustrasi/success.png') }}" alt="Sukses">
                        <h4>Email Telah Terverifikasi !</h4>
                        <p>
                            Saat ini akun anda sudah terverifikasi dan aktif sebagai member. <br>
                            Klik Login untuk mengakses lebih banyak fitur dari kami.
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-dark">Login</a>
                        <a href="/" class="btn btn-danger">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
