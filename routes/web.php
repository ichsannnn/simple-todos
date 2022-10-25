<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'post_login'])->name('post_login')->middleware('throttle:login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'post_register'])->name('post_register');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', App\Http\Livewire\Todos\Index::class)->name('home');
    Route::get('create', App\Http\Livewire\Todos\Create::class)->name('create');
    Route::get('edit/{id}', App\Http\Livewire\Todos\Edit::class)->name('edit');

    Route::get('friends', FriendController::class)->name('friends');
});
