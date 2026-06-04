<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    

        $userCreated = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
   
           return redirect('/');
    }
}