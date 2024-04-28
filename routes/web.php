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
Route::middleware(['auth','admin'])->prefix("dashboard")->name("dashboard.")->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name("index");
    Route::get('/employe', [EmployeController::class, "index"])->name("employe.index");
    Route::get('/employe/create', [EmployeController::class, "create"])->name("employe.create");
    Route::post('/employe', [EmployeController::class, "store"])->name("employe.store");
    Route::get('/menu/create', [MenuController::class, "create"])->name("menu.create");
    Route::get('/menu', [MenuController::class, "index"])->name("menu.index");
});

//Serveur Interface

Route::get('/serveur', [DashboardController::class, "serveur"])->name("serveur.index");

