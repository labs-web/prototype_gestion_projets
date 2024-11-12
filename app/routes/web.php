<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Modules\PkgProjets\Controllers\Projet2Controller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// routes for project management
// Route::middleware('auth')->group(function () {
//     Route::prefix('/')->group(function () {
//         Route::resource('projets', ProjetController::class);
//         Route::get('projets/export', [ProjetController::class, 'export'])->name('projets.export');
//         Route::post('projets/import', [ProjetController::class, 'import'])->name('projets.import');
//     });
// });

// Route::prefix('projets')->group(function () {
//     Route::get('/', [Projet2Controller::class, 'index'])->name('projets.index');
// });