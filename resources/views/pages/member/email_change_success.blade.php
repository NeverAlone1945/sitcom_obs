@extends ('layouts.main.index')
@section('title', 'Perubahan Email')
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
                        <h4 class="mt-3">Perubahan Email Berhasil !</h4>
                        <a href="{{ route('member') }}" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
