<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApprovalController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// ===================== Public (Guest only) =====================
Route::middleware(['guest', 'nocache'])->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('home');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/forgot-password', [PasswordController::class, 'showForgot'])->name('password.forgot');
});

// Logout untuk user yang sedang login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman pending approval
Route::view('/pending-approval', 'auth.pending')->name('pending');

// ===================== User Area (harus login & approved) =====================
Route::middleware(['auth', 'approved', 'nocache'])->group(function () {
    // Dashboard:
    // - Admin     => DashboardController@index (kartu pending/active)
    // - Non-admin => view dummy "rakyat jelata"
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user && $user->is_admin) {
            return app(DashboardController::class)->index();
        }
        return view('dashboard.user'); // resources/views/dashboard/user.blade.php
    })->name('dashboard');

    // Profile (user): ganti nama + ganti password
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/name', [ProfileController::class, 'updateName'])->name('profile.update_name');

    // Ganti password (user) – sudah ada controllernya
    Route::get('/account/password', [PasswordController::class, 'showChange'])->name('password.change');
    Route::post('/account/password', [PasswordController::class, 'update'])->name('password.update');

    // Dummy pages untuk menu (supaya link tidak 404). Nantinya ganti dengan controller Anda.
    Route::view('/customers', 'dashboard.stub')->name('customers.index');
    Route::view('/projects', 'dashboard.stub')->name('projects.index');
    Route::view('/orders', 'dashboard.stub')->name('orders.index');
    Route::view('/inventory', 'dashboard.stub')->name('inventory.index');
    Route::view('/accounts', 'dashboard.stub')->name('accounts.index');
    Route::view('/tasks', 'dashboard.stub')->name('tasks.index');
});

// ===================== Admin Area =====================
Route::middleware(['auth', 'admin', 'nocache'])->group(function () {
    Route::get('/admin/users', [UserApprovalController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/approve', [UserApprovalController::class, 'approve'])->name('admin.users.approve');

    // Reject (hapus user pending) & Delete (hapus user active)
    Route::post('/admin/users/{user}/reject', [UserApprovalController::class, 'reject'])->name('admin.users.reject');
    Route::delete('/admin/users/{user}', [UserApprovalController::class, 'destroy'])->name('admin.users.destroy');

    // Reset password user oleh admin
    Route::post('/admin/users/{user}/reset-password', [PasswordController::class, 'adminReset'])
        ->name('admin.users.reset_password');
});

// JSON Editor (bisa diakses semua user yang sudah approved)
Route::view('/json-editor/smartcardv2', 'json.smartcardv2')
    ->name('json.smartcardv2');
