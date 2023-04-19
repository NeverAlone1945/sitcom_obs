@extends('layouts.main.member')

@section('title', 'Halaman Member')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row widget-grid">
            <div class="col-xxl-4 col-sm-6 box-col-6">
                {{-- Profile Card --}}
                <div class="card profile-box">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <div class="greeting-user">
                                    <h5 class="f-w-600">Hi, {{ Auth::user()->name }}</h5>
                                    <p>Selamat datang di Aplikasi Booking Service Mitracare</p>
                                    <div class="whatsnew-btn">
                                        <button class="btn btn-outline-white" type="button" data-bs-toggle="modal"
                                            data-bs-target="#showProfile">Lihat Profil</button>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div class="clockbox">
                                    <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                                        <g id="face">
                                            <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                            <path class="hour-marks"
                                                d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6">
                                            </path>
                                            <circle class="mid-circle" cx="300" cy="300" r="16.2">
                                            </circle>
                                        </g>
                                        <g id="hour">
                                            <path class="hour-hand" d="M300.5 298V142"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9">
                                            </circle>
                                        </g>
                                        <g id="minute">
                                            <path class="minute-hand" d="M300.5 298V67"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9">
                                            </circle>
                                        </g>
                                        <g id="second">
                                            <path class="second-hand" d="M300.5 350V55"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9">
                                            </circle>
                                        </g>
                                    </svg>
                                </div>
                                <div class="badge f-10 p-0" id="txt"></div>
                            </div>
                        </div>
                        <div class="cartoon px-3">
                            <img class="img-fluid" src="{{ asset('assets/images/illustrasi/welcome.svg') }}"
                                alt="vector women with leptop">
                        </div>
                    </div>
                </div>

                {{-- Profile Detail (Modal) --}}
                <div class="modal fade" id="showProfile" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Profil Saya</h5>
                                <button class="btn-close close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="formProfile">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ $member->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <span class="pull-right">
                                            <a href="{{ route('member.editemail', ['id' => Crypt::encryptString(Auth::user()->code)]) }}"
                                                class="text-danger">Ubah</a>
                                        </span>
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ $member->email }}" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nomor Whatsapp</label>
                                        <input class="form-control" type="number" id="whatsapp" name="whatsapp"
                                            value="{{ $member->whatsapp }}" required>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6 mb-3">
                                            <label>Provinsi</label>
                                            <select class="js-example-basic-single col-sm-12" id="state"
                                                name="state" required>
                                                <option>-- Pilih Provinsi --</option>
                                                @foreach ($listProvinsi as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $member->state ? 'selected=selected' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Kota / Kabupaten</label>
                                            <select class="js-example-basic-single col-sm-12" id="city"
                                                name="city" required>
                                                <option>-- Pilih Kota / Kabupaten --</option>
                                                @foreach ($listKota as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $member->city ? 'selected=selected' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6 mb-3">
                                            <label>Kecamatan</label>
                                            <select class="js-example-basic-single col-sm-12" id="district"
                                                name="district" required>
                                                <option>-- Pilih Kecamatan --</option>
                                                @foreach ($listKecamatan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $member->district ? 'selected=selected' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Kelurahan</label>
                                            <select class="js-example-basic-single col-sm-12" id="subdistrict"
                                                name="subdistrict" required>
                                                <option>-- Pilih Kelurahan --</option>
                                                @foreach ($listKelurahan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $member->subdistrict ? 'selected=selected' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-3 mb-3">
                                            <label>Kode Pos</label>
                                            <input class="form-control" type="number" id="postal_code"
                                                name="postal_code" value="{{ $member->postal_code }}" required>
                                        </div>
                                        <div class="col-md-9">
                                            <label>Nama jalan, gedung, no rumah</label>
                                            <input class="form-control" type="text" id="address" name="address"
                                                value="{{ $member->address }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger close" type="button"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button class="btn btn-dark submitbutton" type="submit">Perbarui Profil</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Promo Member --}}
                <div class="card height-equal">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                            <h5>Promo</h5>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                    </div>
                </div>
            </div>

            {{-- Riwayat Booking --}}
            <div class="col-xxl-4 col-md-6 notification box-col-6">
                <div class="card">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                            <h5 class="m-0">Riwayat Booking Service</h5>

                            <a href="{{ route('booking') }}" class="btn btn-outline-dark">Buat Reservasi</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <ul>
                            @forelse ($booking as $item)
                                <li class="d-flex">
                                    <div class="activity-dot-primary"></div>
                                    <div class="w-100 ms-3">
                                        <p class="d-flex justify-content-between mb-2">
                                            <span
                                                class="date-content light-background">{{ \Carbon\Carbon::parse($item->booking_date)->format('d F Y') }}
                                                {{ $item->booking_time }}
                                            </span>
                                        </p>
                                        <h6>#{{ $item->booking_number }}<span class="dot-notification"></span></h6>
                                        <p class="f-light text-wrap">{{ $item->branch_name }}
                                            <br>{{ $item->branch_address }} <br>Tlp: {{ $item->branch_phone }}
                                        </p>
                                    </div>
                                </li>
                            @empty
                                <span class="text-danger">Belum ada Riwayat Booking</span>
                            @endforelse
                        </ul>
                        {{ $booking->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/clock.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script>
        // inisialisasi javascript event handler
        $(document).ready(function() {
            getProfile();
            $('#state').on('change', function() {
                getCity($(this).val());
            });

            $('#city').on('change', function() {
                getDistrict($(this).val());
            });

            $('#district').on('change', function() {
                getSubdistrict($(this).val());
            });

            $("#formProfile").on("submit", function(e) {
                e.preventDefault();
                $(".submitbutton", this).parent().append(
                    "<span class='cl1'><i class='fas fa-spin fa-compact-disc'></i> Memproses...</span>"
                );
                $(".submitbutton", this).hide();
                var submitbtn = $(".submitbutton", this);

                $.post("/member", $(this).serialize(), function(res) {
                    if (res.success == true) {
                        swal.fire("Berhasil!", res.message, "success").then((
                            value) => {
                            location.reload();
                        });
                    } else {
                        swal.fire("Gagal!", res.message,
                            "error");
                        submitbtn.show();
                        submitbtn.parent().find("span").remove();
                    }
                });
            });
        });

        function getProfile() {
            $.ajax({
                type: "GET",
                url: "/getProfile",
                dataType: 'JSON',
                success: function(res) {
                    if (res.address == null || res.state == null) {
                        Swal.fire({
                            title: 'Profil Belum Lengkap!',
                            text: "Silahkan lengkapi profil terlebih dahulu.",
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Lengkapi Profil',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var showProfile = new bootstrap.Modal(document.getElementById(
                                    'showProfile'), {
                                    backdrop: 'static'
                                });
                                showProfile.show();
                                $(".close").hide();
                            }
                        });
                    }
                }
            });
        }
    </script>
    @include('scripts.wilayah')
@endsection
