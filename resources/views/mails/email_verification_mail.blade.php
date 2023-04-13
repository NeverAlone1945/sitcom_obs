@extends('layouts.main.email')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0"
        style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ $message->embed(public_path() . '/assets/images/logo/mc-logo.png') }}"
                                        alt="mitracare-logo" width="200">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Hi, {{ $customerName }}, Tinggal selangkah lagi untuk kamu menjadi member kami.</p>
                                    <p>Klik tombol di bawah ini untuk memverifikasi email kamu.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <a href="{{ route('emailverification', ['id' => $customerCode]) }}"
                                            style="padding: 10px; background-color: #dc3545; color: #fff; display: inline-block; border-radius: 4px; margin-bottom: 18px">Verifikasi
                                            Email Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Terimakasih,</p>
                                    <p>Mitracare</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
