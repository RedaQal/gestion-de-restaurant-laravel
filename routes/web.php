<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, "index"])->name("index.index");

//login route

Route::get('/admin', [LoginController::class, "index"])->name("login.index");
Route::post('/admin', [LoginController::class, "login"])->name("login.login");

//dashboard route

Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard.index");
