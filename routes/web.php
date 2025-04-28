<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentProofController as PublicPaymentProofController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;

require __DIR__.'/auth.php';

use App\Http\Controllers\PaymentProofController;

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [PublicPaymentProofController::class, 'showForm'])->name('home');

// Blog Routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/payment-proof', [PublicPaymentProofController::class, 'showForm'])->name('payment-proof.form');
Route::post('/payment-proof', [PublicPaymentProofController::class, 'fetchProof'])->name('payment-proof.fetch');
Route::get('/payment-proof/{id}/detail', [PublicPaymentProofController::class, 'showDetail'])->name('payment-proof.detail');

// Admin routes with role middleware
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // User management routes
    Route::resource('users', \App\Http\Controllers\UserController::class)->names('admin.users');

    // Payment proof management routes
    Route::resource('payment-proofs', \App\Http\Controllers\AdminPaymentProofController::class)->names('admin.payment-proofs');

    // Blog management routes
    Route::resource('blogs', \App\Http\Controllers\AdminBlogController::class)->names('admin.blogs');
});
