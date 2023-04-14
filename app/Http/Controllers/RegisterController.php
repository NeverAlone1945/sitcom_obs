<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class RegisterController extends Controller
{
    public function index()
    {
        $listProvinsi = Provinsi::all();
        return view('pages.guest.register', [
            'listProvinsi' => $listProvinsi
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users'],
            'whatsapp' => ['required', 'unique:users'],
            'state' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'subdistrict' => ['required'],
            'postal_code' => ['required'],
            'address' => ['required'],
        ]);

        // Generate User Code
        $prefix = 'M' . date('y');
        $code = $prefix . random_int(1000, 9999);

        // Jika hasil generate User Code sudah ada di database, maka ulangi hingga unique
        while (User::where('code', $code)->exists()) {
            $code = $prefix . random_int(100000, 999999);
        }

        $cust = new User;
        $cust->code    = $code;
        $cust->name         = $request->name;
        $cust->email        = $request->email;
        $cust->whatsapp     = $request->whatsapp;
        $cust->state        = $request->state;
        $cust->city         = $request->city;
        $cust->district     = $request->district;
        $cust->subdistrict  = $request->subdistrict;
        $cust->postal_code  = $request->postal_code;
        $cust->address      = $request->address;
        $cust->save();

        $data = User::where('code', $code)->first();
        Mail::to($data->email)->send(new EmailVerification($data));
        return redirect()->route('register.success', ['id' => Crypt::encryptString($code)]);
    }

    public function success($id)
    {
        try {
            $decrypted = Crypt::decryptString($id);
            return view('pages.guest.register-success', ['id' => $id]);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function resendEmailVerification(Request $request)
    {
        $code = Crypt::decryptString($request->id);
        $data = User::where('code', $code)->first();
        try {
            Mail::to($data->email)->send(new EmailVerification($data));
            return response()->json(['msg' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'error']);
        }
    }

    public function emailVerification($id)
    {
        try {
            $code = Crypt::decryptString($id);
            $user = User::where('code', $code)->first();
            if ($user->email_verified_at == null) {
                $updated = User::where('code', $code)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            }
            return redirect()->route('emailverified', ['id' => Crypt::encryptString($id)]);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function emailVerified($id)
    {
        try {
            $decrypted = Crypt::decryptString($id);
            return view('pages.guest.verification-success');
        } catch (DecryptException $e) {
            abort(404);
        }
    }
}
