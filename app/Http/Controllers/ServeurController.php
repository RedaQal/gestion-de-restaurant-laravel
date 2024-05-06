<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employe;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\CommandeStatus;
use App\Http\Middleware\Serveur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServeurController extends Controller
{
    public function index()
    {
        $commandes = DB::table("clients")
            ->join("commandes", "clients.id", "=", "commandes.id_client")
            ->join("commande_statuses", 'commandes.id', "=", "commande_statuses.id_commande")
            ->where("commande_statuses.status", "=", "en cours")
            ->get();
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
        $commandes = DB::table("clients")
            ->join("commandes", "clients.id", "=", "commandes.id_client")
            ->join("commande_statuses", 'commandes.id', "=", "commande_statuses.id_commande")
            ->where(
                "commande_statuses.status",
                "=",
                "valide",
                "and",
                "commandes.id_serveur",
                "=",
                Employe::find(Auth::user()->id)->serveur->id
            )->get();
        return view('serveur.myOrders', compact('commandes'));
    }
}
