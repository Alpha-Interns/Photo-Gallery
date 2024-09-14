<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
use App\Models\Gallery;

Route::get('/',[GalleryController::class,'index']);


Route::get('/gallery/{gallery}/photos/{photo}', [PhotoController::class, 'image']);

Route::get('/gallery/create', [GalleryController::class, 'create']);
Route::post('/gallery',[GalleryController::class,'store']);

Route::get('/gallery/{gallery}/upload', [PhotoController::class, 'create']);
Route::post('/gallery/{gallery}/images', [PhotoController::class, 'store']);

Route::get('/gallery/{gallery}', [PhotoController::class, 'show']);


