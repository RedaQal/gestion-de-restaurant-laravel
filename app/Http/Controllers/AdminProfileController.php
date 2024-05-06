<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.profile.index', compact('user'));
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

    public function showSecurity()
    {
        return view('dashboard.profile.security');
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
