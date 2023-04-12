@extends ('layouts.main.index')
@section('title', 'Register')
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo" href="{{ route('index') }}">
                                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/mc-logo.png') }}"
                                    alt="mitracare">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form">
                                <h4>Buat akun member anda</h4>
                                <p>Masukkan data diri sesuai kolom di bawah</p>
                                <h6 class="text-muted mt-4 or">Kontak</h6>
                                <div class="form-group">
                                    <label class="col-form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="namalengkap" name="namalengkap"
                                        required="" placeholder="John Smith">
                                </div>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-8">
                                            <label class="col-form-label">Email</label>
                                            <input class="form-control" type="email" id="email" name="email"
                                                required="" placeholder="Test@gmail.com">
                                        </div>
                                        <div class="col-xl-4">
                                            <label class="col-form-label">No Whatsapp</label>
                                            <input class="form-control" type="number" id="whatsapp" name="whatsapp"
                                                required="" placeholder="08123456789">
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted mt-4 or">Alamat</h6>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Provinsi</label>
                                            <select class="js-example-basic-single col-sm-12" id="provinsi"
                                                name="provinsi">
                                                @foreach ($listProvinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Kota / Kabupaten</label>
                                            <select class="js-example-basic-single col-sm-12" id="kota"
                                                name="kota"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Kecamatan</label>
                                            <select class="js-example-basic-single col-sm-12" id="kecamatan"
                                                name="kecamatan"></select>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Desa / Kelurahan</label>
                                            <select class="js-example-basic-single col-sm-12" id="kelurahan"
                                                name="kelurahan"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-3">
                                            <label class="col-form-label">Kode Pos</label>
                                            <input class="form-control" type="number" id="kodepos" name="kodepos"
                                                required="" placeholder="12345">
                                        </div>
                                        <div class="col-xl-9">
                                            <label class="col-form-label">Nama jalan, gedung, no rumah</label>
                                            <input class="form-control" type="text" id="jalan" name="jalan"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Agree with<a class="ms-2"
                                                href="#">Privacy Policy</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                </div>
                                <h6 class="text-muted mt-4 or">Or signup with</h6>
                                <div class="social mt-4">
                                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login"
                                            target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn
                                        </a><a class="btn btn-light" href="https://twitter.com/login?lang=en"
                                            target="_blank"><i class="txt-twitter"
                                                data-feather="twitter"></i>twitter</a><a class="btn btn-light"
                                            href="https://www.facebook.com/" target="_blank"><i class="txt-fb"
                                                data-feather="facebook"></i>facebook</a></div>
                                </div>
                                <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="/">Sign in</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
