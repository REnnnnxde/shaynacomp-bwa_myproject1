<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\TestimonialController;
use App\Models\OurPrinciple;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (home page)
Route::get('/', [FrontController::class, 'index'])->name('front.index'); // Mengembalikan view 'welcome' saat user mengakses halaman utama


// Route untuk dashboard, dilindungi oleh autentikasi dan verifikasi email
Route::get('/dashboard', function () {
    return view('dashboard'); // Mengembalikan view 'dashboard' saat user yang terautentikasi mengakses dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouping routes yang memerlukan autentikasi
Route::middleware('auth')->group(function () {

    // Routes untuk mengelola profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Route untuk mengedit profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Route untuk mengupdate profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Route untuk menghapus profil

    // Grouping routes untuk admin dengan prefix 'admin' dan name prefix 'admin.'
    Route::prefix('admin')->name('admin.')->group(function () {

        // Route untuk mengelola statistik perusahaan, hanya dapat diakses oleh pengguna dengan izin 'manage statistics'
        Route::middleware('can:manage statistics')->group(function () {
            Route::get('statistics', [CompanyStatisticController::class, 'index'])->name('statistics.index');
        });

        Route::middleware('can:manage hero sections')->group(function () {
            Route::get('sections', [HeroSectionController::class, 'index'])->name('hero_sections.index');
        });

        // Route untuk mengelola produk, hanya dapat diakses oleh pengguna dengan izin 'manage products'
        Route::middleware('can:manage products')->group(function () {
            Route::get('products', [ProductController::class, 'index'])->name('products.index');
        });

        // Route untuk mengelola prinsip perusahaan, hanya dapat diakses oleh pengguna dengan izin 'manage principles'
        Route::middleware('can:manage principles')->group(function () {
            Route::get('principles', [OurPrinciple::class, 'index'])->name('principles.index');
        });

        // Route untuk mengelola testimoni, hanya dapat diakses oleh pengguna dengan izin 'manage testimonials'
        Route::middleware('can:manage testimonials')->group(function () {
            Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        });

        // Route untuk mengelola klien proyek, hanya dapat diakses oleh pengguna dengan izin 'manage clients'
        Route::middleware('can:manage clients')->group(function () {
            Route::get('clients', [ProjectClientController::class, 'index'])->name('clients.index');
        });

        // Route untuk mengelola tim, hanya dapat diakses oleh pengguna dengan izin 'manage teams'
        Route::middleware('can:manage teams')->group(function () {
            Route::get('teams', [OurTeamController::class, 'index'])->name('teams.index');
        });

        // Route untuk mengelola informasi 'About Us', hanya dapat diakses oleh pengguna dengan izin 'manage about'
        Route::middleware('can:manage about')->group(function () {
            Route::get('abouts', [CompanyAboutController::class, 'index'])->name('abouts.index');
        });

        // Route untuk mengelola janji temu, hanya dapat diakses oleh pengguna dengan izin 'manage appointments'
        Route::middleware('can:manage appointments')->group(function () {
            Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
        });

    });
});

// Menyertakan route untuk autentikasi yang didefinisikan dalam auth.php
require __DIR__.'/auth.php';
