<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


use App\Http\Controllers\HomeController;

// Route for the landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

# Authentication Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

# Protected Routes (only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
        Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('/gallery/{gallery}', [GalleryController::class, 'delete'])->name('gallery.delete');
    });
    
    Route::get('/gallery/{gallery}/upload', [PhotoController::class, 'create']);
    Route::post('/gallery/{gallery}/images', [PhotoController::class, 'store']);
    Route::get('/gallery/{gallery}/photos/{photo}/edit', [PhotoController::class, 'edit']);
    Route::get('/gallery/{gallery}', [PhotoController::class, 'show']);
    
    # Resource Routes for Galleries and Photos
    Route::resource('galleries', GalleryController::class);
    Route::resource('photos', PhotoController::class);
    
    # Custom Routes for adding and deleting photos
    Route::get('galleries/{gallery}/photos', [GalleryController::class, 'addPhotos'])->name('galleries.add-photos');
    Route::post('galleries/{gallery}/photos', [GalleryController::class, 'storePhotos'])->name('galleries.store-photos');
    Route::delete('photos/{photo}', [GalleryController::class, 'deletePhoto'])->name('photos.delete');
});
