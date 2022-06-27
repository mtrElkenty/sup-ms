<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CycleController extends Controller {

    public static function index(): Collection
    {
        return Cycle::all();
    }

    public function create(Request $request): RedirectResponse
    {
        $new_cycle = $request->validate([
            'libelle_cycle' => ['required'],
            'nombre_annees' => ['required']
        ]);

        Cycle::create($new_cycle);
        return back()->with('message', 'Cycle Cree Avec Succee');
    }

    public function update(Request $request, Cycle $cycle): RedirectResponse
    {
        $new_data = $request->validate([
            'libelle_cycle' => ['required'],
            'nombre_annees' => ['required']
        ]);

        $cycle->update($new_data);
        return back()->with('message', 'Cycle Modifie Avec Succee');
    }

    public function delete(Cycle $cycle): RedirectResponse
    {
        $cycle->delete();
        return back()->with('message', 'Cycle Supprime Avec Succee');
    }
}
