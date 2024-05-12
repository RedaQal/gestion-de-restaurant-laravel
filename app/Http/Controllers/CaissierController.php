<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\CommandeStatus;
use Illuminate\Support\Facades\Auth;

class CaissierController extends Controller
{
    public function index()
    {
        $commandes = CommandeStatus::where('status', 'payer')->whereNull('id_caissiere')->get();
        return view('caissier.index',compact('commandes'));
    }

    public function payer(CommandeStatus $commandeStatus){
        $caissier = Employe::find(Auth::user()->id)->caissiere;
        $commandeStatus->update([
            'id_caissiere' => $caissier->id,
        ]);
        return to_route('caissier.show',$commandeStatus->id)->with('success', 'Commande est payer');
    }

    public function show(CommandeStatus $commandeStatus){
        return view('caissier.facture',compact('commandeStatus'));
    }
    public function history(){
        $today = now();
        $commandes = CommandeStatus::where('status', 'payer')->whereNotNull('id_caissiere')->get();
        return view('caissier.history',compact('commandes'));
    }
}
