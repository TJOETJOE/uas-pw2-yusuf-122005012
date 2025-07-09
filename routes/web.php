<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistItemController;


Route::get('/', function () {
    return view('welcome');
});

//wishlist controller
Route::get('/', [WishlistItemController::class, 'index']);
Route::resource('wishlist', WishlistItemController::class);
