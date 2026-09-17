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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();

            // Foreign Key to users table
            $table->unsignedBigInteger('user_id');

            // Other Columns
            $table->string('transaction_id');
            $table->integer('amount')->nullable();
            $table->string('email')->nullable();
            $table->string('plan_name')->nullable();
            $table->string('plan_percent')->nullable();
            $table->string('plan_percentage')->nullable();
            $table->string('plan_duration')->nullable();
            $table->string('plan_start')->nullable();
            $table->string('plan_end')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=pending, 1=approved');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
