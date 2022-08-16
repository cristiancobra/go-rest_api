<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIfUserCreated;

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

Route::middleware([CheckIfUserCreated::class])->group(function () {

	Route::get('/', [App\Http\Controllers\UserController::class, 'index'])
			->name('index');

	Route::resource('post', App\Http\Controllers\PostController::class)
			->names('post');

	Route::resource('comment', App\Http\Controllers\CommentController::class)
			->names('comment');
});

Route::resource('user', App\Http\Controllers\UserController::class)
		->names('user');

Route::get('logout', [App\Http\Controllers\UserController::class, 'logoutUser'])
		->name('logout');

// routes for test
Route::get('set-session', function () {
	session(['user.id' => 999]);
});
