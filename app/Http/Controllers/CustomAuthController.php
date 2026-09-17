<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Activity;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

class CustomAuthController extends Controller
{

    public function indexAuth()
    {
        return view('auth.index');
    }

    public function verifyAccount()
    {
        return view('auth.index');
    }


    // public function verify()
    // {
    //     // Generate a random number
    //     $data['firstNumber'] = mt_rand(0, 9);
    //     $data['secondNumber'] = mt_rand(0, 7);
    //     $data['thirdNumber'] = mt_rand(0, 4);
    //     $data['fourthNumber'] = mt_rand(0, 3);
    //     $data['fifthNumber'] = mt_rand(0, 2);
    //     $data['sixthNumber'] = mt_rand(0, 5);
    //     $data['captcha_secret'] = $data['firstNumber'] . $data['secondNumber'] . $data['thirdNumber'] . $data['fourthNumber'] . $data['fifthNumber'] . $data['sixthNumber'];

    //     return view('auth.reg', $data);
    // }

    // public function verifyCaptcha(Request $request)
    // {

    //     $data['captcha_secret'] = $request['captcha_secret'];
    //     $data['captcha'] = $request['captcha'];

    //     if ($data['captcha_secret'] == $data['captcha']) {
    //         return response()->json([
    //             "content" => 'correct',
    //             "message" => 'Login Successful',
    //             "redirect" => url("dashboard")
    //         ]);
    //     } else {
    //         return response()->json([
    //             "content" => 'Error',
    //             "message" => "Invalid credentials",
    //             "redirect" => url("login")
    //         ]);
    //     }
    // }


    // public function terms()
    // {
    //     return view('auth.terms');
    // }



    // public function welcome()
    // {
    //     return view('auth.welcome');
    // }


    // //
    // public function home(Request $request)
    // {
    //     if (Auth::id()) {
    //         if (Auth::user()->user_type == '1') {
    //             $result = DB::table('users')->where('user_type', '0')->get();
    //             return view('admin.home', compact('result'));
    //         } else {

    //             $data['clientIpAddress'] = $request->getClientIp();
    //             $data['userIp'] = $request->ip();
    //             $data['location'] = Location::get($data['userIp']);

    //             // Use the Location facade to get the user's location
    //             $location = Location::get($data['userIp']);

    //             // Determine the flag URL
    //             $data['flagUrl'] = '';
    //             if ($location && $location->countryCode) {
    //                 $data['flagUrl'] = "https://flagcdn.com/24x18/" . strtolower($location->countryCode) . ".png";
    //             }





    //         $data['credits'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1')->where('transaction_type', 'Credit')->sum('transaction_amount');
    //         $data['debits'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1')->where('transaction_type', 'Debit')->sum('transaction_amount');
    //         $data['balance'] = $data['credits'] - $data['debits'];
    //             $data['transactions'] = DB::table('transactions')->take(1)->where('user_id', Auth::user()->id)->get();
    //             $data['activity'] = Activity::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->skip(1)->take(1)->first();
    //             return view('dashboard.home', $data);
    //         }
    //     }
    // }
}
