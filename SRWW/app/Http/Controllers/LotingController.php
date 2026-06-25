<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inschrijving;
use App\Models\Inschrijfronde;
use App\Models\Loting;

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
            'week_voorkeur_start' => 'required|date|after:today',
            'week_voorkeur_eind'  => 'required|date|after:week_voorkeur_start',
        ]);

        // Find the first active inschrijfronde, or create a default one
        $inschrijfronde = Inschrijfronde::first();
        if (!$inschrijfronde) {
            $inschrijfronde = Inschrijfronde::create([
                'id' => 1,
                'begin_datum' => now(),
                'eind_datum' => now()->addDays(14),
            ]);
        }

        // Find the first active loting, or create a default one
        $loting = Loting::first();
        if (!$loting) {
            $loting = Loting::create([
                'moment' => now()->addDays(15),
            ]);
        }

        Inschrijving::create([
            'naam'                => $request->personeelslidnummer,
            'email'               => auth()->user()?->email,
            'voorkeur_1'          => $request->huisje_1,
            'voorkeur_2'          => $request->huisje_2,
            'voorkeur_3'          => $request->huisje_3,
            'week_voorkeur_start' => $request->week_voorkeur_start,
            'week_voorkeur_eind'  => $request->week_voorkeur_eind,
            'loting_id'           => $loting->id,
            'inschrijfronde_id'   => $inschrijfronde->id,
        ]);

        return redirect('/loting')->with('success', 'Uw loting deelname is succesvol geregistreerd!');
    }
}

