<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class CrudUserController extends Controller
{
    public function edit(User $user)
{
    return view('admin.CrudUser', compact('user'));
}

public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($validated);
    return redirect()->route('users.index')->with('success', 'Gebruiker bijgewerkt!');
}

public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index')->with('success', 'Gebruiker verwijderd!');
}
}
