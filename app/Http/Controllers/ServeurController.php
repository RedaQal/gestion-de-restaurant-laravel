<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServeurController extends Controller
{
    public function index()
    {
        $commandes = DB::table("clients")
            ->join("commandes", "clients.id", "=", "commandes.id_client")
            ->join("commande_statuses", 'commandes.id', "=", "commande_statuses.id_commande")
            ->where("commande_statuses.status", "=", "en cours")
            ->get();
        // dd($commandes);
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
}
