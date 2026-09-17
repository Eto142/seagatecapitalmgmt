<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WalletDetail;
use Illuminate\Http\Request;

class WalletDetailController extends Controller
{
    public function index()
    {
        $data['walletDetails'] = WalletDetail::all();
        $data['wallets'] = WalletDetail::paginate(10);
        return view('admin.wallets.index', $data);
    }

    public function create()
    {
        return view('admin.wallets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'network' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'xrp_tag' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'account_type' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'branch_code' => 'nullable|string|max:255',
            'swift_code' => 'nullable|string|max:255',
        ]);

        WalletDetail::create($validated);

        return redirect()->route('wallets.index')->with('message', 'Wallet detail created successfully.');
    }

    public function edit(WalletDetail $wallet)
    {
        return view('admin.wallets.edit', compact('wallet'));
    }

    public function update(Request $request, WalletDetail $wallet)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'network' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'xrp_tag' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'account_holder' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'account_type' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'branch_code' => 'nullable|string|max:255',
            'swift_code' => 'nullable|string|max:255',
        ]);

        $wallet->update($validated);

        return redirect()->route('wallets.index')->with('message', 'Wallet detail updated successfully.');
    }

    public function destroy(WalletDetail $wallet)
    {
        $wallet->delete();

        return redirect()->route('wallets.index')->with('message', 'Wallet detail deleted successfully.');
    }
}
