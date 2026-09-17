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
        Schema::create('investment_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Plan name (e.g., BASIC PACKAGE)
            $table->decimal('min_deposit', 10, 2); // Minimum deposit amount
            $table->decimal('max_deposit', 10, 2); // Maximum deposit amount
            $table->decimal('percentage', 5, 2);   // Percentage return (e.g., 5% as 5.00)
            $table->string('duration');           // Duration (e.g., 24 Hours)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_plans');
    }
};
