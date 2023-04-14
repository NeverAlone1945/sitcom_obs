@extends ('layouts.main.index')
@section('title', 'Login')
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
                            <form class="needs-validation" action="{{ route('login.process') }}" method="POST">
                                @csrf
                                <h4>Masuk sebagai member</h4>
                                @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" required
                                        placeholder="user@example.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Nomor Whatsapp</label>
                                    <input class="form-control" type="number" id="whatsapp" name="whatsapp" required
                                        placeholder="08123456789">
                                </div>
                                <div class="form-group mt-3 mb-0 d-grid">
                                    <button class="btn btn-dark btn-block" type="submit">Masuk</button>
                                </div>
                                <p class="mt-2 mb-0">Belum jadi member?<a class="ms-2 text-danger"
                                        href="{{ route('register') }}">Daftar</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
