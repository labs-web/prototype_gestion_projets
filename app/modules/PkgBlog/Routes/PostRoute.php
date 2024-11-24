<?php
// Ce fichier est maintenu par ESSARRAJ Fouad



use Illuminate\Support\Facades\Route;
use Modules\PkgBlog\Controllers\PostController;

// routes for post management
Route::middleware('auth')->group(function () {
    Route::prefix('/')->group(function () {
        Route::resource('posts', PostController::class);
        Route::get('posts/export', [PostController::class, 'export'])->name('posts.export');
        Route::post('posts/import', [PostController::class, 'import'])->name('posts.import');
    });
});

Route::prefix('/')->middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);

    // Routes supplémentaires avec préfixe
    Route::prefix('posts/data')->group(function () {
        Route::get('export', [PostController::class, 'export'])->name('posts.export');
        Route::post('import', [PostController::class, 'import'])->name('posts.import');
    });
});