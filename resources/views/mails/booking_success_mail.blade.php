<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <style type="text/css">
        body {
            /* text-align: center; */
            margin: 0 auto;
            width: auto;
            font-family: work-Sans, sans-serif;
            background-color: #f6f7fb;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        .text-center {
            text-align: center
        }

        .main-bg-light {
            background-color: #fafafa;
            box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-detail,
        .order-detail th,
        .order-detail td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        .order-detail th {
            font-size: 16px;
            padding: 15px;
            text-align: center;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <table border="0" cellpadding="0" cellspacing="0"
        style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('assets/images/email-template/success.png') }}" alt="sukses">
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
</body>

</html>
