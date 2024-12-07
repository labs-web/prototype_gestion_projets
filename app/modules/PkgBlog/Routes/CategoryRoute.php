<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



use Illuminate\Support\Facades\Route;
use Modules\PkgBlog\Controllers\CategoryController;

// routes for category management
Route::middleware('auth')->group(function () {
    Route::prefix('/PkgBlog')->group(function () {
        Route::resource('categories', CategoryController::class);
        // Routes supplémentaires avec préfixe
        Route::prefix('posts/data')->group(function () {
            Route::get('categories/export', [CategoryController::class, 'export'])->name('categories.export');
            Route::post('categories/import', [CategoryController::class, 'import'])->name('categories.import');
        });
    });
});
