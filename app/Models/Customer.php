<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'mst_customer';
    protected $fillable = [
        'cust_code',
        'name',
        'email',
        'whatsapp',
        'address',
        'country_code',
        'city_code',
        'district_code',
        'postal_code',
        'otp',
        'otp_exp',
    ];
}
