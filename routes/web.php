<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAnalyticsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-stats', [DashboardController::class, 'getDashboardStats']);
    Route::get('/location-stats', [DashboardController::class, 'getLocationStatistics']);
    
    // Student routes
    Route::get('/student-list', [StudentController::class, 'index'])->name('student-list');
    Route::get('/add-new', function () {
        return Inertia::render('AddNew');
    })->name('add-new');
    Route::post('/student', [StudentController::class, 'store']);
    Route::get('/student/{student}/edit', [StudentController::class, 'edit']);
    Route::put('/student/{student}', [StudentController::class, 'update']);
    Route::delete('/student/{student}', [StudentController::class, 'destroy']);
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/student-analytics', [StudentAnalyticsController::class, 'index'])->name('student-analytics');
    Route::get('/analytics/demographics', [StudentAnalyticsController::class, 'getDemographics']);
    
    Route::get('/all-users', function () {
        return Inertia::render('AllUser');
    })->name('all-users');

    Route::get('/edit-page', function () {
        return Inertia::render('EditPage');
    })->name('edit-page');
    
    Route::get('/edit-user', function () {
        return inertia('EditUser');
    })->name('edit-user');
});

require __DIR__.'/auth.php';
