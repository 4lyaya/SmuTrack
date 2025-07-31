<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SettingController;

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Admin-only routes
    Route::middleware(['role:admin,superadmin'])->group(function () {
        Route::resource('students', StudentController::class);
        Route::post('students/import', [StudentController::class, 'import'])->name('students.import');
        Route::resource('teachers', TeacherController::class);
        Route::resource('classrooms', ClassController::class);

        Route::get('attendance/recap', [AttendanceController::class, 'recap'])->name('attendance.recap');
        Route::get('attendance/print', [AttendanceController::class, 'print'])->name('attendance.print');
        Route::resource('attendance', AttendanceController::class)->except(['create', 'store']);
    });

    // Super Admin-only routes
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('settings/users', [SettingController::class, 'users'])->name('settings.users');
        Route::post('settings/users', [SettingController::class, 'storeUser']);
        Route::delete('settings/users/{user}', [SettingController::class, 'destroyUser'])->name('settings.users.destroy');
    });

    // Settings accessible by admin and superadmin
    Route::middleware(['role:admin,superadmin'])->group(function () {
        Route::get('settings/location', [SettingController::class, 'location'])->name('settings.location');
        Route::post('settings/location', [SettingController::class, 'updateLocation']);
    });
});
