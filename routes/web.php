<?php

use App\Http\Controllers\FonctionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\ParentInfoController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\Home;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Home::class, 'index'])->name('home')->middleware('auth');

// View Login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Authentifier User
Route::post('/auth', [UserController::class, 'authenticate'])->middleware('guest');

// Authentifier User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// ==================================================================================================
// Routes pour les fonctions:
// ==================================================================================================

// Tous les fonction
Route::get('/fonctions', [FonctionController::class, 'index'])->name('fonctions')->middleware('auth');

// Ajouter Une Fonction
Route::post('/fonctions', [FonctionController::class, 'create'])->middleware('auth');

// Modifier Une Fonction
Route::put('/fonctions/{fonction}', [FonctionController::class, 'update'])->middleware('auth');

// Modifier Une Fonction
Route::delete('/fonctions/{fonction}', [FonctionController::class, 'delete'])->middleware('auth');


// ==================================================================================================
// Routes pour les employes
// ==================================================================================================

// Tous les Employe
Route::get('/employes', [EmployeController::class, 'index'])->name('employes')->middleware('auth');

// Ajouter Un Employe
// View
Route::get('/employes/ajouter', [EmployeController::class, 'ajouter'])->name('ajouter-employe')->middleware('auth');
// Action
Route::post('/employes', [EmployeController::class, 'create'])->middleware('auth');

// Modifier Un Employe
// View
Route::get('/employes/modifier/{employe}', [EmployeController::class, 'modifier'])->name('modifier-employe')->middleware('auth');
// Action
Route::put('/employes/{employe}', [EmployeController::class, 'update'])->middleware('auth');

// Supprimer Un Employe
Route::delete('/employes/{employe}', [EmployeController::class, 'delete'])->middleware('auth');


// ==================================================================================================
// Routes pour les professeurs
// ==================================================================================================

// Tous les Professeurs
Route::get('/professeurs', [ProfesseurController::class, 'index'])->name('professeurs')->middleware('auth');

// Ajouter Un Professeur
// View
Route::get('/professeurs/ajouter', [ProfesseurController::class, 'ajouter'])->name('ajouter-professeur')->middleware('auth');
// Action
Route::post('/professeurs', [ProfesseurController::class, 'create'])->middleware('auth');

// Modifier Un Professeur
// View
Route::get('/professeurs/modifier/{employe}', [ProfesseurController::class, 'modifier'])->name('modifier-professeur')->middleware('auth');
// Action
Route::put('/professeurs/{employe}', [ProfesseurController::class, 'update'])->middleware('auth');

// Supprimer Un Professeur
Route::delete('/professeurs/{employe}', [ProfesseurController::class, 'delete'])->middleware('auth');


// ==================================================================================================
// Routes pour les etudiants
// ==================================================================================================

// Tous les Etudiants
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants')->middleware('auth');

// Ajouter Un Etudiant
// View
Route::get('/etudiants/ajouter', [EtudiantController::class, 'ajouter'])->name('ajouter-etudiant')->middleware('auth');
// Action
Route::post('/etudiants', [EtudiantController::class, 'create'])->middleware('auth');

// Modifier Un Etudiant
// View
Route::get('/etudiants/modifier/{etudiant}', [EtudiantController::class, 'modifier'])->name('modifier-etudiant')->middleware('auth');
// Action
Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->middleware('auth');

// Supprimer Un Etudiant
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'delete'])->middleware('auth');



// ==================================================================================================
// Routes pour les cycles:
// ==================================================================================================

// Tous Les Cycle
Route::get('/cycles', [CycleController::class, 'index'])->name('cycles')->middleware('auth');

// Ajouter Une Cycle
Route::post('/cycles', [CycleController::class, 'create'])->middleware('auth');

// Modifier Une Cycle
Route::put('/cycles/{cycle}', [CycleController::class, 'update'])->middleware('auth');

// Modifier Une Cycle
Route::delete('/cycles/{cycle}', [CycleController::class, 'delete'])->middleware('auth');


// ==================================================================================================
// Routes pour les filieres:
// ==================================================================================================

// Tous Les Filiere
Route::get('/filieres', [FiliereController::class, 'index'])->name('filieres')->middleware('auth');

// Ajouter Une Filiere
Route::post('/filieres', [FiliereController::class, 'create'])->middleware('auth');

// Modifier Une Filiere
Route::put('/filieres/{filiere}', [FiliereController::class, 'update'])->middleware('auth');

// Modifier Une Filiere
Route::delete('/filieres/{filiere}', [FiliereController::class, 'delete'])->middleware('auth');


// ==================================================================================================
// Routes pour les niveaux:
// ==================================================================================================

// Tous Les Niveau
Route::get('/niveaux', [NiveauController::class, 'index'])->name('niveaux')->middleware('auth');

// Ajouter Une Niveau
Route::post('/niveaux', [NiveauController::class, 'create'])->middleware('auth');

// Modifier Une Niveau
Route::put('/niveaux/{niveau}', [NiveauController::class, 'update'])->middleware('auth');

// Modifier Une Niveau
Route::delete('/niveaux/{niveau}', [NiveauController::class, 'delete'])->middleware('auth');


// ==================================================================================================
// Routes pour les parents:
// ==================================================================================================

// Tous Les ParentInfo
Route::get('/parents', [ParentInfoController::class, 'index'])->name('parents')->middleware('auth');

// Ajouter Une ParentInfo
Route::post('/parents', [ParentInfoController::class, 'create'])->middleware('auth');

// Modifier Une ParentInfo
Route::put('/parents/{parentinfo}', [ParentInfoController::class, 'update'])->middleware('auth');

// Modifier Une ParentInfo
Route::delete('/parents/{parentinfo}', [ParentInfoController::class, 'delete'])->middleware('auth');
