<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Fonction;
use Illuminate\Contracts\View\View;

class ProfesseurController extends EmployeController {
    public function index(): View {
        return view(
            'employes.index',
            [
                'title' => 'Professeurs',
                'employes' => Employe::all(),
                'is_prof_page' => true
            ]);
    }

    public function ajouter(): View {
        return view(
            'employes.ajouter',
            [
                'title' => 'Ajouter Professeur',
                'fonctions' => Fonction::all(),
                'is_prof_page' => true
            ]);
    }

    public function modifier(Employe $employe): View {
        return view(
            'employes.modifier',
            [
                'title' => 'Modifier ' . $employe->nom,
                'employe' => $employe, 'fonctions' => Fonction::all(),
                'is_prof_page' => true
            ]
        );
    }
}
