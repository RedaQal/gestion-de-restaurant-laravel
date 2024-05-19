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
    public function index(Request $request)
    {
        $categories = Categorie::all();
        $categories_search = Categorie::all();
        $search = $request->query()['search'] ?? "";
        if (count($request->query()) && isset($search)) {
            $produits = Produit::where('label', "like", "%" . $request->input('search') . "%")->get();
            $categories_search = Categorie::whereIn("id", array_map(fn ($el) => $el["id_categorie"], $produits->toArray()))->get();
        } else {
            $produits = Produit::all();
        }
        // dd($categories_search, $produits);
        return view('home.commande', compact('produits', 'categories', "categories_search", "search"));
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
