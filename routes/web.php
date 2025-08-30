<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApprovalController;
use App\Http\Controllers\PasswordController;

// ===================== Public (Guest only) =====================
Route::middleware(['guest', 'nocache'])->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('home');

    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register',  [AuthController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/forgot-password', [PasswordController::class, 'showForgot'])->name('password.forgot');
});


// Logout untuk user yang sedang login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman pending approval
Route::view('/pending-approval', 'auth.pending')->name('pending');

// ===================== User Area (harus login & approved) =====================
Route::middleware(['auth', 'approved', 'nocache'])->group(function () {
    // Dashboard
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');

    // Ganti password (user)
    Route::get('/account/password',  [PasswordController::class, 'showChange'])->name('password.change');
    Route::post('/account/password', [PasswordController::class, 'update'])->name('password.update');

    // Dummy pages untuk menu (supaya link tidak 404). Nantinya ganti dengan controller Anda.
    Route::view('/customers', 'dashboard.stub')->name('customers.index');
    Route::view('/projects', 'dashboard.stub')->name('projects.index');
    Route::view('/orders', 'dashboard.stub')->name('orders.index');
    Route::view('/inventory', 'dashboard.stub')->name('inventory.index');
    Route::view('/accounts', 'dashboard.stub')->name('accounts.index');
    Route::view('/tasks', 'dashboard.stub')->name('tasks.index');

    // Profile sementara
    Route::view('/profile', 'dashboard.stub')->name('profile');
});

// ===================== Admin Area =====================
Route::middleware(['auth', 'admin', 'nocache'])->group(function () {
    Route::get('/admin/users', [UserApprovalController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/approve', [UserApprovalController::class, 'approve'])->name('admin.users.approve');

    // Reset password user oleh admin
    Route::post('/admin/users/{user}/reset-password', [PasswordController::class, 'adminReset'])
        ->name('admin.users.reset_password');
});
