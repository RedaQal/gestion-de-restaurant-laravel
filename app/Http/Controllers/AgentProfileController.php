<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Employe::find($user->id)->serveur) {
            return view('profile.serveurIndex', compact('user'));
        }
        if (Employe::find($user->id)->cuisinier) {
            return view('profile.cuisinierIndex', compact('user'));
        }
        if (Employe::find($user->id)->caissiere) {
            return view('profile.caissierIndex', compact('user'));
        }
    }

    public function showSecurity()
    {
        $user = Auth::user();
        if (Employe::find($user->id)->serveur) {
            return view('profile.serveurSecurity');
        }
        if (Employe::find($user->id)->cuisinier) {
            return view('profile.cuisinierSecurity');
        }
        if (Employe::find($user->id)->caissiere) {
            return view('profile.caissierSecurity');
        }
    }
    public function updateProfile(Request $request)
    {
        $formField = $request->validate(
            [
                'name' => 'required',
                'tel' => ["required", "regex:/^(\+212|0)\d{9}$/"],
            ]
        );
        $user = Employe::find(Auth::user()->id);
        $user->name  = $formField['name'];
        $user->tel  = $formField['tel'];
        $user->save();
        return back()->with('success', "Employe <strong> $user->name</strong> est modifié avec succes");
    }


    public function updatePassword(Request $request)
    {
        $formField = $request->validate(
            [
                'password' => 'required|confirmed',
                'old_password' => 'required',
            ]
        );
        $user = Employe::find(Auth::user()->id);
        if (Hash::check($formField['old_password'], $user->password)) {
            $user->password = Hash::make($formField['password']);
            $user->save();
            return back()->with('success', "Mot de passe modifié avec succes");
        }
        return back()->with('error', "Mot de passe incorrect");
    }
}
