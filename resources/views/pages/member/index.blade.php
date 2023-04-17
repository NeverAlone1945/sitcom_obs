@extends('layouts.main.member')

@section('title', 'Default')

@section('css')

@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row widget-grid">
            <div class="col-xxl-4 col-sm-6 box-col-8">
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
                <div class="modal fade" id="showProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Profil Saya</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ $member->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ $member->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Nomor Whatsapp</label>
                                        <input class="form-control" type="number" id="whatsapp" name="whatsapp"
                                            value="{{ $member->whatsapp }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Provinsi</label>
                                        <select
                                            class="js-example-basic-single col-sm-12 @error('state') is-invalid @enderror"
                                            id="state" name="state" required>
                                            <option>-- Pilih Provinsi --</option>
                                            @foreach ($listProvinsi as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $member->state ? 'selected="selected"' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Tutup</button>
                                <button class="btn btn-dark" type="button">Perbarui Profil</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-md-6 notification box-col-6">
                <div class="card">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                            <h5 class="m-0">Riwayat Booking Service</h5>

                            <a href="#" class="btn btn-outline-dark">Buat Reservasi</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <ul>
                            @foreach ($booking as $item)
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
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
    <script src="{{ asset('assets/js/clock.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
@endsection
