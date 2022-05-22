<?php

use App\Http\Controllers\FonctionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

// Tous les fonction
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Authentifier User
Route::post('/auth', [UserController::class, 'authenticate'])->middleware('guest');

// Authentifier User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Tous les fonction
Route::get('/fonctions', [FonctionController::class, 'index'])->name('fonctions')->middleware('auth');

// Ajouter Une Fonction
Route::post('/fonctions', [FonctionController::class, 'create'])->middleware('auth');

// Modifier Une Fonction
Route::put('/fonctions/{fonction}', [FonctionController::class, 'update'])->middleware('auth');

// Modifier Une Fonction
Route::delete('/fonctions/{fonction}', [FonctionController::class, 'delete'])->middleware('auth');