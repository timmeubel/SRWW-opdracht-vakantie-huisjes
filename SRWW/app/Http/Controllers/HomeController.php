<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\VacationHouse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $houses = VacationHouse::take(6)->get();
        $settings = Setting::pluck('value', 'key');

        return view('home', compact('houses', 'settings'));
    }
}
