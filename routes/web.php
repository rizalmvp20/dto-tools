<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApprovalController;

// Halaman utama -> login
Route::get('/', [AuthController::class, 'showLogin'])->name('home');

// ==== Auth ====
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login',   [AuthController::class, 'login'])->name('login');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register',[AuthController::class, 'register'])->name('register');

Route::view('/pending-approval', 'auth.pending')->name('pending');

// ==== User area (hanya yg SUDAH di-approve) ====
Route::middleware(['auth','approved'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

// ==== Admin area ====
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/users', [UserApprovalController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/approve', [UserApprovalController::class, 'approve'])->name('admin.users.approve');
});
