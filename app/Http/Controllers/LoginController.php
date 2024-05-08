<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Serveur;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin') {
                return to_route('dashboard.index');
            } else if ($user->role == 'agent') {
                if (Employe::find($user->id)->serveur) {
                    return redirect()->route('serveur.index');
                }
                if (Employe::find($user->id)->cuisinier) {
                    return to_route('cuisinier.index');
                }
                if (Employe::find($user->id)->caissiere) {
                    return "caissier";
                }
            }
        } else {
            return redirect()->back()->with('error', 'Email ou Mot de passe invalide')->onlyInput('email');
        }
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
