<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Models\TrxOnlineBooking;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $member = User::where('name', Auth::user()->name)->first();
        $booking = TrxOnlineBooking::where('customer_id', Auth::user()->id)
            ->orderByDesc('booking_date')
            ->get();
        $listProvinsi = Provinsi::all();
        // dd($member);
        return view('pages.member.index', [
            'member' => $member,
            'booking' => $booking,
            'listProvinsi' => $listProvinsi,
        ]);
    }

    public function profile()
    {
        $member = User::find(Auth::user()->id)->first();
        return view('pages.member.profile', [
            'member' => $member,
        ]);
    }

    public function profileUpdate(Request $request)
    {
    }
}
