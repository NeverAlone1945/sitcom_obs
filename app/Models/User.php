<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'code',
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
        'email_verified_at',
    ];
}
