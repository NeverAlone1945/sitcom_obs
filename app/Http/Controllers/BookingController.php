<?php

namespace App\Http\Controllers;

use App\Mail\EmailBookingSuccess;
use App\Models\Brand;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Modeltype;
use Illuminate\Http\Request;
use App\Models\TrxOnlineBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class BookingController extends Controller
{
    public function index()
    {
        $brand = Brand::where('service_flag', true)->get();
        $city = DB::table('mst_branch')
            ->join('mst_city', 'mst_branch.city_code', '=', 'mst_city.code')
            ->select('mst_branch.city_code', 'mst_city.description')
            ->groupBy('mst_branch.city_code', 'mst_city.description')
            ->get();

        return view('pages.guest.booking', ['brandList' => $brand, 'cityList' => $city]);
    }

    public function store(Request $request)
    {
        // validasi form input
        $request->validate([
            'namalengkap' => 'required',
            'email' => 'required',
            'whatsapp' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'serialnumber' => 'required',
            'keluhan' => 'required',
            'kota' => 'required',
            'branch' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
        ]);

        $customerCheck = Customer::where([
            'email' => $request->email,
            'whatsapp' => $request->whatsapp
        ])->first();

        if (!$customerCheck) {
            $customer = new Customer;
            $customer->name = $request->namalengkap;
            $customer->email = $request->email;
            $customer->whatsapp = $request->whatsapp;
            $customer->save();
            $cust_id = $customer->id;
        } else {
            $cust_id = $customerCheck->id;
        }

        $brand_code = Crypt::decryptString($request->brand);
        $brand = Brand::where('code', $brand_code)->first();
        $model = Modeltype::where('code', $request->model)->first();
        $branch = Branch::where('code', $request->branch)->first();

        // generate booking number
        $prefix = date('y') . date('m');
        $bookingNumber = $prefix . random_int(100000, 999999);

        // jika hasil generate booking number sudah ada di database, maka ulangi hingga unique
        while (TrxOnlineBooking::where('booking_number', $bookingNumber)->exists()) {
            // generate a new booking number
            $bookingNumber = $prefix . random_int(100000, 999999);
        }

        $trx = new TrxOnlineBooking;
        $trx->booking_number = $bookingNumber;
        $trx->booking_date = $request->tanggal;
        $trx->booking_time = $request->jam;
        $trx->customer_id = $cust_id;
        $trx->brand_id = $brand_code;
        $trx->brand_name = $brand->description;
        $trx->model_id = $request->model;
        $trx->model_name = $model->description;
        $trx->serial_number = $request->serialnumber;
        $trx->complaints = $request->keluhan;
        $trx->branch_id = $request->branch;
        $trx->branch_name = $branch->description;
        $trx->branch_address = $branch->address;
        $trx->branch_phone = $branch->phone;
        $trx->booking_status = 'created';
        $trx->email_sending_status = 'f';
        $trx->save();

        $booking = TrxOnlineBooking::where('booking_number', $bookingNumber)->firstOrFail();
        $data = DB::table('trx_online_booking')
            ->leftJoin('mst_customer', 'trx_online_booking.customer_id', '=', 'mst_customer.id')
            ->where('trx_online_booking.booking_number', $booking->booking_number)
            ->get()->first();

        try {
            Mail::to($request->email)->send(new EmailBookingSuccess($data));
            $booking = TrxOnlineBooking::where('booking_number', $bookingNumber)
                ->update('email_sending_status', 't');
        } catch (\Throwable $th) {
        }

        return redirect()->route('booking.success', ['id' => $bookingNumber]);
    }

    public function success($id)
    {
        $booking = TrxOnlineBooking::where('booking_number', $id)->firstOrFail();

        $data = DB::table('trx_online_booking')
            ->leftJoin('mst_customer', 'trx_online_booking.customer_id', '=', 'mst_customer.id')
            ->where('trx_online_booking.booking_number', $booking->booking_number)
            ->get()->first();
        return view('pages.guest.booking_success', ['title' => 'Booking Success', 'data' => $data]);
    }

    public function sendEmail()
    {
        $data = DB::table('trx_online_booking')
            ->leftJoin('mst_customer', 'trx_online_booking.customer_id', '=', 'mst_customer.id')
            ->where('trx_online_booking.booking_number', '2304241819')
            ->get()->first();
        Mail::to($data->email)->send(new EmailBookingSuccess($data));
    }
}
