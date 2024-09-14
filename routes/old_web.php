<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/',[GalleryController::class,'show']);

#LogIn and Register Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Resource Routes for Galleries and Photos
Route::resource('galleries', GalleryController::class);//->middleware('auth');
Route::resource('photos', PhotoController::class);//->middleware('auth');

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


