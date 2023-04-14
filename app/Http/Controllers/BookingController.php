<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Branch;
use App\Models\Modeltype;
use Illuminate\Http\Request;
use App\Models\TrxOnlineBooking;
use App\Mail\EmailBookingSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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
        // Validasi form input
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

        $brand_code = Crypt::decryptString($request->brand);
        $brand = Brand::where('code', $brand_code)->first();
        $model = Modeltype::where('code', $request->model)->first();
        $branch = Branch::where('code', $request->branch)->first();

        // Cek apakah email dan nomor whatsapp sudah terdaftar atau belum
        $userCheck = User::where([
            'email' => $request->email,
            'whatsapp' => $request->whatsapp
        ])->first();

        if (!$userCheck) {
            // Generate User Code
            $prefix = 'M' . date('y');
            $code = $prefix . random_int(1000, 9999);

            // Jika hasil generate User Code sudah ada di database, maka ulangi hingga unique
            while (User::where('code', $code)->exists()) {
                $code = $prefix . random_int(100000, 999999);
            }
            // Jika email dan nomor WA belum terdaftar, simpan ke mst_customer
            $User = new User;
            $User->code = $code;
            $User->name = $request->namalengkap;
            $User->email = $request->email;
            $User->whatsapp = $request->whatsapp;
            $User->save();
            $cust_id = $User->id;
        } else {
            // Jika email dan nomor WA sudah terdaftar, ambil id nya
            $cust_id = $userCheck->id;
        }

        // Generate booking number
        $prefix = date('y') . date('m');
        $bookingNumber = $prefix . random_int(100000, 999999);

        // Jika hasil generate booking number sudah ada di database, maka ulangi hingga unique
        while (TrxOnlineBooking::where('booking_number', $bookingNumber)->exists()) {
            $bookingNumber = $prefix . random_int(100000, 999999);
        }

        // Simpan ke table trx_online_booking
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

        $booking = TrxOnlineBooking::where('booking_number', $bookingNumber)->first();
        $data = DB::table('trx_online_booking')
            ->leftJoin('users', 'trx_online_booking.customer_id', '=', 'users.id')
            ->where('trx_online_booking.booking_number', $booking->booking_number)
            ->first();

        try {
            Mail::to($request->email)->send(new EmailBookingSuccess($data));
            $booking = TrxOnlineBooking::where('booking_number', $bookingNumber)
                ->update(['email_sending_status' => 't']);
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->route('booking.success', ['id' => Crypt::encryptString($bookingNumber)]);
    }

    public function success($id)
    {
        try {
            $decrypted = Crypt::decryptString($id);
            $data = DB::table('trx_online_booking')
                ->leftJoin('users', 'trx_online_booking.customer_id', '=', 'users.id')
                ->where('trx_online_booking.booking_number', $decrypted)
                ->first();
            return view('pages.guest.booking_success', ['data' => $data]);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function resendEmailBooking(Request $request)
    {
        $bookingNumber = Crypt::decryptString($request->id);
        $data = DB::table('trx_online_booking')
            ->leftJoin('users', 'trx_online_booking.customer_id', '=', 'users.id')
            ->where('trx_online_booking.booking_number', $bookingNumber)
            ->first();
        try {
            Mail::to($data->email)->send(new EmailBookingSuccess($data));
            TrxOnlineBooking::where('booking_number', $bookingNumber)
                ->update(['email_sending_status' => 't']);

            return response()->json(['msg' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'error']);
        }
    }
}
