<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use App\Models\Branch;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Modeltype;
use Illuminate\Http\Request;
use App\Models\SetBookingTime;
use App\Models\TrxOnlineBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AjaxController extends Controller
{
    public function getKota(Request $request)
    {
        $kota = Kota::where('id_provinsi', $request->provID)->pluck('id', 'nama');
        return response()->json($kota);
    }

    public function getKecamatan(Request $request)
    {
        $kecamatan = Kecamatan::where('id_kota', $request->kotaID)->pluck('id', 'nama');
        return response()->json($kecamatan);
    }

    public function getKelurahan(Request $request)
    {
        $kelurahan = Kelurahan::where('id_kecamatan', $request->kecID)->pluck('id', 'nama');
        return response()->json($kelurahan);
    }

    public function getModel(Request $request)
    {
        $model = Modeltype::where('brand_code', Crypt::decryptString($request->brandID))->pluck('code', 'description');
        return response()->json($model);
    }

    public function getBranch(Request $request)
    {
        $branch = Branch::where('city_code', Crypt::decryptString($request->cityID))->pluck('code', 'description');
        return response()->json($branch);
    }

    public function getAddress(Request $request)
    {
        $address = Branch::where('code', $request->branchID)->pluck('address');
        return response()->json($address);
    }

    public function getSetTimeBooking(Request $request)
    {
        $time = SetBookingTime::select('start_time', 'end_time', 'minute_distance')->where('branch_code', $request->branchID)->get();
        return response()->json($time);
    }

    public function getTimeBooked(Request $request)
    {
        $booked = TrxOnlineBooking::select('booking_time')->where('booking_date', $request->selectedDate)->get();
        return response()->json($booked);
    }

    public function getProfile()
    {
        $profile = User::find(Auth::user()->id);
        return response()->json($profile);
    }
}
