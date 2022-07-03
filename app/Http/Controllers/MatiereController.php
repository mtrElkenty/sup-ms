<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public static function index(): Collection
    {
        return Matiere::all();
    }

    public function show($id_matiere)
    {
        return response()->json(Matiere::find($id_matiere));
    }

    public function create(Request $request)
    {
        $new_matiere = $request->validate([
            'code_matiere' => ['required'],
            'libelle_matiere' => ['required'],
            'coefficient' => ['required'],
            'modules_id_modules' => ['required']
        ]);

        Matiere::create($new_matiere);
        return back()->with('message', 'Matiere Ajoute Avec Succee');
    }

    public function update(Request $request, Matiere $matiere)
    {
        $new_data = $request->validate([
            'code_matiere' => ['required'],
            'libelle_matiere' => ['required'],
            'coefficient' => ['required'],
            'modules_id_modules' => ['required']
        ]);

        $matiere->update($new_data);
        return back()->with('message', 'Matiere Modifie Avec Succee');
    }

    public function delete(Request $request, Matiere $matiere)
    {
        $matiere->delete();
        return back()->with('message', 'Matiere Supprime Avec Succee');
    }
}