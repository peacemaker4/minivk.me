<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::resource('posts', PostController::class)
    ->middleware('auth');

Route::put('posts/{post}/removeImage', [PostController::class, 'removeImage'])
    ->name('posts.removeImage');



Route::get('profile/{user}', ProfileController::class)
    ->middleware('auth')
    ->name('profile');

//
//Route::get('user/{user}/friends', [UserController::class, 'friends'])
//    ->name('friends');

Route::post('profile/{user}/friend_request/{friend}', [UserController::class, 'friend_request'])
    ->middleware('auth')
    ->name('friend_request');

Route::get('search', SearchController::class)
    ->middleware('auth')
    ->name('search');
Route::get('settings', [SettingsController::class, 'index'])
    ->middleware('auth')
    ->name('settings');
Route::put('settings/password', [SettingsController::class, 'password'])
    ->middleware('auth')
    ->name('settings.password');
