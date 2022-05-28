<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Fonction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeController extends Controller
{
    public function index(): View
    {
        return view(
            'employes.index',
            [
                'title' => 'Employes',
                'employes' => Employe::all()
            ]
        );
    }

    public function ajouter (): View
    {
        return view(
            'employes.ajouter',
            [
                'title' => 'Ajouter Employe',
                'fonctions' => Fonction::all()
            ]
        );
    }

    public function create(Request $request): RedirectResponse
    {
        $new_employe = $request->validate(
            [
                'fonctions_id_fonction' => ['required'],
                'nom' => ['required', 'min:2'],
                'prenom' => ['required', 'min:2'],
                'NNI' => ['required', Rule::unique('employes')],
                'telephone_1' => ['required', 'numeric', Rule::unique('employes')],
                'telephone_2' => [],
                'email' => ['required', 'email', Rule::unique('employes')],
                'adress' => ['required'],
                'ville' => ['required'],
                'pays' => ['required'],
                'sexe' => ['required', Rule::in('homme', 'femme')],
                'date_naissance' => ['required', 'date'],
                'lieu_naissance' => ['required']
            ],
            [
                'fonctions_id_fonction.required' => 'Vuillez selectionnez la fonction de l\'employe',
                'nom.required' => 'Vuillez entrez le nom de l\'employe',
                'nom.min' => 'Le nom ne peut pas etre mois de deux caracteres',
                'prenom.required' => 'Vuillez entrez le prenom de l\'employe',
                'prenom.min' => 'Le prenom ne peut pas etre mois de deux caracteres',
                'NNI.required' => 'Vuillez entrez le numero national d\'indentite de l\'employe',
                'NNI.unique' => 'le NNI existe deja',
                'telephone_1.required' => 'Vuillez numero du telephone de l\'employe',
                'telephone_1.numeric' => 'Numero telephone non valide',
                'telephone_1.unique' => 'Le numero telephone existe deja',
                'email.required' => 'Vuillez entrez l\'email de l\'employe',
                'email.email' => 'Email non valid deja',
                'email.unique' => 'Email existe deja',
                'adress.required' => 'Vuillez entrez l\'adress de l\'employe',
                'ville.required' => 'Vuillez entrez la ville de l\'employe',
                'pays.required' => 'Vuillez entrez le pays de l\'employe',
                'sexe.required' => 'Vuillez selectionnez le sexe de l\'employe',
                'sexe.in' => 'sexe non valide',
                'date_naissance.required' => 'Vuillez entrez la date de naissance de l\'employe',
                'date_naissance.date' => 'Date naissance non valide',
                'lieu_naissance.required' => 'Vuillez entrez le lieu de naissance de l\'employe'
            ]
        );
        Employe::create($new_employe);

        return back();
    }

    public function modifier(Employe $employe): View
    {
        return view(
            'employes.modifier',
            [
                'title' => 'Modifier ' . $employe->nom,
                'employe' => $employe,
                'fonctions' => Fonction::all()
            ]
        );
    }

    public function update(Request $request, Employe $employe): RedirectResponse
    {
        $new_data = $request->validate(
            [
                'fonctions_id_fonction' => ['required'],
                'nom' => ['required', 'min:2'],
                'prenom' => ['required', 'min:2'],
                'NNI' => ['required', 'unique:employes,NNI,' . $employe->id_employe . ',id_employe'],
                'telephone_1' => ['required', 'numeric', 'unique:employes,telephone_1,' . $employe->id_employe . ',id_employe'],
                'telephone_2' => [],
                'email' => ['required', 'email', 'unique:employes,email,' . $employe->id_employe . ',id_employe'],
                'adress' => ['required'],
                'ville' => ['required'],
                'pays' => ['required'],
                'sexe' => ['required', Rule::in('homme', 'femme')],
                'date_naissance' => ['required', 'date'],
                'lieu_naissance' => ['required']
            ],
            [
                'fonctions_id_fonction.required' => 'Vuillez selectionnez la fonction de l\'employe',
                'nom.required' => 'Vuillez entrez le nom de l\'employe',
                'nom.min' => 'Le nom ne peut pas etre mois de deux caracteres',
                'prenom.required' => 'Vuillez entrez le prenom de l\'employe',
                'prenom.min' => 'Le prenom ne peut pas etre mois de deux caracteres',
                'NNI.required' => 'Vuillez entrez le numero national d\'indentite de l\'employe',
                'NNI.unique' => 'le NNI existe deja',
                'telephone_1.required' => 'Vuillez numero du telephone de l\'employe',
                'telephone_1.numeric' => 'Numero telephone non valide',
                'telephone_1.unique' => 'Le numero telephone existe deja',
                'email.required' => 'Vuillez entrez l\'email de l\'employe',
                'email.email' => 'Email non valid deja',
                'email.unique' => 'Email existe deja',
                'adress.required' => 'Vuillez entrez l\'adress de l\'employe',
                'ville.required' => 'Vuillez entrez la ville de l\'employe',
                'pays.required' => 'Vuillez entrez le pays de l\'employe',
                'sexe.required' => 'Vuillez selectionnez le sexe de l\'employe',
                'sexe.in' => 'sexe non valide',
                'date_naissance.required' => 'Vuillez entrez la date de naissance de l\'employe',
                'date_naissance.date' => 'Date naissance non valide',
                'lieu_naissance.required' => 'Vuillez entrez le lieu de naissance de l\'employe'
            ]
        );
        $employe->update($new_data);

        return redirect(route('employes'));
    }

    public function delete(Employe $employe): RedirectResponse
    {
        $employe->delete();
        return back();
    }
}
