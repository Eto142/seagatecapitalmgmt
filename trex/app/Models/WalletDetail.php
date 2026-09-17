<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // e.g., Bitcoin, Ethereum, Tether, XRP, Bank
        'network', // e.g., Bitcoin-Network, ERC20, TRC20, Ripple, etc.
        'address',
        'xrp_tag', // Optional for XRP
        'bank_name', // For Bank details
        'account_holder',
        'account_number',
        'account_type',
        'branch_name',
        'branch_code',
        'swift_code',
    ];
}
