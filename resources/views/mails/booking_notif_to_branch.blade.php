@extends('layouts.main.email')
@section('content')
    <table border="0" cellpadding="0" cellspacing="0"
        style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="text-center">
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
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <p>Dear Team {{ $branchName }}</p>
                                    <p>Customer berikut ini akan melakukan kunjungan dengan jadwal sebagai berikut:
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{ $customerName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ date('d F Y', strtotime($bookingDate)) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jam</td>
                                            <td>:</td>
                                            <td>{{ $bookingTime }}</td>
                                        </tr>
                                        <tr>
                                            <td>Produk</td>
                                            <td>:</td>
                                            <td>{{ $brandName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Model</td>
                                            <td>:</td>
                                            <td>{{ $modelName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keluhan</td>
                                            <td>:</td>
                                            <td>{{ $complaints }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Mohon kerjasamanya untuk melakukan prioritas layanan pada waktu tersebut.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Terimakasih,</p>
                                    <p>Booking Service System</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
