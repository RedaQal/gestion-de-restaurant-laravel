<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServeurController extends Controller
{

    public function index()
    {
        $commandes = DB::table("clients")
            ->join("commandes","clients.id", "=", "commandes.id_client")
            ->join("commande_statuses",'commandes.id', "=", "commande_statuses.id_commande")
            ->where("commande_statuses.status", "=", "en cours")
            ->get();
        return view('serveur.index', compact('commandes'));
    }
}
