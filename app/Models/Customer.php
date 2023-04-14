<?php

namespace App\Models;

use App\Models\TrxOnlineBooking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'mst_customer';
    protected $guarded = ['id'];
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
