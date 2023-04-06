<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app"> --}}
    <meta name="author" content="mitracare">

    <link rel="icon" href="{{ asset('assets/images/logo/mc-icon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/mc-icon.png') }}" type="image/x-icon">

    <title>Mitra Care | Online Service Booking</title>

    {{-- Google font --}}
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    {{-- Select2 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/select2.css') }}">
    {{-- Datepicker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">

    @vite(['public/assets/scss/app.scss'])
</head>

<body>
    @yield('content')

    <!-- Latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/form-wizard/form-wizard-three.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.id.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script> --}}

    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @yield('script')
</body>

</html>
