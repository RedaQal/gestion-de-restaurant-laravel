<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Produit;
use App\Models\Commande;


class DashboardController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        $employes = Employe::all();
        //Nombre des commandes
        $nb_commande = count($commandes);
        //Total des commandes
        $total = Commande::whereDate('created_at', date('Y-m-d'))->sum('total');
        //Nombre des employes
        $nb_employe = count($employes);
        //Nombre des plats
        $nb_plat = Produit::count();
        // Total par mois
        $statistiques = [];
        for ($i = 1; $i <= date('m'); $i++) {
            $CAparMois = Commande::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->sum('total');
            $statistiques[$i] = $CAparMois;
        }
        $statistiques = json_encode($statistiques);
        return view('dashboard.Admin.index', compact('nb_commande', 'total', 'nb_employe', 'nb_plat', 'statistiques'));
    }
}
