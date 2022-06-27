<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Filiere;
use Illuminate\Contracts\View\View;

class Home extends Controller
{
    public function index(): View
    {
        return view(
            'home.index',
            [
                'title' => "Sup Management System",
                'filieres' => FiliereController::index(),
                'cycles' => CycleController::index(),
                'niveaux' => NiveauController::index()
            ]
        );
    }
}
