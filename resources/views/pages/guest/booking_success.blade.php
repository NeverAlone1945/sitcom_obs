@extends('layouts.main.index')
@section('title', 'Booking Sukses')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-sm-12 mx-auto mt-5">
            <div class="card b-r-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="/"><img src="{{ asset('assets/images/logo/mc-logo.png') }}" alt="mitracare-logo"
                                width="200"></a>
                    </div>
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/images/illustrasi/success.png') }}" alt="Sukses">
                        <h4>Reservasi Berhasil</h4>
                    </div>
                    <p>Hi, {{ $data->name }}</p>
                    <p>Terimakasih telah melakukan janji temu / booking order dengan data sebagai berikut:</p>
                    <div class="table-responsive mb-3">
                        <table>
                            <tr>
                                <td>Nomor Booking</td>
                                <td>:</td>
                                <td>{{ $data->booking_number }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Waktu Kedatangan</td>
                                <td>:</td>
                                <td>{{ date('d F Y', strtotime($data->booking_date)) }}
                                    {{ $data->booking_time }}</td>
                            </tr>
                            <tr>
                                <td>Cabang</td>
                                <td>:</td>
                                <td>{{ $data->branch_name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $data->branch_address }}</td>
                            </tr>
                        </table>
                    </div>
                    <p>Pelanggan diharapkan untuk datang 15 menit sebelum jadwal waktu kedatangan untuk
                        mempercepat proses antrian dilokasi yang sudah dipilih</p>
                    <p>Terimakasih,</p>
                    <p>Mitracare</p>
                    <hr>
                    <p>Catatan:</p>
                    <ol>
                        <li>Pesan ini dikirimkan juga ke email yang telah didaftarkan. Klik <a href="#"
                                class="text-danger" id="resend">Disini</a> Jika belum menerima email ini. </li>
                        <li>Silahkan login dan lengkapi data profile anda untuk menjadi member kami.</li>
                    </ol>
                    <a href="/" class="btn btn-danger">Kembali ke Home</a>
                    <a href="{{ route('login') }}" class="btn btn-dark">Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#resend').on('click', function() {
                var id = location.pathname.split('/')[2];
                resendEmailBooking(id);
            })
        });

        function resendEmailBooking(id) {
            if (id) {
                Swal.fire({
                    text: "Sedang mengirim ...",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });
                $.ajax({
                    url: '/resend-email-booking?id=' + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data.msg === 'success') {
                            swal.fire("Berhasil!", "Email sudah dikirim !", "success");
                        } else {
                            swal.fire("Gagal!", "Email tidak terkirim, silahkan coba lagi nanti !",
                                "error");
                        }
                    }
                });
            } else {
                swal.fire("Gagal!", "Email tidak terkirim, silahkan coba lagi nanti !", "error");
            }
        }
    </script>
@endsection
