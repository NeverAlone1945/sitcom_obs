@extends ('layouts.main.index')
@section('title', 'Online Service Booking')
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-5">
                <img class="bg-img-cover bg-center" src="{{ asset('assets/images/illustrasi/banner_booking.png') }}"
                    alt="mitracare">
            </div>
            <div class="col-xl-7">
                <div class="login-card">
                    <div>
                        <a class="logo" href="/">
                            <img class="img-fluid for-light" src="{{ asset('assets/images/logo/mc-logo.png') }}"
                                alt="mitracare">
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

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
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
                                        <div class="f1-step-icon"><i class="fa fa-laptop"></i></div>
                                        <p>Perangkat</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon"><i class="fa fa-calendar"></i></div>
                                        <p>Jadwal</p>
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
                                        <select class="js-example-basic-single col-sm-12" id="brand" name="brand"
                                            required="">
                                            <option value="">-- Pilih Merk --</option>
                                            @foreach ($brandList as $item)
                                                <option value="{{ Crypt::encryptString($item->code) }}">
                                                    {{ $item->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label>Type</label>
                                        <select class="js-example-basic-single col-sm-12" id="model" name="model"
                                            required="">
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
                language: 'en',
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
                    url: '/getModel?brandID=' + brandID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#model').empty();
                            $('#model').append('<option hidden>-- Pilih Model --</option>');
                            $.each(data, function(code, model) {
                                $('select[name="model"]').append('<option value="' + code + '">' +
                                    model + '</option>');
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
                    url: '/getBranch?cityID=' + cityID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#branch').empty();
                            $('#branch').append('<option hidden>-- Pilih Branch --</option>');
                            $.each(data, function(code, branch) {
                                $('select[name="branch"]').append('<option value="' + branch + '">' +
                                    code + '</option>');
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
                    url: '/getAddress?branchID=' + branchID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('.alamat').show();
                            $.each(data, function(code, address) {
                                $('#alamat').val(address);
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

            var today = new Date();
            var year = today.getFullYear();
            var month = ('0' + (today.getMonth() + 1)).slice(-2);
            var day = ('0' + today.getDate()).slice(-2);
            var hari_ini = year + '-' + month + '-' + day;

            var now = today.getHours();
            if (tanggal) {
                $.ajax({
                    url: '/getSetTimeBooking?branchID=' + branchID,
                    type: "GET",
                    dataType: "json",
                    success: function(setTime) {

                        if (setTime) {
                            $.ajax({
                                url: '/getTimeBooked?selectedDate=' + tanggal,
                                type: "GET",
                                dataType: "json",
                                success: function(booked) {
                                    // array untuk menyimpan jam yang sudah dipesan
                                    var booked_times = [];

                                    // loop melalui data booking dan menambahkan waktu yang sudah dibooking ke array booked_times
                                    for (var x = 0; x < booked.length; x++) {
                                        booked_times.push(booked[x].booking_time);
                                    }

                                    $('.label-jam').show();
                                    $('.input-time').empty();
                                    $('.input-time').show();
                                    $.each(setTime, function(key, time) {
                                        let start_time = parseInt(time.start_time.split(
                                            ':')[0], 10);
                                        let end_time = parseInt(time.end_time.split(':')[0],
                                            10);
                                        let minute_distance = parseInt(time
                                            .minute_distance);
                                        let jam = 0;
                                        let menit = 0;
                                        let i = 0;

                                        if (tanggal === hari_ini) {
                                            jam += now + 1;
                                        } else {
                                            jam += start_time;
                                        }

                                        while (jam <= end_time) {

                                            // tampilkan waktu saat ini
                                            let time = ((jam < 10 ? '0' + jam : jam) + ':' +
                                                (menit < 10 ?
                                                    '0' + menit : menit));

                                            // tambahkan jarak menit pada waktu saat ini
                                            menit += minute_distance;

                                            // jika menit mencapai 60, reset ke 0 dan tambahkan 1 jam
                                            if (menit === 60) {
                                                menit = 0;
                                                jam++;
                                            }

                                            // jika sudah menjadi end_time maka looping berhenti
                                            if (jam === end_time && menit > 0) {
                                                break;
                                            }

                                            let no = i++;

                                            // jika waktu tidak ada di booked_times, tambahkan sebagai opsi radio button
                                            if (!booked_times.includes(time)) {
                                                $('.input-time').append(
                                                    '<input type="radio" class="btn-check" name="jam" id="' +
                                                    no +
                                                    '" autocomplete="off" value="' +
                                                    time +
                                                    '"><label class="btn btn-outline-dark" for="' +
                                                    no + '">' +
                                                    time + '</label>'
                                                );
                                            }
                                        }
                                    });
                                }
                            });
                        }
                    }
                });
                // alert(now);
            }
        }
    </script>
@endsection
