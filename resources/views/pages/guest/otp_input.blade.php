@extends ('layouts.main.index')
@section('title', 'Verifikasi')
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo" href="{{ route('index') }}">
                                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/mc-logo.png') }}"
                                    alt="mitracare" width="70%">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="needs-validation" action="{{ route('otp.verification') }}" method="POST">
                                @csrf
                                <input type="hidden" id="cust" name="cust" value="{{ $id }}">
                                <h4>Masukkan Kode OTP</h4>
                                <p>Cek email anda untuk melihat kode OTP yang kami kirimkan</p>
                                @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input class="form-control text-center" type="password" id="otp" name="otp"
                                        required>
                                    <div class="show-hide"></div>
                                </div>
                                <div class="form-group mt-3 mb-0 d-grid">
                                    <button class="btn btn-dark btn-block" type="submit">Verifikasi</button>
                                </div>
                                <p class="mt-2 mb-0">
                                    Belum menerima kode OTP?
                                    <a href="#" class="text-danger" id="resend">kirim ulang</a>
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
        $(document).ready(function() {
            $('#resend').on('click', function() {
                var id = location.pathname.split('/')[2];
                resendOTP(id);
            })
        });

        function resendOTP(id) {
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
                    url: '/resend-otp?id=' + id,
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
