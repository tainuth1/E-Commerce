<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');

Route::get('/register', [UserController::class, 'registerForm'])->name('register');
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [UserController::class, 'register'])->name('auth.register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// Test route
Route::get('/test', function () {
    return view('welcome');
})->name('test');