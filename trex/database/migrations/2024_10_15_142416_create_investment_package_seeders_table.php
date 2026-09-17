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
        Schema::create('investment_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Basic Plan PACKAGE"
            $table->decimal('daily_roi', 5, 2); // e.g., 2.00 for 2%
            $table->decimal('minimum_investment', 10, 2); // e.g., 500.00
            $table->integer('duration_days'); // e.g., 30
            $table->boolean('instant_withdrawal')->default(false); // true or false
            $table->decimal('minimum_withdrawal', 10, 2)->default(5.00); // e.g., 5.00
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_packages');
    }
};
