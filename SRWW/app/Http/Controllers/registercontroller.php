<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\VerifyEmailMail;
use Illuminate\Support\Facades\Mail;

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
        ],[
        'email.unique' => 'Deze email is al in gebruik'
         ]);
    
        // Generate verification token
        $verificationToken = Str::random(60);

        $userCreated = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => $verificationToken
        ]);
        
        // Create verification URL
        $verificationUrl = route('verify.email', ['token' => $verificationToken]);
        
        // Send verification email
        Mail::send(new VerifyEmailMail($verificationUrl, $request->name));
        
        // Redirect to verification page
        return redirect()->route('verify.notice')->with('email', $request->email);
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