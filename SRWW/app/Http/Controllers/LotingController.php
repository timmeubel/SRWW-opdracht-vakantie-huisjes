<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inschrijving;

class LotingController extends Controller
{
    public function loting()
    {
        return view('loting');
    }

    public function store(Request $request)
    {
        $request->validate([
            'telefoonnummer' => 'required',
            'personeelslidnummer' => 'required',
            'huisje_1' => 'required',
        ]);

        Inschrijving::create([
            'naam' => $request->personeelslidnummer,
            'voorkeur_1' => $request->huisje_1,
            'voorkeur_2' => $request->huisje_2,
            'voorkeur_3' => $request->huisje_3,
        ]);

        return redirect('/loting')->with('success', 'Uw loting deelname is succesvol geregistreerd!');
    }
}
