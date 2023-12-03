<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Torta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;


class ProfileController extends Controller
{
    use Notifiable;
    public function show()
    {
        // Získání aktuálně přihlášeného uživatele
        $user = auth()->user();

        // Předání dat do view
        return view('profile.show', compact('user'));
    }

    public function torty()
{
    $torty = Torta::all();
    return view('profile.torty', compact('torty'));
}

public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->with('error', 'Současné heslo není správné.');
        }
        /** @var \App\Models\User $user **/
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Heslo bylo úspěšně změněno.');
    }
public function update(Request $request)
{
    // validace atd.

    $user = Auth::user(); // získání přihlášeného uživatele

    // aktualizace údajů
    /** @var \App\Models\User $user **/
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        // další údaje, které chceš aktualizovat
    ]);

    return redirect()->route('profile.show')->with('success', 'Profil byl úspěšně aktualizován.');
}

}
