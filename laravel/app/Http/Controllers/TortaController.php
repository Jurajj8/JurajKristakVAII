<?php

// app/Http/Controllers/TortaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Torta;
use App\Models\TypTorty;

class TortaController extends Controller
{
    // ...

    public function create()
    {
        $typyTorty = TypTorty::all(); // Získání všech možných hodnot typu z tabulky 'typy_torty'
        return view('profile.create', compact('typyTorty'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'nazov' => 'required|string',
        'zakladne_zlozenie' => 'required|string',
        'cena' => 'required|numeric|between:0,999999.99',
        'obrazok' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'popis' => 'required|string',
        'typ_id' => 'required|exists:typy_torty,id',
    ]);

    if ($request->hasFile('obrazok')) {
        $obrazokPath = $request->file('obrazok')->store('public');
        $data['obrazok'] = $obrazokPath;
    }

    // Přidání typu do torty
    $torta = new Torta($data);
    $torta->typ_id()->associate($data['typ_id']);
    $torta->save();

    return redirect()->route('torty.index');
}
    public function index()
    {
        $torty = Torta::all();

        return view('torty.index', compact('torty'));
    }

public function edit(Torta $torta)
{
    return view('torty.edit', compact('torta'));
}

public function update(Request $request, Torta $torta)
{
    $data = $request->validate([
        'nazov' => 'required|string',
        'zakladne_zlozenie' => 'required|string',
        'cena' => 'required|numeric|between:0,999999.99',
        'obrazok' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'popis' => 'nullable|string',
    ]);

    if ($request->hasFile('obrazok')) {
        $data['obrazok'] = $request->file('obrazok')->store('obrazky');
    }

    $torta->update($data);

    return redirect()->route('torty.index');
}


public function delete(Torta $torta)
{
    // Smazání torty z databáze
    $torta->delete();

    return response()->json(['message' => 'Torta byla úspěšně smazána']);
}




    public function getTorty()
    {
    $torty = Torta::all();

    return view('profile.torty', compact('torty'));
    }
}
