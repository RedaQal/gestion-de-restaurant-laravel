<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\CommandeStatus;
use Illuminate\Support\Facades\Auth;

class CuisinierController extends Controller
{
    public function index()
    {
        $commandes = CommandeStatus::where('status', '=', 'valide', 'and', 'id_cuisinier', '=', 'null')->orderby('updated_at', 'asc')->get();
        return view('cuisinier.commande.index', compact('commandes'));
    }

    public function preparer(CommandeStatus $commandeStatus)
    {
        $cuisinier = Employe::find(Auth::user()->id)->cuisinier;
        $commandeStatus->update([
            'id_cuisinier' => $cuisinier->id,
        ]);
        return to_route('cuisinier.index')->with('success', 'Commande est en cours de preparation');
    }
}
