<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    // Lister tous les fonctions
    public function index()
    {
        return view('fonctions.index', ['title' => 'Fonctions | SupMS', 'fonctions' => Fonction::all()]);
    }

    // Lister une fonction
    public function show(Fonction $fonction)
    {
        return view('fonctions.index', ['title' => $fonction->fonction . ' | SupMS', 'fonction' => $fonction]);
    }

    public function create(Request $request)
    {
        $formFields = $request->validate([
            'fonction' => ['required'],
            'description' => []
        ]);

        Fonction::create($formFields);
        return redirect(route('fonctions'));
    }

    public function update(Request $request, Fonction $fonction)
    {
        $formFields = $request->validate([
            'fonction' => ['required'],
            'description' => []
        ]);

        $fonction->update($formFields);
        return back()->with('message', 'Fonction Modifier Avec Succee!');
    }

    public function delete(Fonction $fonction)
    {
        $fonction->delete();
        return back()->with('message', 'Fonction supprime avec succee');
    }
}