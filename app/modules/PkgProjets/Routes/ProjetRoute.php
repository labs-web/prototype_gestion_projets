<?php

use Illuminate\Support\Facades\Route;
use Modules\PkgProjets\Controllers\ProjetController;

// routes for project management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('projets', ProjetController::class);
        Route::get('projets/export', [ProjetController::class, 'export'])->name('projets.export');
        Route::post('projets/import', [ProjetController::class, 'import'])->name('projets.import');
    });
});



// Route::prefix('projets')->group(function () {

//     // Route::get('/', function(){

//     //     return "Bonjour11";
//     // })->name('projets.index');


//     Route::get('/', [ProjetController::class, 'index'])->name('projets.index');
//     Route::get('/create', [ProjetController::class, 'create'])->name('projets.create');
//     Route::post('/', [ProjetController::class, 'store'])->name('projets.store');
//     Route::get('/{id}/edit', [ProjetController::class, 'edit'])->name('projets.edit');
//     Route::put('/{id}', [ProjetController::class, 'update'])->name('projets.update');
//     Route::delete('/{id}', [ProjetController::class, 'destroy'])->name('projets.destroy');
//     Route::get('/search', [ProjetController::class, 'search'])->name('projets.search');
//     Route::get('/filter-by-category', [ProjetController::class, 'filterByCategory'])->name('projets.filterByCategory');
// });
