<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class NiveauController extends Controller {
    public static function index(): Collection
    {
        return Niveau::all();
    }

    public function create(Request $request): RedirectResponse
    {
        $new_niveau = $request->validate([
            'libelle_niveau' => ['required'],
            'cycles_id_cycle' => ['required']
        ]);

        Niveau::create($new_niveau);
        return back()->with('message','Niveau Cree Avec Succee');
    }

    public function update(Request $request, Niveau $niveau): RedirectResponse
    {
        $new_data = $request->validate([
            'libelle_niveau' => ['required'],
            'cycles_id_cycle' => ['required']
        ]);

        $niveau->update($new_data);
        return back()->with('message', 'Niveau Modifie Avec Succee');
    }

    public function delete(Niveau $niveau): RedirectResponse
    {
        $niveau->delete();
        return back()->with('message', 'Niveau Supprime Avec Succee');
    }
}
