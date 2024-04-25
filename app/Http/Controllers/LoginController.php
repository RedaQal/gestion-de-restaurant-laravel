<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function login(LoginRequest $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');
        return view('index');
    }
}
