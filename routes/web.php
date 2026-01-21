<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentHistoryController;
use App\Http\Controllers\SupabaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/handbook', function () {
        return view('handbook');
    })->name('handbook');

    Route::get('/incidents/report', [IncidentController::class, 'create'])->name('incidents.create');
    Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
    
    // Admin only routes
    Route::middleware('admin')->group(function () {
        Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
        Route::get('/incidents/{incident}', [IncidentController::class, 'show'])->name('incidents.show');
        Route::patch('/incidents/{incident}', [IncidentController::class, 'update'])->name('incidents.update');
        
        // Student History routes
        Route::resource('student-history', StudentHistoryController::class);
    });
});

// Supabase testing routes
Route::get('/supabase/test', [SupabaseController::class, 'testConnection'])->name('supabase.test');
Route::get('/supabase/laravel', [SupabaseController::class, 'usingLaravelDB'])->name('supabase.laravel');
Route::get('/supabase/api', [SupabaseController::class, 'usingSupabaseClient'])->name('supabase.api');
Route::post('/supabase/insert', [SupabaseController::class, 'insertExample'])->name('supabase.insert');
Route::post('/supabase/auth', [SupabaseController::class, 'authExample'])->name('supabase.auth');

require __DIR__.'/auth.php';
