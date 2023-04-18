<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Mail\EmailOTPLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TrxOnlineBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailChangeVerification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class MemberController extends Controller
{
    public function index()
    {
        $member = User::where('name', Auth::user()->name)->first();
        $booking = TrxOnlineBooking::where('customer_id', Auth::user()->id)
            ->orderByDesc('booking_date')
            ->get();
        $listProvinsi = Provinsi::all();
        $listKota = Kota::where('id_provinsi', $member->state)->get();
        $listKecamatan = Kecamatan::where('id_kota', $member->city)->get();
        $listKelurahan = Kelurahan::where('id_kecamatan', $member->district)->get();
        // dd($member);
        return view('pages.member.index', [
            'member' => $member,
            'booking' => $booking,
            'listProvinsi' => $listProvinsi,
            'listKota' => $listKota,
            'listKecamatan' => $listKecamatan,
            'listKelurahan' => $listKelurahan,
        ]);
    }

    public function updateProfile(Request $request)
    {
        try {
            User::where('id', Auth::user()->id)->update([
                'name'  => $request->name,
                'whatsapp'  => $request->whatsapp,
                'address'  => $request->address,
                'state'  => $request->state,
                'city'  => $request->city,
                'district'  => $request->district,
                'subdistrict'  => $request->subdistrict,
                'postal_code'  => $request->postal_code
            ]);
            return response()->json(['success' => true, 'message' => 'Data profil berhasil diperbarui.']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Data profil gagal diperbarui.']);
            dd('error');
        }
    }

    public function editEmail($id)
    {
        try {
            $decrypted = Crypt::decryptString($id);
            return view('pages.member.email_change');
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function emailChangeCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'unique:users'],
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Email sudah terdaftar']);
        }

        $data = User::where('id', Auth::user()->id)->first();
        try {
            User::where('id', Auth::user()->id)->update([
                'email' => $request->email,
                'email_verified_at' => null
            ]);
            Mail::to($request->email)->send(new EmailChangeVerification($data));
            return response()->json(['success' => true, 'message' => 'Kami telah mengirimkan email verifikasi ke alamat email anda. Silahkan ikuti intruksi yang tertera pada email tersebut.']);
        } catch (\Throwable $th) {
            report($th);
            return response()->json(['success' => false, 'message' => 'Kami tidak bisa mengirimkan email verifikasi ke alamat email terbaru anda. Pastikan alamat email benar!']);
        }
    }

    public function emailChangeVerification($id)
    {
        try {
            $code = Crypt::decryptString($id);
            $user = User::where('code', $code)->first();
            if ($user->email_verified_at == null) {
                $updated = User::where('code', $code)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            }
            return view('pages.member.email_change_success');
        } catch (DecryptException $e) {
            abort(404);
        }
    }
}
