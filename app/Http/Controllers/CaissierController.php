<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaissierController extends Controller
{

    public function index()
    {
        return view('caissier.index');
    }
}
