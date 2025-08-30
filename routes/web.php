<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApprovalController;
use App\Http\Controllers\PasswordController; // ⬅️ tambah ini

// ===== Public / Auth =====
Route::get('/', [AuthController::class, 'showLogin'])->name('home');

Route::get('/login',  [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register',  [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Halaman pending approval
Route::view('/pending-approval', 'auth.pending')->name('pending');

// ===== Forgot password (tanpa email) -> Hubungi Admin =====
Route::get('/forgot-password', [PasswordController::class, 'showForgot'])
    ->name('password.forgot');

// ===== Area user (harus login & approved) =====
Route::middleware(['auth', 'approved'])->group(function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard'); // was: 'dashboard'

    // Ganti password (user)
    Route::get('/account/password',  [PasswordController::class, 'showChange'])->name('password.change');
    Route::post('/account/password', [PasswordController::class, 'update'])->name('password.update');
});

// ===== Area admin =====
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserApprovalController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/approve', [UserApprovalController::class, 'approve'])->name('admin.users.approve');

    // Reset password user oleh admin
    Route::post('/admin/users/{user}/reset-password', [PasswordController::class, 'adminReset'])
        ->name('admin.users.reset_password');
});

Route::middleware(['auth', 'approved'])->group(function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    // dummy pages untuk menu
    Route::view('/customers', 'dashboard.stub')->name('customers.index');
    Route::view('/projects', 'dashboard.stub')->name('projects.index');
    Route::view('/orders', 'dashboard.stub')->name('orders.index');
    Route::view('/inventory', 'dashboard.stub')->name('inventory.index');
    Route::view('/accounts', 'dashboard.stub')->name('accounts.index');
    Route::view('/tasks', 'dashboard.stub')->name('tasks.index');

    Route::view('/profile', 'dashboard.stub')->name('profile'); // sementara
});
