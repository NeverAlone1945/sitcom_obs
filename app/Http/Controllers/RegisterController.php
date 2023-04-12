<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $listProvinsi = Provinsi::all();
        return view('pages.guest.register', [
            'listProvinsi' => $listProvinsi
        ]);
    }
}
