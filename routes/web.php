<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ServeurController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AgentProfileController;

Route::get('/', [HomeController::class, "index"])->name("index.index");

//login route
Route::middleware('multiLogin')->prefix("login")->name("login")->group(function () {
    Route::get('/', [LoginController::class, "index"]);
    Route::post('/', [LoginController::class, "login"])->name(".login");
});

//logout

Route::get('logout', [LoginController::class, "logout"])->name("login.logout");

//dashboard route
Route::middleware(['auth', 'admin'])->prefix("dashboard")->name("dashboard.")->group(function () {
    Route::get('/', [DashboardController::class, "index"])->name("index");
    //create employe
    Route::get('/employe', [EmployeController::class, "index"])->name("employe.index");
    Route::get('/employe/create', [EmployeController::class, "create"])->name("employe.create");
    Route::post('/employe', [EmployeController::class, "store"])->name("employe.store");
    //update employe
    Route::get('/employe/{employe}/edit', [EmployeController::class, "edit"])->name('employe.edit');
    Route::put('/employe/{employe}', [EmployeController::class, "update"])->name("employe.update");
    //delete employe
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
    //show profile
    Route::get('/profile', [AdminProfileController::class, "index"])->name("profile.index");
    Route::put('/profile', [AdminProfileController::class, "updateProfile"])->name("profile.update");
    //show profile security
    Route::get('/profile/security', [AdminProfileController::class, "showSecurity"])->name("profile.security");
    Route::put('/profile/security', [AdminProfileController::class, "updatePassword"])->name("profile.security.update");
});


Route::prefix("commande")->name("commande.")->group(function () {
    Route::get('/', [CommandeController::class, "index"])->name("index");
    Route::post('/', [CommandeController::class, "store"])->name("store");
});

//Serveur Interface
Route::middleware(['auth', 'serveur'])->prefix("serveur")->name("serveur.")->group(function () {
    //all commande
    Route::get('/', [ServeurController::class, "index"])->name("index");
    //show commande
    Route::get('/{commande}/show',[ServeurController::class,'show'])->name('show');
    //delete commande
    Route::delete('/{commande}',[ServeurController::class,'destroy'])->name('destroy');

});

Route::middleware(['auth', 'agent'])->prefix("profile")->name("profile.")->group(function () {
    //show profile
    Route::get('/', [AgentProfileController::class, "index"])->name("index");
    Route::put('/', [AgentProfileController::class, "updateProfile"])->name("update");
    //show profile security
    Route::get('/security', [AgentProfileController::class, "showSecurity"])->name("security");
    Route::put('/security', [AgentProfileController::class, "updatePassword"])->name("security.update");
});
