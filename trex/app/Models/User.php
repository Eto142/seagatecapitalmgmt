<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_status',
        'is_activated',
        'acct_form',
        'country',
        'ref',
        'referral_code',
        'bank_name',
        'account_name',
        'account_number',
        'eth_address',
        'btc_address',
        'currency',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Generate a referral code for the user.
     *
     * @return string
     */
    public static function generateReferralCode()
    {
        return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));
    }

    /**
     * Boot method to generate referral code on creating a user.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->referral_code = self::generateReferralCode();
        });
    }

    /**
     * A user may have been referred by another user.
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    /**
     * A user can have many referred users.
     */
    public function referredUsers()
    {
        return $this->hasMany(User::class, 'referred_by');
    }



    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }




    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'user_id');
    }


    public function profit()
    {
        return $this->hasOne(Profit::class, 'user_id');
    }

    public function withdrawal()
    {
        return $this->hasOne(Withdrawal::class, 'user_id');
    }
}
