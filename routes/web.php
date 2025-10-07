<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;


Route::get('/', [HomeController::class, 'images']); 

// Actual birthday home page
Route::get('/home', [HomeController::class, 'index']);

Route::prefix('extra')->group(function () {

    Route::get('photos', function () {
        return view('extra.photos');
    })->name('extra.photos');

   Route::get('videos', [HomeController::class, 'videos'])->name('extra.videos');

    Route::get('messages', function () {
        return view('extra.messages');
    })->name('extra.messages');

    Route::get('question', function () {
        return view('extra.question');
    })->name('extra.question');

});




