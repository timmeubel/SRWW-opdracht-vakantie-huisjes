<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    // 1. Toon de lijst met alle gebruikers
    public function index()
    {
        // Haal alle gebruikers op uit de database
        $users = User::all(); 
        
        // Stuur ze door naar de 'index' pagina in de map 'users'
        return view('users.index', compact('users'));
    }

    // 2. Toon het formulier om een gebruiker te editen
    public function edit(User $user)
    {
        // Laravel zoekt automatisch de juiste gebruiker erbij via het ID in de URL
        return view('users.edit', compact('user'));
    }

    // 3. Sla de gewijzigde naam en email op
    public function update(Request $request, User $user)
    {
        // Validatie: check of de velden zijn ingevuld en of het emailadres klopt
        $request->validate([
            'name' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:user,email,' . $user->id,
        ]);

        // Update de gegevens in de database
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Stuur de beheerder terug naar de hoofdlijst met een succesmelding
        return redirect()->route('users.index')->with('success', 'Gebruiker succesvol bijgewerkt!');
    }

    // 4. Admin rechten geven of afnemen
    public function toggleAdmin(User $user)
    {
        // We draaien de boolean om: als het true (1) is wordt het false (0), en andersom
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Admin-status succesvol aangepast!');
    }

    // 5. Gebruiker verwijderen
    public function destroy(User $user)
    {
        // Verwijder de gebruiker uit de database
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Gebruiker is verwijderd!');
    }
}