<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Fonction;
use App\Models\Niveau;
use App\Models\ParentsInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EtudiantController extends Controller {
    public function index(): View
    {
        return view('etudiants.index', [
            'title' => 'Etudiants',
            'etudiants' => Etudiant::all()
        ]);
    }

    public function ajouter (): View
    {
        return view(
            'etudiants.ajouter',
            [
                'title' => 'Ajouter Etudiant',
                'niveaux' => Niveau::all(),
                'filieres' => Filiere::all(),
                'parents' => ParentsInfo::all(),
                'fonctions' => Fonction::all()
            ]
        );
    }

    public function create(Request $request): RedirectResponse
    {
        $new_etudiant = $request->validate(
            [
                'matricule' => ['required'],
                'nom' => ['required', 'min:2'],
                'prenom' => ['required', 'min:2'],
                'NNI' => ['required', Rule::unique('etudiants')],
                'telephone' => ['required', 'numeric', Rule::unique('etudiants')],
                'email' => ['required', 'email', Rule::unique('etudiants')],
                'adress' => ['required'],
                'ville' => ['required'],
                'pays' => ['required'],
                'sexe' => ['required', Rule::in('homme', 'femme')],
                'date_naissance' => ['required'],
                'lieu_naissance' => ['required'],
                'situation_famille' => ['required'],
                'niveaux_id_niveau' => ['required'],
                'filieres_id_filiere' => ['required'],
                'parents_infos_id_parent' => ['required']
            ],
            [
                'matricule.required' => 'matricule est obligatoire',
                'nom.required' => 'Vuillez entrez le nom de l\'etudiant',
                'nom.min' => 'Le nom ne peut pas etre mois de deux caracteres',
                'prenom.required' => 'Vuillez entrez le prenom de l\'etudiant',
                'prenom.min' => 'Le prenom ne peut pas etre mois de deux caracteres',
                'NNI.required' => 'Vuillez entrez le numero national d\'indentite de l\'etudiant',
                'NNI.unique' => 'le NNI existe deja',
                'telephone.required' => 'Vuillez numero du telephone de l\'etudiant',
                'telephone.numeric' => 'Numero telephone non valide',
                'telephone.unique' => 'Le numero telephone existe deja',
                'email.required' => 'Vuillez entrez l\'email de l\'etudiant',
                'email.email' => 'Email non valide',
                'email.unique' => 'Email existe deja',
                'adress.required' => 'Vuillez entrez l\'adress de l\'etudiant',
                'ville.required' => 'Vuillez entrez la ville de l\'etudiant',
                'pays.required' => 'Vuillez entrez le pays de l\'etudiant',
                'sexe.required' => 'Vuillez selectionnez le sexe de l\'etudiant',
                'sexe.in' => 'sexe non valide',
                'date_naissance.required' => 'Vuillez entrez la date de naissance de l\'etudiant',
                'date_naissance.date' => 'Date naissance non valide',
                'lieu_naissance.required' => 'Vuillez entrez le lieu de naissance de l\'etudiant',
                'situation_famille.required' => 'Vuillez selectionnez la situation famille de l\'etudiant',
                'parents_infos_id_parent.required' => 'Vuillez selectionnez les parents de l\'etudiant',
                'niveaux_id_niveau.required' => 'Vuillez selectionnez le niveau de l\'etudiant',
                'filieres_id_filiere.required' => 'Vuillez selectionnez les filiere de l\'etudiant'
            ]
        );

        Etudiant::create($new_etudiant);

        return back();
    }

    public function modifier(Etudiant $etudiant): View
    {
        return view(
            'etudiants.modifier',
            [
                'title' => 'Modifier ' . $etudiant->prenom,
                'etudiant' => $etudiant,
                'niveaux' => Niveau::all(),
                'filieres' => Filiere::all(),
                'parents' => ParentsInfo::all(),
                'fonctions' => Fonction::all()
            ]
        );
    }

    public function update(Request $request, Etudiant $etudiant): RedirectResponse
    {
        $new_data = $request->validate(
            [
                'matricule' => ['required'],
                'nom' => ['required', 'min:2'],
                'prenom' => ['required', 'min:2'],
                'NNI' => ['required', 'unique:etudiants,NNI,' . $etudiant->id_etudiant . ',id_etudiant'],
                'telephone' => ['required', 'numeric', 'unique:etudiants,telephone,' . $etudiant->id_etudiant . ',id_etudiant'],
                'email' => ['required', 'email', 'unique:etudiants,email,' . $etudiant->id_etudiant . ',id_etudiant'],
                'adress' => ['required'],
                'ville' => ['required'],
                'pays' => ['required'],
                'sexe' => ['required', Rule::in('homme', 'femme')],
                'date_naissance' => ['required'],
                'lieu_naissance' => ['required'],
                'situation_famille' => ['required'],
                'niveaux_id_niveau' => ['required'],
                'filieres_id_filiere' => ['required'],
                'parents_infos_id_parent' => ['required']
            ],
            [
                'matricule.required' => 'Le matricule est obligatoire',
                'nom.required' => 'Vuillez entrez le nom de l\'etudiant',
                'nom.min' => 'Le nom ne peut pas etre mois de deux caracteres',
                'prenom.required' => 'Vuillez entrez le prenom de l\'etudiant',
                'prenom.min' => 'Le prenom ne peut pas etre mois de deux caracteres',
                'NNI.required' => 'Vuillez entrez le numero national d\'indentite de l\'etudiant',
                'NNI.unique' => 'le NNI existe deja',
                'telephone.required' => 'Vuillez numero du telephone de l\'etudiant',
                'telephone.numeric' => 'Numero telephone non valide',
                'telephone.unique' => 'Le numero telephone existe deja',
                'email.required' => 'Vuillez entrez l\'email de l\'etudiant',
                'email.email' => 'Email non valide',
                'email.unique' => 'Email existe deja',
                'adress.required' => 'Vuillez entrez l\'adress de l\'etudiant',
                'ville.required' => 'Vuillez entrez la ville de l\'etudiant',
                'pays.required' => 'Vuillez entrez le pays de l\'etudiant',
                'sexe.required' => 'Vuillez selectionnez le sexe de l\'etudiant',
                'sexe.in' => 'sexe non valide',
                'date_naissance.required' => 'Vuillez entrez la date de naissance de l\'etudiant',
                'date_naissance.date' => 'Date naissance non valide',
                'lieu_naissance.required' => 'Vuillez entrez le lieu de naissance de l\'etudiant',
                'situation_famille.required' => 'Vuillez selectionnez la situation famille de l\'etudiant',
                'parents_infos_id_parent.required' => 'Vuillez selectionnez les parents de l\'etudiant',
                'niveaux_id_niveau.required' => 'Vuillez selectionnez le niveau de l\'etudiant',
                'filieres_id_filiere.required' => 'Vuillez selectionnez les filiere de l\'etudiant'
            ]
        );
        $etudiant->update($new_data);

        return redirect(route('etudiants'));
    }

    public function delete(Etudiant $etudiant): RedirectResponse
    {
        $etudiant->delete();
        return back();
    }
}
