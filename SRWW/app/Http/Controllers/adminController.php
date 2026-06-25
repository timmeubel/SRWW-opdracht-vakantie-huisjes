<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inschrijving;
use Carbon\Carbon;

class adminController extends Controller
{
    public function admin()
    {
        return view('admin.admin');
    }

    public function exportInschrijvingen()
    {
        // Check if user is admin
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }

        // Get inschrijvingen from the past year
        $oneYearAgo = Carbon::now()->subYear();
        $inschrijvingen = Inschrijving::where('created_at', '>=', $oneYearAgo)->get();

        // Create CSV
        $filename = 'inschrijvingen_' . now()->format('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($inschrijvingen) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for UTF-8 (so Excel recognizes special characters)
            fwrite($file, "\xEF\xBB\xBF");
            
            // Header row
            fputcsv($file, [
                'ID',
                'Naam/Personeelslidnummer',
                'E-mail',
                'Telefoon',
                'Voorkeur 1',
                'Voorkeur 2',
                'Voorkeur 3',
                'Vakantieperiode Start',
                'Vakantieperiode Eind',
                'Datum Inschrijving'
            ], ';');

            // Data rows
            foreach ($inschrijvingen as $inschrijving) {
                fputcsv($file, [
                    $inschrijving->id ?? '',
                    $inschrijving->naam ?? '',
                    $inschrijving->email ?? '',
                    $inschrijving->telefoonnummer ?? '',
                    $inschrijving->voorkeur_1 ?? '',
                    $inschrijving->voorkeur_2 ?? '',
                    $inschrijving->voorkeur_3 ?? '',
                    $inschrijving->week_voorkeur_start ?? '',
                    $inschrijving->week_voorkeur_eind ?? '',
                    $inschrijving->created_at ?? '',
                ], ';');
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
