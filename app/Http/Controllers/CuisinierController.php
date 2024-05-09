<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\ProduitImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProduitsRequest;

class CuisinierController extends Controller
{
    public function index()
    {
        $commandes = DB::table("clients")
            ->join("commandes", "clients.id", "=", "commandes.id_client")
            ->join("commande_statuses", 'commandes.id', "=", "commande_statuses.id_commande")
            ->where("commande_statuses.status", "=", "valide")
            ->get();
        return view('cuisinier.commande.index', compact('commandes'));
    }
}
