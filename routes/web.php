<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Pagrindinis puslapis
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Kliento
Route::prefix('client')->group(function () {
    Route::get('/conferences', [ClientController::class, 'index'])->name('client.index'); // Konferencijų sąrašas
    Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('client.show'); // Konferencijos peržiūra
    Route::post('/conferences/{id}/register', [ClientController::class, 'register'])->name('client.conferences.register'); // Registracija į konferenciją
});

// Darbuotojo
Route::prefix('employee')->group(function () {
    Route::get('/conferences', [EmployeeController::class, 'index'])->name('employee.conferences.index'); // Visų konferencijų sąrašas
    Route::get('/conferences/{id}', [EmployeeController::class, 'show'])->name('employee.conferences.show'); // Konferencijos peržiūra
    Route::get('/', function() {
        return view('employee.dashboard');
    })->name('employee.dashboard');
});

// Administratoriaus
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Naudotojų valdymas
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Naudotojų sąrašas
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Naudotojo redagavimo puslapis
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // Naudotojo atnaujinimas

    // Konferencijų valdymas
    Route::prefix('conferences')->name('conferences.')->group(function () {
        Route::get('/', [ConferenceController::class, 'index'])->name('index'); // Konferencijų sąrašas
        Route::get('/create', [ConferenceController::class, 'create'])->name('create'); // Naujos konferencijos kūrimas
        Route::post('/', [ConferenceController::class, 'store'])->name('store'); // Išsaugoti naują konferenciją
        Route::get('/{id}/edit', [ConferenceController::class, 'edit'])->name('edit'); // Konferencijos redagavimas
        Route::put('/{id}', [ConferenceController::class, 'update'])->name('update'); // Konferencijos atnaujinimas
        Route::delete('/{id}', [ConferenceController::class, 'destroy'])->name('destroy'); // Konferencijos trynimas
    });
});




