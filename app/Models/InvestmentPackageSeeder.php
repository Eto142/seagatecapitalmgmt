<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPackage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * This is optional if the table name follows Laravel's naming conventions.
     */
    protected $table = 'investment_packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'daily_roi',
        'minimum_investment',
        'duration_days',
        'instant_withdrawal',
        'minimum_withdrawal',


    ];

    /**
     * The attributes that should be cast to native types.
     *
     * This ensures that boolean and decimal fields are correctly handled.
     */
    protected $casts = [
        'daily_roi' => 'decimal:2',
        'minimum_investment' => 'decimal:2',
        'duration_days' => 'integer',
        'instant_withdrawal' => 'boolean',
        'minimum_withdrawal' => 'decimal:2',
    ];
}
