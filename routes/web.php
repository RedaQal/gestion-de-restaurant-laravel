<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/',[HomeController::class, "index"]);

//login route

Route::get('/admin',[LoginController::class, "index"])->name("login.index");
Route::post('/admin',[LoginController::class, "login"])->name("login.login");
