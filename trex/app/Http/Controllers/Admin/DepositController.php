<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{

    public function manageDepositsPage()
    {

        $data['deposits'] = User::join('deposits', 'users.id', '=', 'deposits.user_id')
            ->get(['users.email', 'users.name', 'deposits.*']);

        return view('admin.manage_deposit', $data);
    }

    // Process (approve) a pending deposit
    public function processDeposit($id)
    {
        $deposit = Deposit::findOrFail($id);
        if ($deposit->status == 0) {
            $deposit->status = 1; // Mark as processed
            $deposit->save();

            // You can also implement any additional logic such as updating user's account balance here
        }

        return redirect()->back()->with('success', 'Deposit successfully processed.');
    }

    // Delete a deposit
    public function deleteDeposit($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->delete();

        return redirect()->back()->with('success', 'Deposit deleted successfully.');
    }
}
