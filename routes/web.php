<?php

use Illuminate\Support\Facades\Route;
 // <= Ajoute ceci

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\Admin\AdminDashboardController;
// Groupe de routes admin avec contrôleur
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

use App\Http\Controllers\Admin\CourseController;
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
   Route::get('/courses/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('admin.courses.create');
});
Route::post('/admin/courses', [CourseController::class, 'store'])->name('courses.store');

use App\Http\Controllers\Admin\LevelController;
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/levels', [LevelController::class, 'index'])->name('admin.levels.index');
    Route::post('/levels', [LevelController::class, 'store'])->name('admin.levels.store');
    Route::delete('/levels/{level}', [LevelController::class, 'destroy'])->name('admin.levels.destroy');
});
use App\Http\Controllers\Admin\SubjectController;
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/subjects', [SubjectController::class, 'index'])->name('admin.subjects.index');
    Route::post('/subjects', [SubjectController::class, 'store'])->name('admin.subjects.store');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('admin.subjects.destroy');

});
