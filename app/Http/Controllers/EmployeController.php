<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        return view('dashboard.Admin.employe.index');
    }
    
    public function create()
    {
        return view('dashboard.Admin.employe.create');
    }
}
