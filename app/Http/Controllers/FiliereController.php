<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FiliereController extends Controller {

    public static function index(): Collection
    {
        return Filiere::all();
    }

    public function create(Request $request): RedirectResponse
    {
        $new_filiere = $request->validate([
            'code_filiere' => ['required'],
            'libelle_filiere' => ['required'],
            'cycles_id_cycle' => ['required']
        ]);

        Filiere::create($new_filiere);
        return back()->with('message', 'Filiere Cree Avec Succee');
    }

    public function update(Request $request, Filiere $filiere): RedirectResponse
    {
        $new_date = $request->validate([
            'code_filiere' => ['required'],
            'libelle_filiere' => ['required'],
            'cycles_id_cycle' => ['required']
        ]);

        $filiere->update($new_date);
        return back()->with('message', 'Filiere Modifie Avec Succee');
    }

    public function delete(Filiere $filiere): RedirectResponse
    {
        $filiere->delete();
        return back()->with('message', 'Filiere Supprime Avec Succee');
    }
}
