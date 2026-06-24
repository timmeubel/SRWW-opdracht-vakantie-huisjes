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
<<<<<<< HEAD

            // Check of gebruiker admin is
            if (Auth::user()->is_admin) {
                return redirect('/admin');
            }

=======
>>>>>>> d8948be6e361ef2e9f598cb55ec6761723afd248
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email of wachtwoord is onjuist.',
        ])->onlyInput('email');
    }
<<<<<<< HEAD
}
=======

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
>>>>>>> d8948be6e361ef2e9f598cb55ec6761723afd248
