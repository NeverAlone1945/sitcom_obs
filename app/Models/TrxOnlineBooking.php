<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrxOnlineBooking extends Model
{
    use HasFactory;
    protected $table = 'trx_online_booking';
}
