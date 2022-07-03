<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Filiere;
use App\Models\Horaire;
use App\Models\Jour;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeanceController extends Controller
{
    public function index(Request $request): View
    {
        if (isset($_GET['niveaux_id_niveau'])) {
            $seances = Seance::get()
                ->where('niveaux_id_niveau', $request->query()['niveaux_id_niveau'])
                ->where('filieres_id_filiere', $request->query()['filieres_id_filiere']);
        } else {
            $seances = Seance::get()
                ->where('niveaux_id_niveau', 1)
                ->where('filieres_id_filiere', 1);
        }

        $professeurs = Employe::join(
            'fonctions',
            'employes.fonctions_id_fonction',
            '=',
            'fonctions.id_fonction'
        )
            ->where(
                'fonctions.fonction',
                'like',
                '%rofesseur%'
            )
            ->get();

        return view(
            'seances.index',
            [
                'title' => 'Emploi du Temps',
                'horaires' => Horaire::all(),
                'jours' => Jour::all(),
                'niveaux' => Niveau::all(),
                'filieres' => Filiere::all(),
                'matieres' => Matiere::all(),
                'professeurs' => $professeurs,
                'seances' => $seances
            ]
        );
    }

    public function filter(Request $request)
    {
        // return view('seances.index', [
        //     'title' => 'Emploi du Temps',
        //     'horaires' => Horaire::all(),
        //     'jours' => Jour::all(),
        //     'niveaux' => Niveau::all(),
        //     'filieres' => Filiere::all(),
        //     'matieres' => Matiere::all(),
        //     'seances' => $seances
        // ]);
    }

    public function show($id_seance)
    {
        return response()->json(Seance::find($id_seance));
    }

    public function create(Request $request)
    {
        $new_seance = $request->validate([
            'horaires_id_horaire' => ['required'],
            'jours_id_jour' => ['required'],
            'professeurs_id_professeur' => ['required'],
            'niveaux_id_niveau' => ['required'],
            'filieres_id_filiere' => ['required'],
            'matieres_id_matiere' => ['required'],
        ]);

        $new_seance['seance_rattrapage'] = $request->input('seance_rattrapage') ? 1 : 0;
        $new_seance['employes_id_employe'] = $request->user()->employes_id_employe;

        // dd($new_seance);

        Seance::create($new_seance);
        return back()->with('message', 'Seance Ajoutee Avec Succee');
    }

    public function update(Request $request, Seance $seance)
    {
        $new_data = $request->validate([
            'horaires_id_horaire' => ['required'],
            'jours_id_jour' => ['required'],
            'professeurs_id_professeur' => ['required'],
            'niveaux_id_niveau' => ['required'],
            'filieres_id_filiere' => ['required'],
            'matieres_id_matiere' => ['required']
        ]);

        $new_seance['seance_rattrapage'] = $request->input('seance_rattrapage') ? 1 : 0;

        $seance->update($new_data);
        return back()->with('message', 'Seance modifie avec succee');
    }

    public function delete(Seance $seance)
    {
        $seance->delete();
        return back()->with('message', 'Seance suppprime avec succee');
    }
}