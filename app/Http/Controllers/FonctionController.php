<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    // Lister tous les fonctions
    public function index(): View
    {
        return view('fonctions.index', ['title' => 'Fonctions', 'fonctions' => Fonction::all()]);
    }

    // Lister une fonction
    public function show(Fonction $fonction): View
    {
        return view('fonctions.index', ['title' => $fonction->fonction, 'fonction' => $fonction]);
    }

    public function create(Request $request): RedirectResponse
    {
        $new_fonction = $request->validate([
            'fonction' => ['required'],
            'description' => []
        ]);

        Fonction::create($new_fonction);
        return back()->with('message', 'Fonction Cree Avec Succee!');
    }

    public function update(Request $request, Fonction $fonction): RedirectResponse
    {
        $new_data = $request->validate([
            'fonction' => ['required'],
            'description' => []
        ]);

        $fonction->update($new_data);
        return back()->with('message', 'Fonction Modifier Avec Succee!');
    }

    public function delete(Fonction $fonction): RedirectResponse
    {
        $fonction->delete();
        return back()->with('message', 'Fonction Supprime Avec Succee');
    }
}