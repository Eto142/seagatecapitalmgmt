<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ForgotPasswordController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function showLinkRequestForm(): View
    {
        return view('auth.password_email');
    }

    /**
     * Handle an incoming password reset link request.
     */
    public function sendResetLinkEmail(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        // We will send the password reset link to this user
        $status = Password::sendResetLink(
            $request->only('email'),
            function ($user, $token) {
                $resetUrl = url(route('password.reset', [
                    'token' => $token,
                    'email' => $user->email,
                ], false));
                
                $expires = now()->addMinutes(config('auth.passwords.'.config('auth.defaults.passwords').'.expire'));
                
                // Send the email using Mail facade directly
                Mail::to($user->email)->send(new PasswordResetMail($user, $resetUrl, $expires));
            }
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}