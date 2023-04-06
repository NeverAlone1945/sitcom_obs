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
        Schema::create('trx_online_booking', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number', 10);
            $table->date('booking_date');
            $table->time('booking_time');
            $table->string('customer_id');
            $table->string('brand_id');
            $table->string('brand_name');
            $table->string('model_id');
            $table->string('model_name');
            $table->string('serial_number');
            $table->text('complaints')->nullable();
            $table->string('branch_id');
            $table->string('branch_name');
            $table->string('branch_address');
            $table->string('branch_phone');
            $table->enum('booking_status', ['created', 'confirmed', 'canceled']);
            $table->text('booking_note')->nullable();
            $table->boolean('email_sending_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_online_booking');
    }
};
