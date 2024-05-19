<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Serveur;
use App\Models\Caissiere;
use App\Models\Cuisinier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeRequest;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::where('id', "!=", Auth::user()->id)->get();
        return view('dashboard.Admin.employe.index', compact('employes'));
    }

    public function create()
    {
        return view('dashboard.Admin.employe.create');
    }

    public function store(EmployeRequest $request)
    {
        $fieldForm = $request->only("name", "role", "email", "tel", "salaire");
        $password = $this->generateRandomPassword();
        $employe = Employe::create([...$fieldForm, 'password' => Hash::make($password)]);
        if (!empty($request->only('post'))) {
            $post = $request->only('post')['post'];
            switch ($post) {
                case 'serveur':
                    $serveur = new Serveur();
                    $serveur->id_employe = $employe->id;
                    $serveur->save();
                    break;
                case 'caissier':
                    $caissier = new Caissiere();
                    $caissier->id_employe = $employe->id;
                    $caissier->save();
                    break;
                case 'cuisinier':
                    $cuisinier = new Cuisinier();
                    $cuisinier->id_employe = $employe->id;
                    $cuisinier->save();
                    break;
                default:
                    break;
            }
        }
        $message = 'Employe ajoute avec succes <br> Email : <strong>' . $request->email . '</strong> <br> Mot de passe : ' . '<strong>' . $password . '</strong>';
        return to_route('dashboard.employe.create')->with('success', $message);
    }

    public function edit(Employe $employe)
    {
        return view('dashboard.Admin.employe.edit', compact('employe'));
    }

    public function update(EmployeRequest $request, Employe $employe)
    {
        $fieldForm = $request->only("name", "email", "tel", "salaire");
        $employe->update($fieldForm);
        $message = 'Employe ' . '<strong>' . $request->name . '</strong>' . ' modifier avec succes <br>';
        return to_route('dashboard.employe.index')->with('success', $message);
    }
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return to_route('dashboard.employe.index')->with('success', 'Employe supprime avec succes');
    }

    //generating password for Employees
    private function generateRandomPassword($length = 16)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#%*';
        $charLength = strlen($chars);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $randomChar = $chars[rand(0, $charLength - 1)];
            $password .= $randomChar;
        }
        return $password;
    }
}
