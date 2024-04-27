<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        return view('dashboard.Admin.menu.index');
    }
    public function create()
    {
        return view('dashboard.Admin.menu.create');
    }
}
