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
Use App\Http\Controllers\CustomAuthController;

Route::get('/',[EtudiantController::class,"index"])->name('etudiant.index');
Route::get('/home',[EtudiantController::class,"index"])->name('etudiant.index');



Route::get('show/{etudiant}',[EtudiantController::class,"show"])->name('etudiant.show');
Route::get('edit/{etudiant}',[EtudiantController::class,"edit"])->name('etudiant.edit');
Route::post('edit/{etudiant}',[EtudiantController::class,"update"]);
Route::delete('edit/{etudiant}',[EtudiantController::class,"destroy"])->name('etudiant.destroy');




Route::get('create',[CustomAuthController::class,"create"])->name('etudiant.create');
Route::post('create',[CustomAuthController::class,"store"])->name('etudiant.store');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('user.auth');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');





use App\Http\Controllers\LocalizationController;
Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');




use App\Http\Controllers\BlogPostController ;

Route::get('blog', [BlogPostController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('blog-create', [BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog-create', [BlogPostController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('blog-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog-edit/{blogPost}', [BlogPostController::class, 'update'])->middleware('auth');
Route::delete('blog-edit/{blogPost}', [BlogPostController::class, 'destroy'])->middleware('auth');



use App\Http\Controllers\FileController ;

Route::get('file', [FileController::class, 'index'])->name('file.index')->middleware('auth');
Route::get('file/{file}', [FileController::class, 'show'])->name('file.show')->middleware('auth');
Route::get('file-create', [FileController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('file-create', [FileController::class, 'store'])->name('file.store')->middleware('auth');
Route::get('file-edit/{file}', [FileController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::delete('file-edit/{file}', [FileController::class, 'destroy'])->middleware('auth');
Route::put('file-edit/{file}', [FileController::class, 'update'])->middleware('auth');
Route::delete('file/{file}', [FileController::class, 'destroy'])->middleware('auth');
Route::get('file-download/{file}', [FileController::class, 'download'])->name('file.download')->middleware('auth');








//SErt a la Pagination (peut-etre)
Route::get('page', [BlogPostController::class, 'page']);