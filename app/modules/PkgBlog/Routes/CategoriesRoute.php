<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



use Illuminate\Support\Facades\Route;
use Modules\PkgBlog\Controllers\CategoriesController;

// routes for categories management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('categories', CategoriesController::class);
        // Routes supplémentaires avec préfixe
        Route::prefix('posts/data')->group(function () {
            Route::get('categories/export', [CategoriesController::class, 'export'])->name('categories.export');
            Route::post('categories/import', [CategoriesController::class, 'import'])->name('categories.import');
        });
    });
});
