<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    public static function index(): Collection
    {
        return Semestre::all();
    }

    public function create(Request $request)
    {
        $new_semestre = $request->validate(
            [
                'libelle_semestre' => ['required'],
                'niveaux_id_niveau' => ['required']
            ],
            [
                'libelle_semestre.required' => 'Le libelle est obligatoire',
                'niveaux_id_niveau.required' => 'Selectionnez le niveau du semestre'
            ]
        );

        Semestre::create($new_semestre);
        return back()->with('message', 'Semestre Ajoutee Svec Succee');
    }

    public function update(Request $request, Semestre $semestre)
    {
        $new_data = $request->validate(
            [
                'libelle_semestre' => ['required', 'unique:semestres,libelle_semestre,' . $semestre->id_semestre . ',id_semestre'],
                'niveaux_id_niveau' => ['required']
            ]
        );

        $semestre->update($new_data);
        return back()->with('message', 'Semestre Modifier Svec Succee');
    }
}