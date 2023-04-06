<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $brand = Brand::where('service', true)->get();
        $city = DB::table('mst_branch')
            ->join('mst_city', 'mst_branch.cityid', '=', 'mst_city.code')
            ->select('mst_branch.cityid', 'mst_city.description')
            ->groupBy('mst_branch.cityid', 'mst_city.description')
            ->get();

        return view('pages.guest.booking', ['brandList' => $brand, 'cityList' => $city]);
    }
}
