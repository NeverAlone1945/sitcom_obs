@extends('layouts.main.email')
@section('name')
    <table border="0" cellpadding="0" cellspacing="0"
        style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('assets/images/illustrasi/success.png') }}" alt="sukses">
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
                                    <p>Hi, {{ $data->name }}</p>
                                    <p>Terimakasih telah melakukan janji temu / booking order dengan data sebagai
                                        berikut:
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Nomor Booking</td>
                                            <td>:</td>
                                            <td>{{ $data->booking_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Waktu Kedatangan</td>
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
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Pelanggan diharapkan untuk datang 15 menit sebelum jadwal waktu kedatangan untuk
                                        mempercepat proses antrian dilokasi yang sudah dipilih</p>
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
