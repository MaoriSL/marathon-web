<?php

use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HistoireController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("index");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

Route::get('/equipe', [EquipeController::class, 'index'])->name("equipe");

//Route::get('/', [GenreController::class, 'index'])->name("index");
Route::resource('histoires', HistoireController::class);
Route::post('/histoires/{id}/remove', [HistoireController::class,'removeFavoris'])->name('favoris.remove');
Route::post('/histoires/{id}/add', [HistoireController::class,'addFavoris'])->name('favoris.add');

Route::get('/genres/{id}', [HistoireController::class, 'indexGenre'])->name("histoires.indexGenre");

Route::get('/', [HistoireController::class, 'randomStories'])->name('index');

Route::resource('chapitres', ChapitreController::class);

Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

Route::post('/histoires/{id}/add', [HistoireController::class,'addFavoris'])->name('favoris.add');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');


Route::post('/histoires/updateImage', [HistoireController::class, 'updateImage'])->name('histoire.updateImage');
