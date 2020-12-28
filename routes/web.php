<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

# Main page
route::get('/', App\Http\Controllers\MainController::class)->name('main');

# Posts
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'store']);

# Profile
Route::get('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profiles.show');
Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfilesController::class, 'edit']);
Route::patch('/profiles/{user:username}', [App\Http\Controllers\ProfilesController::class, 'update']);

# Follow store
Route::post('/profiles/{user:username}/follow', App\Http\Controllers\FollowsController::class);

# Explore
route::get('/explore', App\Http\Controllers\ExploreController::class)->name('explore');
