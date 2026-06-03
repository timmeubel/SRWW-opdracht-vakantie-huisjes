<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LotingController extends Controller
{
    public function loting()
    {
        return view('loting');
    }
}
