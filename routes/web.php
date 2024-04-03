<?php

use App\Http\Controllers\CompetenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissionController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/missions', [MissionController::class, 'index'])->name('missions.index');
Route::get('/missions/create', [MissionController::class, 'create'])->name('missions.create');
Route::post('/missions', [MissionController::class, 'store'])->name('missions.store');

Route::get('/competences', [CompetenceController::class, 'index'])->name('competences.index');
Route::post('/competences', [CompetenceController::class, 'store'])->name('competences.store');
Route::get('/competences/{competence}/edit', [CompetenceController::class, 'edit'])->name('competences.edit');
Route::put('/competences/{competence}', [CompetenceController::class, 'update'])->name('competences.update');
Route::delete('/competences/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');
