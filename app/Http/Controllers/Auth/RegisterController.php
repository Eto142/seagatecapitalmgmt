<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeEmail;
use App\Mail\VerificationEmail;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
                 // Check honeypot field
    if (!empty($data['honeypot'])) {
        abort(403, 'Bot detected!');
    }

    // Check timestamp (submission must take at least 3 seconds)
    if (isset($data['timestamp']) && (now()->timestamp - $data['timestamp']) < 3) {
        abort(403, 'Submission too fast!');
    }
    
    
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:255'],
            'currency' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'acct_form' => ['nullable', 'string', 'max:255'],
        ]);
    }

    /**
     * Show the registration form with referral link handling.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm(Request $request)
    {
        $referred_by = null;

        // Check if a referral code is present in the URL
        if ($request->has('ref')) {
            // Find the user who referred using the referral code
            $referred_by = User::where('ref', $request->query('ref'))->first();
        }

        // Pass the referred user data to the registration view
        return view('auth.register', ['referred_by' => $referred_by]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Check if the user was referred, otherwise set null for 'ref'
        $referred_by = $data['referred_by'] ?? null;
        
         $validToken = rand(1000, 9999); // Generate a 4-digit random token

        // Create new user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'currency' => $data['currency'],
            'country' => 'new',
            'acct_form' => $data['acct_form'], // Account form or optional field
            'password' => Hash::make($data['password']),
            'ref' => $referred_by ? $referred_by->ref : null, // Referral code if referred
        ]);

        // Prepare the email content
        $wMessage = "
            <p>Hello {$user->name},</p>
            <p>We are so happy to have you on board.</p>
            <p>Your email: <strong>{$user->email}</strong></p>
            <p>Your password: <strong>{$data['password']}</strong></p>
        ";

        // Send welcome email
       Mail::to($user->email)->send(new VerificationEmail($validToken));

        //Mail::to($user->email)->send(new welcomeEmail($wMessage));

        return $user; // Return the created user instance
    }
}
