<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mst_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cust_code', 20)->nullable();
            $table->string('name', 100)->unique();
            $table->string('email', 50)->unique();
            $table->string('whatsapp', 20)->unique();
            $table->string('address')->nullable();
            $table->string('country_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('otp')->nullable();
            $table->dateTime('otp_exp', $precision = 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_customer');
    }
};
