<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ShareController;
use Illuminate\Support\Facades\Auth;

Auth::routes();



Route::get('/', function () {
    return view('welcome');
});

// Resource Routes for Galleries and Photos
Route::resource('galleries', GalleryController::class)->middleware('auth');
Route::resource('photos', PhotoController::class)->middleware('auth');

// Add custom routes for adding and deleting photos
Route::get('galleries/{gallery}/photos', [GalleryController::class, 'addPhotos'])->name('galleries.add-photos');
Route::post('galleries/{gallery}/photos', [GalleryController::class, 'storePhotos'])->name('galleries.store-photos');
Route::delete('photos/{photo}', [GalleryController::class, 'deletePhoto'])->name('photos.delete');

// Routes for Likes
Route::post('/photos/{photo}/like', [LikeController::class, 'store'])
    ->name('likes.store'); // Like a photo
Route::delete('/photos/{photo}/like', [LikeController::class, 'destroy'])
    ->name('likes.destroy'); // Unlike a photo

// Routes for Shares
Route::post('/galleries/{gallery}/share', [ShareController::class, 'shareGallery'])
    ->name('shares.shareGallery'); // Share a gallery
Route::post('/photos/{photo}/share', [ShareController::class, 'sharePhoto'])
    ->name('shares.sharePhoto'); // Share a photo


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
