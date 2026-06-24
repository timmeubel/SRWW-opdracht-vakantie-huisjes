<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check of gebruiker admin is via rol_id (Stel: 1 is admin)
            if (Auth::user()->rol_id == 1) {
                return redirect('/gebruikers'); 
            }

            // Normale gebruikers gaan naar de homepagina
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email of wachtwoord is onjuist.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}