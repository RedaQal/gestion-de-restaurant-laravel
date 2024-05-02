<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;


class CommandeController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        $categories = Categorie::all();
        // dd($produits[0]->images[0]->url);
        return view('home.commande',compact('produits','categories'));
    }
}
