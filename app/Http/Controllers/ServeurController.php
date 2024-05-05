<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServeurController extends Controller
{

    public function index()
    {
        return view('serveur.index');
    }
}
