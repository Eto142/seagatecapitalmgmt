<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'investments';

    // Specify the fillable attributes
    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'email',
        'plan_name',
        'plan_percent',
        'plan_percentage',
        'plan_duration',
        'plan_start',
        'plan_end',
        'status',
    ];

    /**
     * Get the user that owns the investment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Add additional relationships or custom methods if needed
}
