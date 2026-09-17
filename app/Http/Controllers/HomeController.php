<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Loan;
use App\Models\Trade;
use App\Models\Profit;
use App\Models\Wallet;
use App\Models\Deposit;
use App\Models\Document;
use App\Models\Referral;
use App\Models\Refferal;
use App\Models\Transfer;
use App\Models\Investment;
use App\Models\Withdrawal;
use App\Models\TradingPlan;
use App\Models\TradeHistory;
use App\Models\WalletDetail;
use Illuminate\Http\Request;
use App\Models\AccountBalance;
use App\Models\AccountDetails;
use App\Models\UserInvestment;
use App\Models\InvestmentPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Mail\welcomeEmail;
use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
    private function getConversionRate($userCurrency)
    {
        $url = 'https://api.exchangerate-api.com/v4/latest/USD';
        $response = Http::get($url);

        if ($response->failed()) {
            return 1; // Fallback to 1 if the API request fails
        }

        $data = $response->json();
        return $data['rates'][$userCurrency] ?? 1; // Fallback to 1 if the currency rate is not found
    }
     
        public function verifyAccount()
    {
        return view('auth.index');
    }
     
        public function emailVerify(Request $request)
    {
        
                    $userId = Auth::id();

            // Retrieve all deposits for the user 
            $data['deposits'] = Deposit::where('user_id', $userId)->get();

            // Sum of pending deposits
            $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved deposits
            $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Retrieve all withdrawals for the user
            $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

            // Sum of pending withdrawals
            $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved withdrawals
            $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Sum of profits
            $data['profit_sum'] = Profit::where('user_id', $userId)
                ->sum('amount');

            // Sum of investments
            $data['investment_sum'] = Investment::where('user_id', $userId)
                ->sum('amount');

            // Sum of referral earnings
            $data['referral_sum'] = Referral::where('user_id', $userId)
                ->sum('amount');

            // Total sum of all values
            $data['total_sum'] =  $data['approved_deposits_sum']
                - $data['approved_withdrawals_sum']
                + $data['profit_sum']
                - $data['investment_sum']
                + $data['referral_sum'];
            
            // User's currency and conversion
            $userCurrency = Auth::user()->currency;
            $conversionRate = $this->getConversionRate($userCurrency);

            $data['amountsInUSD'] = [
                'balance' => $data['total_sum'] / $conversionRate, // Total balance in USD
                'profit' => $data['profit_sum'] / $conversionRate,
                'earning' => $data['total_sum'] / $conversionRate, // Assuming total earnings in USD
                'referral' => $data['referral_sum'] / $conversionRate,
                'deposit' => $data['approved_deposits_sum'] / $conversionRate,
                'withdrawal' => $data['approved_withdrawals_sum'] / $conversionRate
            ];

            $data['conversionRate'] = $conversionRate;
            $data['userCurrency'] = $userCurrency;
            
        
        $first_token = $request->input('digit');
        $second_token = $request->input('digit2');
        $third_token = $request->input('digit3');
        $fourth_token = $request->input('digit4');
        $get_token =  $first_token;
        $verify_token = User::where('token', $get_token)->first();
        if ($verify_token) {
            $user = User::where('email', $verify_token->email)->first();
            $user->is_activated = 1;
            $user->save();
            $user_email =  $user->email;
            $user_password =  $user->password;


            $data = [
                'name' => $user->name,
                'a_number' => $user->a_number,
                'email' => $user->email,
                'password' => '*********',

            ];


           // Prepare the email content
        $wMessage = "
            <p>Hello {$user->name},</p>
            <p>We are so happy to have you on board.</p>
            <p>Your email: <strong>{$user->email}</strong></p>
            <p>Your password: <strong>*********</strong></p>
        ";
        
        Mail::to($user->email)->send(new welcomeEmail($wMessage));
      $userId = Auth::id();

            // Retrieve all deposits for the user 
            $data['deposits'] = Deposit::where('user_id', $userId)->get();

            // Sum of pending deposits
            $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved deposits
            $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Retrieve all withdrawals for the user
            $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

            // Sum of pending withdrawals
            $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved withdrawals
            $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Sum of profits
            $data['profit_sum'] = Profit::where('user_id', $userId)
                ->sum('amount');

            // Sum of investments
            $data['investment_sum'] = Investment::where('user_id', $userId)
                ->sum('amount');

            // Sum of referral earnings
            $data['referral_sum'] = Referral::where('user_id', $userId)
                ->sum('amount');

            // Total sum of all values
            $data['total_sum'] =  $data['approved_deposits_sum']
                - $data['approved_withdrawals_sum']
                + $data['profit_sum']
                - $data['investment_sum']
                + $data['referral_sum'];
            
            // User's currency and conversion
            $userCurrency = Auth::user()->currency;
            $conversionRate = $this->getConversionRate($userCurrency);

            $data['amountsInUSD'] = [
                'balance' => $data['total_sum'] / $conversionRate, // Total balance in USD
                'profit' => $data['profit_sum'] / $conversionRate,
                'earning' => $data['total_sum'] / $conversionRate, // Assuming total earnings in USD
                'referral' => $data['referral_sum'] / $conversionRate,
                'deposit' => $data['approved_deposits_sum'] / $conversionRate,
                'withdrawal' => $data['approved_withdrawals_sum'] / $conversionRate
            ];

            $data['conversionRate'] = $conversionRate;
            $data['userCurrency'] = $userCurrency;


            return view('dashboard.home', $data);
        } else {
            return back()->with('error', 'Incorrect Activation Code!');
        }
    }


    public function verify($id)
    {
        $user = User::where('id', $id)->first();
        $data['email'] = $user->email;
        $data['hash'] = $user->password;
        $data['id'] = $user->id;

        return view('auth.verify', $data);
    }

    public function resendCode($id)
    {

        $userData = User::where('id', $id)->first();
        $email = $userData->email;

        $validToken = rand(7650, 1234);
        $get_token = Auth::user();
        $get_token->token = $validToken;
        $get_token->update();



        Mail::to($email)->send(new VerificationEmail($validToken));


        return redirect("verify/" . $userData->id)->with('message', 'verification code has been resent to your email');
    }


public function index()
{
    if (Auth::id()) {
        if (Auth::user()->is_activated == '1') {
            $userId = Auth::id();

            // Retrieve all deposits for the user 
            $data['deposits'] = Deposit::where('user_id', $userId)->get();

            // Sum of pending deposits
            $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved deposits
            $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Retrieve all withdrawals for the user
            $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

            // Sum of pending withdrawals
            $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved withdrawals
            $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Sum of profits
            $data['profit_sum'] = Profit::where('user_id', $userId)
                ->sum('amount');

            // Sum of investments
            $data['investment_sum'] = Investment::where('user_id', $userId)
                ->sum('amount');

            // Sum of referral earnings
            $data['referral_sum'] = Referral::where('user_id', $userId)
                ->sum('amount');

            // Total sum of all values
            $data['total_sum'] =  $data['approved_deposits_sum']
                - $data['approved_withdrawals_sum']
                + $data['profit_sum']
                - $data['investment_sum']
                + $data['referral_sum'];
            
            // User's currency and conversion
            $userCurrency = Auth::user()->currency;
            $conversionRate = $this->getConversionRate($userCurrency);

            $data['amountsInUSD'] = [
                'balance' => $data['total_sum'] / $conversionRate, // Total balance in USD
                'profit' => $data['profit_sum'] / $conversionRate,
                'earning' => $data['total_sum'] / $conversionRate, // Assuming total earnings in USD
                'referral' => $data['referral_sum'] / $conversionRate,
                'deposit' => $data['approved_deposits_sum'] / $conversionRate,
                'withdrawal' => $data['approved_withdrawals_sum'] / $conversionRate
            ];

            $data['conversionRate'] = $conversionRate;
            $data['userCurrency'] = $userCurrency;

            return view('dashboard.home', $data);
        } else {
            return redirect("verify/" . Auth::user()->id);
        }
    } else {
        return redirect()->back();
    }
}


    public function referral()
    {
        $referrals = auth()->user()->referrals()->with('parent')->get();

        return view('referrals.index', compact('referrals'));
    }

    public function profile()
    {
            $userId = Auth::id();

            // Retrieve all deposits for the user 
            $data['deposits'] = Deposit::where('user_id', $userId)->get();

            // Sum of pending deposits
            $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved deposits
            $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Retrieve all withdrawals for the user
            $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

            // Sum of pending withdrawals
            $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved withdrawals
            $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Sum of profits
            $data['profit_sum'] = Profit::where('user_id', $userId)
                ->sum('amount');

            // Sum of investments
            $data['investment_sum'] = Investment::where('user_id', $userId)
                ->sum('amount');

            // Sum of referral earnings
            $data['referral_sum'] = Referral::where('user_id', $userId)
                ->sum('amount');

            // Total sum of all values
            $data['total_sum'] =  $data['approved_deposits_sum']
                - $data['approved_withdrawals_sum']
                + $data['profit_sum']
                - $data['investment_sum']
                + $data['referral_sum'];
            
            // User's currency and conversion
            $userCurrency = Auth::user()->currency;
            $conversionRate = $this->getConversionRate($userCurrency);

            $data['amountsInUSD'] = [
                'balance' => $data['total_sum'] / $conversionRate, // Total balance in USD
                'profit' => $data['profit_sum'] / $conversionRate,
                'earning' => $data['total_sum'] / $conversionRate, // Assuming total earnings in USD
                'referral' => $data['referral_sum'] / $conversionRate,
                'deposit' => $data['approved_deposits_sum'] / $conversionRate,
                'withdrawal' => $data['approved_withdrawals_sum'] / $conversionRate
            ];

            $data['conversionRate'] = $conversionRate;
            $data['userCurrency'] = $userCurrency;
            
        return view('dashboard.profile', $data);
    }

    public function updateProfile(Request $request)
    {

        $request->validate([
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->first_name = $request->input('firstname');
        $user->last_name = $request->input('surname');
        $user->country = $request->input('country');
        $user->dob = $request->input('dob');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }

    public function upgradeAccount(Request $request)
    {
        $request->validate([
            'account_type' => 'required|string',
            'firstname2' => 'nullable|string|max:255',
            'surname2' => 'nullable|string|max:255',
            'adress2' => 'nullable|string',
            'country2' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->user_type = $request->input('account_type'); // Add this field if it's part of the user model
        $user->third_first_name = $request->input('firstname2');
        $user->third_last_name = $request->input('surname2');
        $user->third_country = $request->input('country2');
        $user->third_address = $request->input('adress2');
        $user->save();

        return redirect()->back()->with('status', 'Account upgraded successfully!');
    }


    public function updateProfilePic(Request $request)
    {
        $request->validate([
            'ppix' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        if ($request->hasFile('ppix')) {
            $image = $request->file('ppix');
            $imagePath = $image->store('profile_pictures', 'public');

            // Remove old profile picture if exists
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $user->profile_picture = $imagePath;
            $user->save();
        }

        return redirect()->back()->with('status', 'Profile picture updated successfully.');
    }

    public function changeTheme(Request $request)
    {
        $user = Auth::user();
        $user->theme = $request->theme;
        $user->save();

        return response()->json(['status' => 'Theme changed successfully!']);
    }

    public function changePassword()
    {
        return view('dashboard.change_password');
    }

    public function updatePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Check if the old password is correct
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Update the user's password
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'Password changed successfully!');
    }

    public function tradingHistory()
    {
        return view('dashboard.trading_history');
    }

    public function notification()
    {
        return view('dashboard.notification');
    }

    public function referUser()
    {

        $data['referrals'] = auth()->user()->referrals()->with('parent')->get();
        return view('dashboard.refer_user', $data);
    }



    public function withdrawals()
    {
        $userId = Auth::id();

        // Retrieve all deposits for the user 
        $data['deposits'] = Deposit::where('user_id', $userId)->get();

        // Sum of pending deposits
        $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved deposits
        $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Retrieve all withdrawals for the user
        $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

        // Sum of pending withdrawals
        $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved withdrawals
        $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Sum of profits
        $data['profit_sum'] = Profit::where('user_id', $userId)
            ->sum('amount');

        // Sum of investments
        $data['investment_sum'] = Investment::where('user_id', $userId)
            ->sum('amount');

        // Sum of referral earnings
        $data['referral_sum'] = Referral::where('user_id', $userId)
            ->sum('amount');

        // Total sum of all values
        $data['total_sum'] =  $data['approved_deposits_sum']
            - $data['approved_withdrawals_sum']
            + $data['profit_sum']
            - $data['investment_sum']
            + $data['referral_sum'];

        $data['withdrawals'] = Withdrawal::where('user_id', Auth::id())->get();

        return view('dashboard.withdrawals', $data);
    }

    public function withdrawal(Request $request)
    {
        // Retrieve user-specific deposits, withdrawals, balances, and profits
        $userId = Auth::id();



        // Retrieve all deposits for the user 
        $data['deposits'] = Deposit::where('user_id', $userId)->get();

        // Sum of pending deposits
        $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved deposits
        $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Retrieve all withdrawals for the user
        $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

        // Sum of pending withdrawals
        $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved withdrawals
        $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Sum of profits
        $data['profit_sum'] = Profit::where('user_id', $userId)
            ->sum('amount');

        // Sum of investments
        $data['investment_sum'] = Investment::where('user_id', $userId)
            ->sum('amount');

        // Sum of referral earnings
        $data['referral_sum'] = Referral::where('user_id', $userId)
            ->sum('amount');

        // Total sum of all values
        $data['total_sum'] =  $data['approved_deposits_sum']
            - $data['approved_withdrawals_sum']
            + $data['profit_sum']
            - $data['investment_sum']
            + $data['referral_sum'];



        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0|max:1000000000000000000000000000000000000000',
            'payment_mode' => 'required|string|',

        ]);
        
        
    // if (Auth::user()->otp != $request->otp) {
    //     return redirect()->back()
    //         ->with('error', 'Invalid OTP. Please enter the correct OTP.')
    //         ->withInput();
    // }

        // Check if user has sufficient funds for the trade
        // if (Auth::user()->account_status == '0') {
        //     return redirect()->route('withdrawals')->with('success', 'Please verify your account');
        // }

        // Check if user has sufficient funds for the trade
        if ($request->input('amount') > $data['total_sum']) {
            return redirect()->route('withdrawals')->with('error', 'Insufficient funds, please fund your account.');
        }



        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve validated data
        $data = $validator->validated();
        // Create a new withdrawal record
        $withdrawal = new Withdrawal();
        $withdrawal->user_id = Auth::id(); // Assuming user is authenticated
        $withdrawal->amount = $data['amount'];
        $withdrawal->account = $data['payment_mode'];
        $withdrawal->status = '0';
        $withdrawal->save();

        // Optionally, you can add a success message
        // return redirect()->back()->with('success', 'Withdrawal request submitted successfully.');
        
        // Store withdrawal details in session
    $withdrawalData = [
        'amount' => $data['amount'],
        // 'payment_mode' => $request->$data['payment_mode'],
        'user_id' => Auth::id(),
        // 'otp' => rand(100000, 999999) // Generate 6-digit OTP
    ];

    // In a real app, you would send this OTP to the user via email/SMS
    session()->put('withdrawal_data', $withdrawalData);

    return redirect()->route('withdrawal.verify.otp');
    }
    
    public function showOtpVerification()
{
    if (!session()->has('withdrawal_data')) {
        return redirect()->route('withdrawal')->with('error', 'No withdrawal request found. Please start over.');
    }
    
    return view('dashboard.otp');
}

public function verifyOtp(Request $request)
{
    $request->validate(['otp' => 'required|digits:6']);
    
    $withdrawalData = session('withdrawal_data');
    
    if (Auth::user()->otp != $request->otp) {
        return back()->with('error', 'Invalid OTP. Please try again.');
    }
    
    // Process the withdrawal here
    // Save to database, send notifications, etc.
    
    // Clear the session data
    session()->forget('withdrawal_data');
    
    return redirect()->route('withdrawal')->with('success', 'Withdrawal request submitted successfully!');
}

    public function deposits()
    {
        $data['deposits'] = Deposit::where('user_id', Auth::id())->get();
        $data['wallets'] = Wallet::all();

        return view('dashboard.deposits', $data);
    }

 public function handleDeposit(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'amount' => 'required|numeric',
    ]);

    // Store the amount in the session
    session(['deposit_amount' => $validatedData['amount']]);

    // Get wallet details
    $walletDetails = WalletDetail::all();

    // Pass data to the view
    return view('dashboard.payment', [
        'walletDetails' => $walletDetails,
        'amount' => $validatedData['amount'],
    ]);
}

public function showPaymentMethods()
{
    // Retrieve the amount from session
    $amount = session('deposit_amount');

    // Get all available payment methods
    $walletDetails = WalletDetail::get();
    
    return view('dashboard.payment', [
        'amount' => $amount,
        'walletDetails' => $walletDetails
    ]);
}


    public function handlePayment(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0',
            'payment_mode' => 'required|string',
            'proof' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the proof of payment if uploaded
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve form input
        $depositType = $request->input('deposit_type');
        $amount = $request->input('amount');
        $paymentMode = $request->input('payment_mode');

        // Initialize filePath variable
        $filePath = null;

        // Handle the proof file upload if present
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filePath = $file->store('payment_proofs', 'public'); // Store the file in the 'payment_proofs' directory
        }

        // Ensure the user is authenticated
        if (Auth::check()) {
            // Create the deposit record in the database
            Deposit::create([
                'user_id' => Auth::id(),
                'deposit_type' => $paymentMode,
                'amount' => $amount,
                'payment_mode' => $paymentMode,
                'status' => '0', // Set the initial status to pending
                'proof' => $filePath,  // Save the file path if uploaded
            ]);



            // Redirect to the deposits page with a success message
            return redirect()->route('deposits')->with('status', 'Payment submitted successfully!');
        }

        // If user is not authenticated, redirect back with an error
        return redirect()->back()->with('error', 'You need to be logged in to submit a payment.');
    }




    public function mPlans()
    {
        $userId = Auth::id();

        // Retrieve all deposits for the user 
        $data['deposits'] = Deposit::where('user_id', $userId)->get();

        // Sum of pending deposits
        $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved deposits
        $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Retrieve all withdrawals for the user
        $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

        // Sum of pending withdrawals
        $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved withdrawals
        $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Sum of profits
        $data['profit_sum'] = Profit::where('user_id', $userId)
            ->sum('amount');

        // Sum of investments
        $data['investment_sum'] = Investment::where('user_id', $userId)
            ->sum('amount');

        // Sum of referral earnings
        $data['referral_sum'] = Referral::where('user_id', $userId)
            ->sum('amount');

        // Total sum of all values
        $data['total_sum'] =  $data['approved_deposits_sum']
            - $data['approved_withdrawals_sum']
            + $data['profit_sum']
            - $data['investment_sum']
            + $data['referral_sum'];

        $user = Auth::user();

        // Fetch user's investments with related investment package
        // $data['investments'] = UserInvestment::with('investmentPackage')
        //     ->where('user_id', $user->id)
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        $data['packages'] = InvestmentPackage::get();


        return view('dashboard.m_plans', $data);
    }


    public function store(Request $request)
    {

        // Retrieve user-specific deposits, withdrawals, balances, and profits
        $userId = Auth::id();

        // Retrieve all deposits for the user 
        $data['deposits'] = Deposit::where('user_id', $userId)->get();

        // Sum of pending deposits
        $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved deposits
        $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Retrieve all withdrawals for the user
        $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

        // Sum of pending withdrawals
        $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 0) // Assuming '0' represents 'pending'
            ->sum('amount');

        // Sum of approved withdrawals
        $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
            ->where('status', 1) // Assuming '1' represents 'approved'
            ->sum('amount');

        // Sum of profits
        $data['profit_sum'] = Profit::where('user_id', $userId)
            ->sum('amount');

        // Sum of investments
        $data['investment_sum'] = Investment::where('user_id', $userId)
            ->sum('amount');

        // Sum of referral earnings
        $data['referral_sum'] = Referral::where('user_id', $userId)
            ->sum('amount');

        // Total sum of all values
        $data['total_sum'] =  $data['approved_deposits_sum']
            - $data['approved_withdrawals_sum']
            + $data['profit_sum']
            - $data['investment_sum']
            + $data['referral_sum'];
        // Validate the form input
        // $request->validate([
        //     'iamount' => 'required|numeric|min:' . $request->min_investment, // Ensure the amount is valid
        //     'id' => 'required|exists:investment_packages,id', // Ensure the package ID exists
        // ]);

        // Check if user has sufficient funds for the trade
        if ($request->input('iamount') > $data['total_sum']) {
            return redirect()->route('deposits')->with('status', 'Insufficient funds, please fund your account.');
        }

        // Fetch the investment package
        $package = InvestmentPackage::findOrFail($request->id);

        // Create a new investment entry
        $investment = Investment::create([
            'user_id' => Auth::id(), // Assuming the user is authenticated
            'transaction_id' => $this->generateTransactionId(), // Custom method to generate transaction ID
            'amount' => $request->iamount,
            'email' => Auth::user()->email, // Assuming user has an email attribute
            'plan_name' => $package->name,
            'plan_percent' => $package->daily_roi,
            'plan_duration' => $package->duration_days,
            'plan_start' => now(), // Start now
            'plan_end' => now()->addDays($package->duration_days), // Add duration to start date
            'status' => 1, // Set initial status to active
        ]);

        // Redirect the user back with a success message
        return redirect()->back()->with('status', 'Investment plan activated successfully!');
    }

    /**
     * Generate a unique transaction ID.
     *
     * @return string
     */
    private function generateTransactionId()
    {
        return strtoupper(uniqid('INV-'));
    }



    public function myPlans()
    {
        return view('dashboard.my_plans');
    }


    // Update payment details
    public function updatePaymentDetails(Request $request)
    {
        // Validate the request
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:20',
            'eth_address' => 'nullable|string|max:255',
            'btc_address' => 'nullable|string|max:255',
        ]);

        // Update the authenticated user's payment details
        $user = Auth::user();
        $user->update([
            'bank_name' => $request->input('bank_name'),
            'account_name' => $request->input('account_name'),
            'account_number' => $request->input('account_number'),
            'eth_address' => $request->input('eth_address'),
            'btc_address' => $request->input('btc_address'),
        ]);

        return back()->with('success', 'Payment details updated successfully.');
    }


    // Change password
    public function changeUserPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password does not match']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }
    
    
    
        public function accountDetails()
    {
            $userId = Auth::id();

            // Retrieve all deposits for the user 
            $data['deposits'] = Deposit::where('user_id', $userId)->get();

            // Sum of pending deposits
            $data['pending_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved deposits
            $data['approved_deposits_sum'] = Deposit::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Retrieve all withdrawals for the user
            $data['withdrawals'] = Withdrawal::where('user_id', $userId)->get();

            // Sum of pending withdrawals
            $data['pending_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 0) // Assuming '0' represents 'pending'
                ->sum('amount');

            // Sum of approved withdrawals
            $data['approved_withdrawals_sum'] = Withdrawal::where('user_id', $userId)
                ->where('status', 1) // Assuming '1' represents 'approved'
                ->sum('amount');

            // Sum of profits
            $data['profit_sum'] = Profit::where('user_id', $userId)
                ->sum('amount');

            // Sum of investments
            $data['investment_sum'] = Investment::where('user_id', $userId)
                ->sum('amount');

            // Sum of referral earnings
            $data['referral_sum'] = Referral::where('user_id', $userId)
                ->sum('amount');

            // Total sum of all values
            $data['total_sum'] =  $data['approved_deposits_sum']
                - $data['approved_withdrawals_sum']
                + $data['profit_sum']
                - $data['investment_sum']
                + $data['referral_sum'];
            
            // User's currency and conversion
            $userCurrency = Auth::user()->currency;
            $conversionRate = $this->getConversionRate($userCurrency);

            $data['amountsInUSD'] = [
                'balance' => $data['total_sum'] / $conversionRate, // Total balance in USD
                'profit' => $data['profit_sum'] / $conversionRate,
                'earning' => $data['total_sum'] / $conversionRate, // Assuming total earnings in USD
                'referral' => $data['referral_sum'] / $conversionRate,
                'deposit' => $data['approved_deposits_sum'] / $conversionRate,
                'withdrawal' => $data['approved_withdrawals_sum'] / $conversionRate
            ];

            $data['conversionRate'] = $conversionRate;
            $data['userCurrency'] = $userCurrency;
            
        return view('dashboard.account_details', $data);
    }
    
    
     public function updatePayment(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|numeric',
            'eth_address' => 'nullable|string',
            'btc_address' => 'required|string',
        ]);

        $paymentDetails = User::updateOrCreate(
            ['id' => Auth::id()],
            [
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'eth_address' => $request->eth_address,
                'btc_address' => $request->btc_address,
            ]
        );

        return redirect()->route('account.details')->with('success', 'Payment details updated successfully.');
    }


    public function UserLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }
    
    
    public function changeEmail(Request $request)
{
    $request->validate([
        'new_email' => 'required|email|unique:users,email',
    ]);

    // Generate a random verification code
    $verificationCode = Str::random(6);

    // Save the verification code and new email in the session
    session(['email_verification_code' => $verificationCode]);
    session(['new_email' => $request->new_email]);

    // Send the verification code to the new email
    Mail::to($request->new_email)->send(new VerificationEmail($verificationCode));
  
    return response()->json(['message' => 'Verification code sent to your new email address.']);
}

public function verifyEmailChange(Request $request)
{
    $request->validate([
        'verification_code' => 'required',
    ]);

    // Retrieve the verification code and new email from the session
    $verificationCode = session('email_verification_code');
    $newEmail = session('new_email');

    if ($request->verification_code === $verificationCode) {
        // Update the user's email
        $user = Auth::user();
        $user->email = $newEmail;
        $user->save();

        // Clear the session data
        session()->forget(['email_verification_code', 'new_email']);

        return response()->json(['message' => 'Email updated successfully.']);
    } else {
        return response()->json(['message' => 'Invalid verification code.'], 422);
    }
}
}
