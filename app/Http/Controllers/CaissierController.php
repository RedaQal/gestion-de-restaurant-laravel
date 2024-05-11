<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommandeStatus;

class CaissierController extends Controller
{

    public function index()
    {
        $commandes = CommandeStatus::where('status', 'payer')->get();
        return view('caissier.index',compact('commandes'));
    }
}
