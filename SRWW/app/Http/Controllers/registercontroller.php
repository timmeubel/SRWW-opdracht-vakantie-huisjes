<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmailMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6'
        ], [
            'email.unique' => 'Deze email is al in gebruik'
        ]);

        // Generate verification token
        $verificationToken = Str::random(60);

        $userCreated = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => $verificationToken,
            'is_admin' => false,
            'email_verified_at' => now(), // auto-verify since MAIL_MAILER=log
        ]);

        // Create verification URL (logged for reference)
        $verificationUrl = route('verify.email', ['token' => $verificationToken]);

        // Send verification email (goes to storage/logs/laravel.log)
        Mail::send(new VerifyEmailMail($verificationUrl, $request->name, $request->email));

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Account aangemaakt! Je kunt nu inloggen.');
    }

    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/register')->with('error', 'Verificatielink is ongeldig of verlopen.');
        }

        // Mark email as verified
        $user->update([
            'email_verified_at' => now(),
            'verification_token' => null
        ]);

        return redirect('/login')->with('success', 'Je e-mailadres is geverifieerd! Je kunt nu inloggen.');
    }
}
