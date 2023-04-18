@extends ('layouts.main.index')
@section('title', 'Rubah Email')
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo" href="{{ route('member') }}">
                                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/mc-logo.png') }}"
                                    alt="mitracare" width="60%">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="needs-validation" id="emailChange">
                                @csrf
                                <h4>Perubahan Email</h4>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Email Baru</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        id="email" name="email" required placeholder="user@example.com"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group mt-3 mb-0 d-grid">
                                    <button class="btn btn-dark btn-block mb-3 submitbutton" type="submit">Proses</button>
                                    <a href="{{ route('member') }}" class="btn btn-danger btn-block">Batal</a>
                                </div>
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


            $("#emailChange").on("submit", function(e) {
                // alert('update');
                e.preventDefault();
                $(".submitbutton", this).parent().append(
                    "<span class='cl1'><i class='fas fa-spin fa-compact-disc'></i> Memproses...</span>"
                );
                $(".submitbutton", this).hide();
                var submitbtn = $(".submitbutton", this);

                Swal.fire({
                    text: "Sedang memproses ...",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    }
                });

                $.post("{{ route('member.emailchangecheck') }}", $(this).serialize(), function(res) {
                    // var data = eval("(" + msg + ")");
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
    </script>
@endsection
