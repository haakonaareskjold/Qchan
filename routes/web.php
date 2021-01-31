<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ReplyController;

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
route::get('/', MainController::class)->name('main');

# Posts
Route::resource('posts', PostController::class);

# Replies
Route::get('/posts/{post}/replies', [ReplyController::class, 'create'])->name('replies.create');
Route::post('/posts/{post}/replies', [ReplyController::class, 'store'])->name('replies.store');

# PostLikes
Route::post('/posts/{post}/like', [PostLikesController::class, 'storeLike']);
Route::post('/posts/{post}/dislike', [PostLikesController::class, 'storeDislike']);
Route::delete('/posts/{post}/like', [PostLikesController::class, 'destroy']);
Route::delete('/posts/{post}/dislike',[PostLikesController::class, 'destroy']);


# Profile
Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])->name('profiles.show');
Route::get('/profiles/{user:username}/edit', [ProfilesController::class, 'edit']);
Route::patch('/profiles/{user:username}', [ProfilesController::class, 'update']);
Route::get('/profiles/{user:username}/destroy', [ProfilesController::class, 'showDestroy'])->name('profiles.showdestroy');
Route::delete('/profiles/{user:username}/destroy', [ProfilesController::class, 'destroy'])->name('profiles.destroy');


# Follow store
Route::post('/profiles/{user:username}/follow', FollowsController::class);

# Explore
route::get('/explore', ExploreController::class)->name('explore');

# Notifications
route::get('/notifications', NotificationsController::class)->name('notifications');
