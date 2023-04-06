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
        Schema::create('mst_branch', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('description', 100)->unique();
            $table->text('address');
            $table->string('city_code', 20);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->boolean('isactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_branch');
    }
};
