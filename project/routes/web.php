<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CoreController::class, 'index'])->name('home');

// Accounts Routes
Route::get('/accounts/login', [AccountController::class, 'login'])->name('login')->middleware('guest');
Route::get('/accounts/signup', [AccountController::class, 'signup'])->name('signup')->middleware('guest');
Route::get('/accounts/dashboard', [AccountController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/accounts/auth/logout', [AccountController::class, 'logout'])->name('logout');

Route::post('/accounts/register', [AccountController::class, 'register'])->name('register');
Route::post('/accounts/auth/authenticate', [AccountController::class, 'authenticate'])->name('authenticate');