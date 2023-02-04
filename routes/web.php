<?php

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
Use App\Http\Controllers\EtudiantController;

Route::get('/',[EtudiantController::class,"index"])->name('etudiant.index');
Route::get('/home',[EtudiantController::class,"index"])->name('etudiant.index');

Route::get('create',[EtudiantController::class,"create"])->name('etudiant.create');
Route::post('create',[EtudiantController::class,"store"])->name('etudiant.store');

Route::get('show/{etudiant}',[EtudiantController::class,"show"])->name('etudiant.show');

Route::get('edit/{etudiant}',[EtudiantController::class,"edit"])->name('etudiant.edit');
Route::post('edit/{etudiant}',[EtudiantController::class,"update"]);
Route::delete('edit/{etudiant}',[EtudiantController::class,"destroy"])->name('etudiant.destroy');

