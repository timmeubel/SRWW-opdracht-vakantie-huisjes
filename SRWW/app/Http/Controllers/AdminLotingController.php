<?php

namespace App\Http\Controllers;

use App\Models\Inschrijving;
use App\Models\Loting;
use App\Models\Inschrijfronde;

class AdminLotingController extends Controller
{
    public function index()
    {
        $inschrijvingen = Inschrijving::with(['loting', 'inschrijfronde'])->get();
        $lotingen = Loting::all();
        $inschrijfronden = Inschrijfronde::all();

        return view('admin.loting', [
            'inschrijvingen' => $inschrijvingen,
            'lotingen' => $lotingen,
            'inschrijfronden' => $inschrijfronden,
        ]);
    }
}
