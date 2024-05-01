<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;


class CommandeController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        // dd($produits[0]->images[0]->url);
        return view('home.commande',compact('produits'));
    }
}
