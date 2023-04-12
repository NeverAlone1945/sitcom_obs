<?php

use App\Models\Branch;
use App\Models\Modeltype;
use App\Models\SetBookingTime;
use App\Models\TrxOnlineBooking;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
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



Route::controller(BookingController::class)->group(function () {
    Route::get('/online-booking', 'index')->name('booking');
    Route::post('/online-booking', 'store')->name('booking.store');
    Route::get('/booking-success/{id}', 'success')->name('booking.success');
    Route::get('/test-email', 'sendEmail')->name('testemail');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'store')->name('register.store');
    Route::get('/register-success/{id}', 'success')->name('register.success');
});

Route::controller(AjaxController::class)->group(function () {
    Route::get('/getModel', 'getModel');
    Route::get('/getBranch', 'getBranch');
    Route::get('/getAddress', 'getAddress');
    Route::get('/getSetTimeBooking', 'getSetTimeBooking');
    Route::get('/getTimeBooked', 'getTimeBooked');
});
