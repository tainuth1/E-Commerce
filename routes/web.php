<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\UserListController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
Route::get('/profile', [UserController::class, 'profile'])->middleware('admin')->name('profile');

Route::get('/register', [UserController::class, 'registerForm'])->name('register');
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function(){
    Route::resource('product', ProductController::class);
});

Route::middleware('admin')->group(function(){
    Route::resource('user', UserListController::class);
});


// Test route
Route::get('/test', function () {
    return view('welcome');
})->name('test');