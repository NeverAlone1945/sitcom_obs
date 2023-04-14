<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\EmailOTPLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;
use Illuminate\Contracts\Encryption\DecryptException;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.guest.login');
    }

    public function pending($id)
    {
        try {
            $decrypted = Crypt::decryptString($id);
            return view('pages.guest.email_not_verified');
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function login(Request $request)
    {
        $is_member = User::where('email', $request->email)
            ->where('whatsapp', $request->whatsapp)
            ->first();

        if ($is_member == null) {
            return redirect()->back()->with('status', 'Anda belum terdaftar sebagai member.');
        }

        if ($is_member->email_verified_at == null) {
            $enc = Crypt::encryptString($is_member->code);
            return redirect()->route('login.pending', ['id' => $enc]);
        }

        $otp = random_int(1000, 9999);
        $otp_exp = Carbon::now()->addMinutes(10);

        try {
            $enc = Crypt::encryptString($is_member->code);
            User::where('id', $is_member->id)
                ->update([
                    'otp' => $otp,
                    'otp_exp' => $otp_exp
                ]);
            $data = User::where('code', $is_member->code)->first();
            Mail::to($data->email)->send(new EmailOTPLogin($data));
            return redirect()->route('otp.viewpage', ['id' => $enc]);
        } catch (\Throwable $e) {
            report($e);
            return redirect()->back()->with('status', 'Anda tidak bisa login, Silahkan coba lagi');
        }
    }

    public function otpViewPage($id)
    {
        try {
            $decrypted = Crypt::decryptString($id);
            return view('pages.guest.otp_input', ['id' => $decrypted]);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function resendOtp(Request $request)
    {
        $otp = random_int(1000, 9999);
        $otp_exp = Carbon::now()->addMinutes(10);
        $code = Crypt::decryptString($request->id);

        try {
            User::where('code', $code)
                ->update([
                    'otp' => $otp,
                    'otp_exp' => $otp_exp
                ]);

            $data = User::where('code', $code)->first();

            Mail::to($data->email)->send(new EmailOTPLogin($data));
            return response()->json(['msg' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'error']);
        }
    }

    public function otpVerification(Request $request)
    {
        $user = User::where('code', $request->cust)
            ->where('otp', $request->otp)
            ->first();

        if ($user == null) {
            return redirect()->back()->with('status', 'OTP yang anda masukkan salah.');
        }

        if ($user->otp_exp < Carbon::now()) {
            return redirect()->back()->with('status', 'OTP sudah kadaluarsa. Silahkan klik kirim ulang.');
        }

        Auth::login($user);
        return redirect('/member');
    }
}
