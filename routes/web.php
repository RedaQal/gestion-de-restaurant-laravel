<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, "index"])->name("index.index");

//login route
Route::middleware(['guest'])->prefix("login")->name("login")->group(function () {
    Route::get('/', [LoginController::class, "index"]);
    Route::post('/', [LoginController::class, "login"])->name(".login");
});

//logout

Route::get('logout', [LoginController::class, "logout"])->name("login.logout");

//dashboard route
Route::middleware(['auth', 'admin'])->prefix("dashboard")->name("dashboard.")->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name("index");
    //create employee
    Route::get('/employe', [EmployeController::class, "index"])->name("employe.index");
    Route::get('/employe/create', [EmployeController::class, "create"])->name("employe.create");
    Route::post('/employe', [EmployeController::class, "store"])->name("employe.store");
    //update employee
    Route::get('/employe/{employe}/edit', [EmployeController::class, "edit"])->name('employe.edit');
    Route::put('/employe/{employe}', [EmployeController::class, "update"])->name("employe.update");
    //delete employee
    Route::delete('/employe/{employe}', [EmployeController::class, "destroy"])->name("employe.destroy");

    //show list produit
    Route::get('/menu', [MenuController::class, "index"])->name("menu.index");
    //create produit
    Route::get('/menu/create', [MenuController::class, "create"])->name("menu.create");
    Route::post('/menu', [MenuController::class, "store"])->name("menu.store");
    //delete produit
    Route::delete('/menu/{produit}', [MenuController::class, "destroy"])->name("menu.destroy");
    //update produit
    Route::put('/menu/{produit}', [MenuController::class, "update"])->name("menu.update");

});

//Serveur Interface

Route::get('/serveur', [DashboardController::class, "serveur"])->name("serveur.index");
