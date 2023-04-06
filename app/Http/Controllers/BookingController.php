<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Modeltype;
use Illuminate\Http\Request;
use App\Models\TrxOnlineBooking;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'namalengkap' => 'required|unique:mst_customer,name',
            'email' => 'required|unique:mst_customer,email',
            'whatsapp' => 'required|unique:mst_customer,whatsapp',
            'brand' => 'required',
            'model' => 'required',
            'serialnumber' => 'required',
            'keluhan' => 'required',
            'kota' => 'required',
            'branch' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
        ]);

        $customer = new Customer;
        $customer->name = $request->namalengkap;
        $customer->email = $request->email;
        $customer->whatsapp = $request->whatsapp;
        $customer->save();

        $cust_id = $customer->id;
        $brand_code = Crypt::decryptString($request->brand);

        $brand = Brand::where('code', $brand_code)->first();
        $model = Modeltype::where('code', $request->model)->first();
        $branch = Branch::where('code', $request->branch)->first();

        // genarate booking number
        $prefix = date('y') . date('m');
        $bookingNumber = $prefix . random_int(100000, 999999);

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
        $trx->save();

        return redirect()->route('booking')->with('success', 'Terimakasih telah melakukan Online Service Booking');
    }
}
