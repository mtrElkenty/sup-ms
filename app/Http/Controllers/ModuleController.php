<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public static function index(): Collection
    {
        return Module::all();
    }

    public function create(Request $request)
    {
        $new_module = $request->validate([
            'code_module' => ['required'],
            'libelle_module' => ['required'],
            'filieres_id_filiere' => ['required'],
            'semestres_id_semestre' => ['required']
        ]);

        Module::create($new_module);
        return back()->with('message', 'Module Cree Avec Succee');
    }

    public function update(Request $request, Module $module)
    {
        $new_data = $request->validate([
            'code_module' => ['required'],
            'libelle_module' => ['required'],
            'filieres_id_filiere' => ['required'],
            'semestres_id_semestre' => ['required']
        ]);

        $module->update($new_data);
        return back()->with('message', 'Module Modifie Avec Succee');
    }

    public function delete(Module $module)
    {
        $module->delete();
        return back()->with('message', 'Module Supprime Avec Succee');
    }
}