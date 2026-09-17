<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvestment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * 
     * Optional if following Laravel's naming conventions.
     */
    protected $table = 'user_investments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'investment_package_id',
        'investment_amount',
        'daily_roi',
        'duration_days',
        'instant_withdrawal',
        'minimum_withdrawal',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * Ensures proper data types when accessing these attributes.
     */
    protected $casts = [
        'investment_amount' => 'decimal:2',
        'daily_roi' => 'decimal:2',
        'duration_days' => 'integer',
        'instant_withdrawal' => 'boolean',
        'minimum_withdrawal' => 'decimal:2',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Get the user that owns the investment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the investment package associated with the investment.
     */
    public function investmentPackage()
    {
        return $this->belongsTo(InvestmentPackage::class, 'investment_package_id');
    }
}
