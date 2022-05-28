<?php

use App\Http\Controllers\FonctionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\UserController;

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

Route::get('/hello', function () {
    return response("Hello World!");
});

Route::get('/', function () {
    return view('index', ['title' => "Sup Management System"]);
})->name('home')->middleware('auth');

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

// Tous les Employe
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
