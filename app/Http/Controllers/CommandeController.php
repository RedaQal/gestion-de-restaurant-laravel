<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\CommandeStatus;
use App\Models\ProduitCommande;

class CommandeController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        $categories = Categorie::all();
        return view('home.commande', compact('produits', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();
        $client = Client::create(
            $data['client']
        );
        $total = 0;
        foreach ($data['products'] as $produit) {
            $total += $produit['prix'] * $produit['quantity'];
        }
        $commande = Commande::create(
            [
                'id_client' => $client->id,
                'total' => $total
            ]
        );
        $commandeStatus = CommandeStatus::create(
            [
                'id_commande' => $commande->id,
                'status' => 'en cours',
            ]
            );
        foreach ($data['products'] as $produit) {
            ProduitCommande::create(
                [
                    'id_commande' => $commande->id,
                    'id_produit' => $produit['id'],
                    'quantite' => $produit['quantity'],
                ]
            );
        }
        return $client;
    }
}
