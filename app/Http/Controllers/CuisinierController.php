<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\CommandeStatus;
use Illuminate\Support\Facades\Auth;

class CuisinierController extends Controller
{
    public function index()
    {
        $commandes = CommandeStatus::where('status', '=', 'valide')->orderby('updated_at', 'asc')->get();
        return view('cuisinier.commande.index', compact('commandes'));
    }

    public function preparer(CommandeStatus $commandeStatus)
    {
        $cuisinier = Employe::find(Auth::user()->id)->cuisinier;
        $commandeStatus->update([
            'id_cuisinier' => $cuisinier->id,
            'status' => 'preparer',
        ]);
        return to_route('cuisinier.index')->with('success', 'Commande est en cours de preparation');
    }
    public function enCours()
    {
        $cuisinier = Employe::find(Auth::user()->id)->cuisinier;
        $commandes = CommandeStatus::where('status', '=', 'preparer')->where('id_cuisinier', '=', $cuisinier->id)->orderby('updated_at', 'asc')->get();
        return view('cuisinier.commande.enCours', compact('commandes'));
    }
    public function aServir(CommandeStatus $commandeStatus)
    {
        $cuisinier = Employe::find(Auth::user()->id)->cuisinier;
        $commandeStatus->update([
            'id_cuisinier' => $cuisinier->id,
            'status' => 'a servir',
        ]);
        return to_route('cuisinier.enCours')->with('success', 'Le serveur est bien notifié');
    }
}
