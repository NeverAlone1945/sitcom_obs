@extends('layouts.booking.index')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-5">
                <img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/4.png') }}" alt="mitracare">
            </div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <div>
                        <a class="logo" href="/"><img class="img-fluid for-light"
                                src="{{ asset('assets/images/logo/mc-logo.png') }}" alt="looginpage"><img
                                class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                alt="looginpage">
                        </a>
                        <div class="login-main">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success mb-1 mt-1">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h5 class="text-center">Online Service Booking</h5>
                            <form class="f1" action="{{ route('booking.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="f1-steps">
                                    <div class="f1-progress">
                                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="4">
                                        </div>
                                    </div>
                                    <div class="f1-step active">
                                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                        <p>Data Diri</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon"><i class="fa fa-mobile"></i></div>
                                        <p>Perangkat</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon"><i class="fa fa-calendar"></i></div>
                                        <p>Jadwal Booking</p>
                                    </div>
                                </div>
                                <fieldset>
                                    <div class="mb-2">
                                        <label>Nama Lengkap</label>
                                        <input class="form-control" type="text" id="namalengkap" name="namalengkap"
                                            placeholder="Nama Lengkap" value="{{ old('namalengkap') }}" required="">
                                    </div>
                                    <div class="mb-2">
                                        <label>Email</label>
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="name@example.com" required="">
                                    </div>
                                    <div class="mb-2">
                                        <label>No Handphone / Whatsapp</label>
                                        <input class="form-control" type="number" id="whatsapp" name="whatsapp"
                                            placeholder="081234567890" required="">
                                    </div>
                                    <div class="f1-buttons">
                                        <button class="btn btn-dark btn-next" type="button">Next</button>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="mb-2">
                                        <label>Merk</label>
                                        <select class="js-example-basic-single col-sm-12" id="brand" name="brand">
                                            <option value="">-- Pilih Merk --</option>
                                            @foreach ($brandList as $item)
                                                <option value="{{ Crypt::encryptString($item->code) }}">
                                                    {{ $item->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label>Type</label>
                                        <select class="js-example-basic-single col-sm-12" id="model" name="model">
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label>Serial Number</label>
                                        <input class="form-control" type="text" id="serialnumber" name="serialnumber"
                                            placeholder="Serial Number" required="">
                                    </div>
                                    <div class="mb-2">
                                        <label>Keluhan</label>
                                        <textarea class="form-control" type="text" id="keluhan" name="keluhan" rows='3' placeholder="Keluhan"
                                            required=""></textarea>
                                    </div>
                                    <div class="f1-buttons d-flex justify-content-between">
                                        <button class="btn btn-danger btn-previous" type="button">Back</button>
                                        <button class="btn btn-dark btn-next" type="button">Next</button>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="mb-2">
                                        <label>Kota</label>
                                        <select class="js-example-basic-single col-sm-12" id="kota" name="kota">
                                            <option value="">-- Pilih Kota --</option>
                                            @foreach ($cityList as $item)
                                                <option value="{{ Crypt::encryptString($item->city_code) }}">
                                                    {{ $item->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label>Cabang</label>
                                        <select class="js-example-basic-single col-sm-12" id="branch" name="branch">
                                        </select>
                                    </div>
                                    <div class="mb-2 alamat" style="display:none">
                                        <label>Alamat</label>
                                        <textarea class="form-control col-sm-12" id="alamat" name="alamat" rows="3" readonly></textarea>
                                    </div>
                                    <div class="mb-2 input-date" style="display: none">
                                        <label>Tanggal</label>
                                        <input class="form-control digits tanggal" id="tanggal" name="tanggal"
                                            type="text">
                                    </div>
                                    <div class="mb-2 label-jam">
                                        <label class="label-jam" style="display:none">Jam</label>
                                        <div class="input-time d-flex flex-wrap justify-content-between btn-group"
                                            role="group" style="display: none">
                                        </div>
                                    </div>
                                    <div class="f1-buttons d-flex justify-content-between">
                                        <button class="btn btn-danger btn-previous" type="button">Back</button>
                                        <button class="btn btn-dark btn-submit" type="submit">Submit</button>
                                    </div>
                                </fieldset>
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
            // ajax for get data model base on select brand
            $('#brand').on('change', function() {
                getModel()
            });

            // ajax for get data branch base on select kota
            $('#kota').on('change', function() {
                getBranch();
            });

            // ajax for get data address base on select branch
            $('#branch').on('change', function() {
                getAddress();
                getListTime();
            });

            // custom datepicker
            "use strict";
            $('.tanggal').datepicker({
                language: 'id',
                minDate: new Date()
            });

            // ajax for get data set time on change tanggal
            $('.tanggal').datepicker({
                onSelect: function() {
                    getListTime();
                }
            })
        });

        function getModel() {
            var brandID = $('#brand').val();
            if (brandID) {
                $.ajax({
                    url: '/getModel/' + brandID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#model').empty();
                            $('#model').append('<option hidden>-- Pilih Model --</option>');
                            $.each(data, function(key, model) {
                                $('select[name="model"]').append(
                                    '<option value="' + model.code + '">' +
                                    model
                                    .description + '</option>');
                            });
                        } else {
                            $('#model').empty();
                        }
                    }
                });
            } else {
                $('#model').empty();
            }
        }

        function getBranch() {
            var cityID = $('#kota').val();
            if (cityID) {
                $.ajax({
                    url: '/getBranch/' + cityID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#branch').empty();
                            $('#branch').append(
                                '<option hidden>-- Pilih Branch --</option>');
                            $.each(data, function(key, branch) {
                                $('select[name="branch"]').append(
                                    '<option value="' + branch.code + '">' +
                                    branch
                                    .description + '</option>');
                            });
                        } else {
                            $('#branch').empty();
                        }
                    }
                });
            } else {
                $('#branch').empty();
            }
        }

        function getAddress() {
            var branchID = $('#branch').val();
            if (branchID) {
                $.ajax({
                    url: '/getAddress/' + branchID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('.alamat').show();
                            $.each(data, function(key, branch) {
                                $('#alamat').val(branch.address);
                                $('.input-date').show();
                            });
                        } else {
                            $('#alamat').empty();
                        }
                    }
                });
            } else {
                $('#alamat').empty();
            }
        };

        function getListTime() {
            var branchID = $('#branch').val();
            var tanggal = $('#tanggal').val();
            if (tanggal) {
                $.ajax({
                    url: '/getSetTimeBooking/' + branchID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('.label-jam').show();
                            $('.input-time').empty();
                            $('.input-time').show();
                            $.each(data, function(key, time) {
                                let start_time = parseInt(time.start_time
                                    .split(':')[
                                        0], 10);
                                let end_time = parseInt(time.end_time
                                    .split(':')[
                                        0], 10);
                                let minute_distance = parseInt(time
                                    .minute_distance);
                                let jam = start_time;
                                let menit = 0;
                                let i = 0;

                                while (jam <= end_time) {
                                    // tampilkan waktu saat ini
                                    let time = ((jam < 10 ? '0' + jam : jam) + ':' + (menit < 10 ?
                                        '0' + menit : menit));
                                    console.log(time);

                                    // tambahkan 30 menit pada waktu saat ini
                                    menit += minute_distance;

                                    // jika menit mencapai 60, reset ke 0 dan tambahkan 1 jam
                                    if (menit === 60) {
                                        menit = 0;
                                        jam++;
                                    }

                                    if (jam === end_time && menit > 0) {
                                        break;
                                    }

                                    let no = i++;

                                    $('.input-time').append(
                                        '<input type="radio" class="btn-check" name="jam" id="' +
                                        no +
                                        '" autocomplete="off" value="' + time +
                                        '"><label class="btn btn-outline-dark" for="' +
                                        no + '">' +
                                        time + '</label>'
                                    );
                                }
                            });
                        }
                    }
                });
            }
        }
    </script>
@endsection
