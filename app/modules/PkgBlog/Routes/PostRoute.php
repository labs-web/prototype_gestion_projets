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
