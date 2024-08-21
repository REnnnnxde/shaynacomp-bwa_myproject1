<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama (home page)
Route::get('/', [FrontController::class, 'index'])->name('front.index');

// Route untuk dashboard, dilindungi oleh autentikasi dan verifikasi email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grouping routes yang memerlukan autentikasi
Route::middleware('auth')->group(function () {

    // Routes untuk mengelola profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Grouping routes untuk admin dengan prefix 'admin' dan name prefix 'admin.'
    Route::prefix('admin')->name('admin.')->group(function () {

        // Route untuk mengelola statistik perusahaan
        Route::middleware('can:manage statistics')->group(function () {
            Route::get('statistics', [CompanyStatisticController::class, 'index'])->name('statistics.index');
            Route::get('statistics/create', [CompanyStatisticController::class, 'create'])->name('statistics.create');
            Route::post('statistics', [CompanyStatisticController::class, 'store'])->name('statistics.store');
            Route::get('statistics/{id}/edit', [CompanyStatisticController::class, 'edit'])->name('statistics.edit');
            Route::put('statistics/{id}', [CompanyStatisticController::class, 'update'])->name('statistics.update');
            Route::delete('statistics/{id}', [CompanyStatisticController::class, 'destroy'])->name('statistics.destroy');
        });

        // Route untuk mengelola hero sections
        Route::middleware('can:manage hero sections')->group(function () {
            Route::get('sections', [HeroSectionController::class, 'index'])->name('hero_sections.index');
            Route::get('sections/create', [HeroSectionController::class, 'create'])->name('hero_sections.create');
            Route::post('sections', [HeroSectionController::class, 'store'])->name('hero_sections.store');
            Route::get('sections/{id}/edit', [HeroSectionController::class, 'edit'])->name('hero_sections.edit');
            Route::put('sections/{id}', [HeroSectionController::class, 'update'])->name('hero_sections.update');
            Route::delete('sections/{id}', [HeroSectionController::class, 'destroy'])->name('hero_sections.destroy');
        });

        // Route untuk mengelola produk
        Route::middleware('can:manage products')->group(function () {
            Route::get('products', [ProductController::class, 'index'])->name('products.index');
            Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('products', [ProductController::class, 'store'])->name('products.store');
            Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
        });

        // Route untuk mengelola prinsip perusahaan
        Route::middleware('can:manage principles')->group(function () {
            Route::get('principles', [OurPrincipleController::class, 'index'])->name('principles.index');
            Route::get('principles/create', [OurPrincipleController::class, 'create'])->name('principles.create');
            Route::post('principles', [OurPrincipleController::class, 'store'])->name('principles.store');
            Route::get('principles/{id}/edit', [OurPrincipleController::class, 'edit'])->name('principles.edit');
            Route::put('principles/{id}', [OurPrincipleController::class, 'update'])->name('principles.update');
            Route::delete('principles/{id}', [OurPrincipleController::class, 'destroy'])->name('principles.destroy');
        });

        // Route untuk mengelola testimoni
        Route::middleware('can:manage testimonials')->group(function () {
            Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
            Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
            Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
            Route::get('testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
            Route::put('testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
            Route::delete('testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
        });

        // Route untuk mengelola klien proyek
        Route::middleware('can:manage clients')->group(function () {
            Route::get('clients', [ProjectClientController::class, 'index'])->name('clients.index');
            Route::get('clients/create', [ProjectClientController::class, 'create'])->name('clients.create');
            Route::post('clients', [ProjectClientController::class, 'store'])->name('clients.store');
            Route::get('clients/{id}/edit', [ProjectClientController::class, 'edit'])->name('clients.edit');
            Route::put('clients/{id}', [ProjectClientController::class, 'update'])->name('clients.update');
            Route::delete('clients/{id}', [ProjectClientController::class, 'destroy'])->name('clients.destroy');
        });

        // Route untuk mengelola tim
        Route::middleware('can:manage teams')->group(function () {
            Route::get('teams', [OurTeamController::class, 'index'])->name('teams.index');
            Route::get('teams/create', [OurTeamController::class, 'create'])->name('teams.create');
            Route::post('teams', [OurTeamController::class, 'store'])->name('teams.store');
            Route::get('teams/{id}/edit', [OurTeamController::class, 'edit'])->name('teams.edit');
            Route::put('teams/{id}', [OurTeamController::class, 'update'])->name('teams.update');
            Route::delete('teams/{id}', [OurTeamController::class, 'destroy'])->name('teams.destroy');
        });
        

        // Route untuk mengelola informasi 'About Us'
        Route::middleware('can:manage about')->group(function () {
            Route::get('abouts', [CompanyAboutController::class, 'index'])->name('abouts.index');
            Route::get('abouts/create', [CompanyAboutController::class, 'create'])->name('abouts.create');
            Route::post('abouts', [CompanyAboutController::class, 'store'])->name('abouts.store');
            Route::get('abouts/{id}/edit', [CompanyAboutController::class, 'edit'])->name('abouts.edit');
            Route::put('abouts/{id}', [CompanyAboutController::class, 'update'])->name('abouts.update');
            Route::delete('abouts/{id}', [CompanyAboutController::class, 'destroy'])->name('abouts.destroy');
        });

        // Route untuk mengelola janji temu
        Route::middleware('can:manage appointments')->group(function () {
            Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
            Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
            Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
            Route::get('appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
            Route::put('appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
            Route::delete('appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
        });

    });
});

// Menyertakan route untuk autentikasi yang didefinisikan dalam auth.php
require __DIR__.'/auth.php';
