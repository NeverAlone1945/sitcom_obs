<?php

use App\Models\Branch;
use App\Models\Modeltype;
use App\Models\SetBookingTime;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/online-booking', [BookingController::class, 'index'])->name('booking');
Route::post('/online-booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/getModel/{id}', function ($id) {
    $model = Modeltype::select('code', 'description')->where('brand_code', Crypt::decryptString($id))->get();
    return response()->json($model);
});
Route::get('/getBranch/{id}', function ($id) {
    $branch = Branch::select('code', 'description')->where('city_code', Crypt::decryptString($id))->get();
    return response()->json($branch);
});
Route::get('/getAddress/{id}', function ($id) {
    $address = Branch::select('address')->where('code', $id)->get();
    return response()->json($address);
});
Route::get('/getSetTimeBooking/{id}', function ($id) {
    $time = SetBookingTime::select('start_time', 'end_time', 'minute_distance')->where('branch_code', $id)->get();
    return response()->json($time);
});
