<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuisinierController extends Controller
{
    public function index()
    {
        return view('cuisinier.index');
    }
}
