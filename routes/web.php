<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('register', [RegisteredUserController::class, 'create'])->middleware(['auth', 'verified'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->middleware(['auth', 'verified']);

Route::get('/agenda', function(){
    return view('agenda.agenda');
})->middleware(['auth', 'verified'])->name('agenda');

Route::resource('usuarios', UsuarioController::class)->middleware(['auth', 'verified']);
Route::resource('medicos', MedicoController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
