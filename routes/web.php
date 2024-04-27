<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, "index"])->name("index.index");

//login route

Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "login"])->name("login.login");
Route::get('/logout', [LoginController::class, "logout"])->name("logout");

//dashboard route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard.index");
    Route::get('/dashboard/employe', [EmployeController::class, "index"])->name("dashboard.employe.index");
    Route::get('/dashboard/employe/ajouter', [EmployeController::class, "create"])->name("dashboard.employe.create");
    Route::get('/dashboard/menu/ajouter', [MenuController::class, "create"])->name("dashboard.menu.create");
    Route::get('/dashboard/menu', [MenuController::class, "index"])->name("dashboard.menu.index");
});

//Serveur Interface

Route::get('/serveur', [DashboardController::class, "serveur"])->name("serveur.index");

