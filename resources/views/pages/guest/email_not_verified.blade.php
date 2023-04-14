@extends ('layouts.main.index')
@section('title', 'Register')
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
                        <h4>Email Belum Terverifikasi</h4>
                        <p>
                            Cek kembali email anda. Kami sudah mengirimkan perintah verifikasi ke email anda<br>
                            Silahkan ikuti intruksi pada email untuk memverifikasi akun anda
                        </p>

                    </div>
                    <div>
                        <p>Jika anda tidak menerima email yang telah kami kirim, silahkan coba langkah berikut:</p>
                        <ol>
                            <li>Mohon pastikan alamat email yang anda masukkan sudah benar</li>
                            <li>Silahkan periksa folder spam pada email anda</li>
                        </ol>
                        <button type="button" class="btn btn-sm btn-dark" id="resend">Kirim ulang email</button>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-danger">Masuk</a>
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
                var id = location.pathname.split('/')[3];
                resendEmailVerification(id);
            })
        });

        function resendEmailVerification(id) {
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
                    url: '/resend-email-verification?id=' + id,
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
