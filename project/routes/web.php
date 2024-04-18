<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CoreController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CoreController::class, 'index'])->name('home');

// Accounts Routes
Route::get('/accounts/login', [AccountController::class, 'login'])->name('login')->middleware('guest');
Route::get('/accounts/signup', [AccountController::class, 'signup'])->name('signup')->middleware('guest');
Route::get('/accounts/dashboard', [AccountController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/accounts/auth/logout', [AccountController::class, 'logout'])->name('logout');

Route::post('/accounts/register', [AccountController::class, 'register'])->name('register');
Route::post('/accounts/auth/authenticate', [AccountController::class, 'authenticate'])->name('authenticate');

// Password Reset
Route::get('/accounts/forget-password', [PasswordResetController::class, 'forgetPassword'])->name('forget_password');
Route::post('/accounts/forget-password', [PasswordResetController::class, 'forgetPasswordPost'])->name('forget_password_post');
Route::get('/accounts/reset-password/{token}', [PasswordResetController::class, 'resetPassword'])->name('reset_password');
Route::post('/accounts/reset-password', [PasswordResetController::class, 'resetPasswordPost'])->name('reset_password_post');

// Contact Us Routes
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact_us');