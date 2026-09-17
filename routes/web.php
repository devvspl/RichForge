<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\Public\LandingController;
use App\Http\Controllers\Public\DocsController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Admin\AdminController;

// Public pages
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/editor-demo', [LandingController::class, 'demo'])->name('public.demo');
Route::get('/pricing', [LandingController::class, 'pricing'])->name('public.pricing');
Route::get('/faq', [LandingController::class, 'faq'])->name('public.faq');
Route::get('/contact', [LandingController::class, 'contact'])->name('public.contact');
Route::get('/playground', [PlaygroundController::class, 'index'])->name('playground');

// Docs & Blog
Route::get('/docs', [DocsController::class, 'index'])->name('docs.index');
Route::get('/docs/{slug}', [DocsController::class, 'show'])->name('docs.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/onboarding', [DashboardController::class, 'onboarding'])->name('onboarding');

    // Projects
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/projects/{id}/config', [ProjectController::class, 'updateConfig'])->name('projects.updateConfig');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // API Keys
    Route::post('/projects/{id}/keys', [ApiKeyController::class, 'store'])->name('keys.store');
    Route::delete('/projects/{id}/keys/{keyId}', [ApiKeyController::class, 'destroy'])->name('keys.destroy');

    // Whitelisted Domains
    Route::post('/projects/{id}/domains', [DomainController::class, 'store'])->name('domains.store');
    Route::post('/projects/{id}/domains/{domainId}/toggle', [DomainController::class, 'toggle'])->name('domains.toggle');
    Route::delete('/projects/{id}/domains/{domainId}', [DomainController::class, 'destroy'])->name('domains.destroy');

    // Media Uploads Manager
    Route::get('/uploads', [MediaController::class, 'index'])->name('uploads.index');
    Route::delete('/uploads/{id}', [MediaController::class, 'destroy'])->name('uploads.destroy');
});

// Admin Panel (Protected + Admin check)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::post('/projects/{id}/status', [AdminController::class, 'toggleProjectStatus'])->name('projects.status');
});
