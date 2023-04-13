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
                            <form class="needs-validation" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <h4>Buat akun member anda</h4>
                                <p>Masukkan data diri sesuai kolom di bawah</p>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        id="name" name="name" required placeholder="John Smith"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-8">
                                            <label class="col-form-label">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                                id="email" name="email" required placeholder="Test@gmail.com"
                                                value="{{ old('email') }}">
                                        </div>
                                        <div class="col-xl-4">
                                            <label class="col-form-label">No Whatsapp</label>
                                            <input class="form-control @error('whatsapp') is-invalid @enderror"
                                                type="number" id="whatsapp" name="whatsapp" required
                                                placeholder="08123456789" value="{{ old('whatsapp') }}">
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted mt-4 or">Alamat</h6>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Provinsi</label>
                                            <select
                                                class="js-example-basic-single col-sm-12 @error('state') is-invalid @enderror"
                                                id="state" name="state" required>
                                                <option>-- Pilih Provinsi --</option>
                                                @foreach ($listProvinsi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Kota / Kabupaten</label>
                                            <select
                                                class="js-example-basic-single col-sm-12 @error('city') is-invalid @enderror"
                                                id="city" name="city" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Kecamatan</label>
                                            <select
                                                class="js-example-basic-single col-sm-12 @error('district') is-invalid @enderror"
                                                id="district" name="district" required></select>
                                        </div>
                                        <div class="col-xl-6">
                                            <label class="col-form-label">Desa / Kelurahan</label>
                                            <select
                                                class="js-example-basic-single col-sm-12 @error('subdistrict') is-invalid @enderror"
                                                id="subdistrict" name="subdistrict" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-xl-3">
                                            <label class="col-form-label">Kode Pos</label>
                                            <input class="form-control @error('postal_code') is-invalid @enderror"
                                                type="number" id="postal_code" name="postal_code" required
                                                placeholder="12345">
                                        </div>
                                        <div class="col-xl-9">
                                            <label class="col-form-label">Nama jalan, gedung, no rumah</label>
                                            <input class="form-control @error('address') is-invalid @enderror"
                                                type="text" id="address" name="address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3 mb-0 d-grid">
                                    <button class="btn btn-dark btn-block" type="submit">Buat Akun</button>
                                </div>
                                <p class="mt-2 mb-0">Sudah memiliki akun?<a class="ms-2 text-danger"
                                        href="/">Masuk</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // inisialisasi javascript event handler
        $(document).ready(function() {
            $('#state').on('change', function() {
                getCity($(this).val());
            });

            $('#city').on('change', function() {
                getDistrict($(this).val());
            });

            $('#district').on('change', function() {
                getSubdistrict($(this).val());
            });
        });
    </script>
    @include('scripts.wilayah')
@endsection
