<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employe;
use App\Models\Commande;
use App\Models\CommandeStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServeurController extends Controller
{
    public function index()
    {
        $commandes = CommandeStatus::where('status', '=', 'en cours')->get();
        return view('serveur.index', compact('commandes'));
    }

    public function destroy(Commande $commande)
    {
        Client::destroy($commande->id_client);
        return to_route('serveur.index')->with('success', 'Commande supprime avec succée');
    }

    public function show(Commande $commande)
    {
        return view('serveur.show', compact('commande'));
    }

    public function valider(Commande $commande)
    {
        $serveur = Employe::find(Auth::user()->id)->serveur;
        CommandeStatus::find($commande->commande_status->id)->update([
            'status' => 'valide',
            'id_serveur' => $serveur->id,

        ]);
        return to_route('serveur.index')->with('success', 'Commande est validée avec succès');
    }

    public function myOrders()
    {
        $serveur = Employe::find(Auth::user()->id)->serveur;
        $commandes = CommandeStatus::where('id_serveur', '=', $serveur->id)
        ->whereIn('status', ['valide','preparer','a servir'])
        ->get();
        return view('serveur.myOrders', compact('commandes'));
    }
    public function serve(CommandeStatus $commandeStatus){
        $commandeStatus->update([
            'status' => 'payer',
        ]);
        return to_route('serveur.myOrders')->with('success', 'Commande est servie avec succès');
    }
}
