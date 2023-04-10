@extends('layouts.notification.index')
@section('content')
    <table align="center" border="0" cellpadding="0" cellspacing="0"
        style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('assets/images/email-template/delivery.png') }}" alt=""
                                        style=";margin-bottom: 30px;"></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/email-template/success.png') }}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="title">thank you</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Payment Is Successfully Processsed And Your Order Is On The Way</p>
                                    <p>Transaction ID:267676GHERT105467</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
