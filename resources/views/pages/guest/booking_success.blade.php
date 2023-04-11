@extends('layouts.booking.index')
@section('content')
    <div class="row">
        <div class="col-xl-6 col-sm-12 mx-auto mt-5">
            <div class="card b-r-0 shadow-lg">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/images/email-template/success.png') }}" alt="Sukses">
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
                </div>
            </div>
        </div>
    </div>
@endsection
