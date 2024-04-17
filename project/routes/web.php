<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CoreController::class, 'index'])->name('home');

// Accounts Routes
Route::get('/accounts/login', [AccountController::class, 'login'])->name('login');
Route::get('/accounts/signup', [AccountController::class, 'signup'])->name('signup');
Route::get('/accounts/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');

Route::post('accounts/register', [AccountController::class, 'register'])->name('register');