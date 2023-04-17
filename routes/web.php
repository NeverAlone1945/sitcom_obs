<?php

use App\Models\Branch;
use App\Models\Modeltype;
use App\Models\SetBookingTime;
use App\Models\TrxOnlineBooking;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.guest.index');
})->middleware('guest')->name('index');

Route::controller(MemberController::class)->group(function () {
    Route::get('/member', 'index')->middleware('auth')->name('member');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/online-booking', 'index')->middleware('guest')->name('booking');
    Route::post('/online-booking', 'store')->middleware('guest')->name('booking.store');
    Route::get('/booking-success/{id}', 'success')->middleware('guest')->name('booking.success');
    Route::get('/resend-email-booking', 'resendEmailBooking')->middleware('guest');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->middleware('guest')->name('register');
    Route::post('/register', 'store')->middleware('guest')->name('register.store');
    Route::get('/register/{id}', 'success')->middleware('guest')->name('register.success');
    Route::get('/resend-email-verification', 'resendEmailVerification')->middleware('guest');
    Route::get('/email-verification/{id}', 'emailVerification')->middleware('guest')->name('emailverification');
    Route::get('/account-verified/{id}', 'emailVerified')->middleware('guest')->name('emailverified');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->middleware('guest')->name('login');
    Route::post('/login', 'login')->middleware('guest')->name('login.process');
    Route::get('/login/pending-email-verification/{id}', 'pending')->middleware('guest')->name('login.pending');
    Route::get('/otp/{id}', 'otpViewPage')->middleware('guest')->name('otp.viewpage');
    Route::get('/resend-otp', 'resendOtp')->middleware('guest');
    Route::post('/otp-verification', 'otpVerification')->middleware('guest')->name('otp.verification');
    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::controller(AjaxController::class)->group(function () {
    Route::get('/getModel', 'getModel');
    Route::get('/getBranch', 'getBranch');
    Route::get('/getAddress', 'getAddress');
    Route::get('/getSetTimeBooking', 'getSetTimeBooking');
    Route::get('/getTimeBooked', 'getTimeBooked');
    Route::get('/getKota', 'getKota');
    Route::get('/getKecamatan', 'getKecamatan');
    Route::get('/getKelurahan', 'getKelurahan');
});
