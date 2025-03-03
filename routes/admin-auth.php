<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CommandeController;
use App\Http\Controllers\Admin\ReservationController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'store']);

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route pour le menu (corrigée sans double préfixe)
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

    // Route pour les commandes
    Route::get('/commandes', [CommandeController::class, 'index'])->name('commande.index');

    // Route pour les reservations
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');


    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
});
