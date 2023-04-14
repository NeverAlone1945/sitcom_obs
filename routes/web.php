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
use App\Http\Controllers\RegisterController;

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
})->name('index');

Route::get('/member', function () {
    return view('pages.member.index');
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/online-booking', 'index')->name('booking');
    Route::post('/online-booking', 'store')->name('booking.store');
    Route::get('/booking-success/{id}', 'success')->name('booking.success');
    Route::get('/resend-email-booking', 'resendEmailBooking');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'store')->name('register.store');
    Route::get('/register/{id}', 'success')->name('register.success');
    Route::get('/resend-email-verification', 'resendEmailVerification');
    Route::get('/email-verification/{id}', 'emailVerification')->name('emailverification');
    Route::get('/account-verified/{id}', 'emailVerified')->name('emailverified');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login.process');
    Route::get('/login/pending-email-verification/{id}', 'pending')->name('login.pending');
    Route::get('/otp/{id}', 'otpViewPage')->name('otp.viewpage');
    Route::get('/resend-otp', 'resendOtp');
    Route::post('/otp-verification', 'otpVerification')->name('otp.verification');
    Route::post('/logout', 'logout')->name('logout');
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
