<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\ProduitImg;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitsRequest;

class MenuController extends Controller
{
    public function index()
    {
        $produits = Produit::paginate(10);
        return view('dashboard.Admin.menu.index', compact('produits'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('dashboard.Admin.menu.create', compact('categories'));
    }

    public function store(ProduitsRequest $request)
    {
        $fieldForm = $request->validated();
        unset($fieldForm['image']);
        $produit = Produit::create($fieldForm);

        $this->storeImg($request, $produit->id);
        return back()->with('success', "Produit <strong> $request->label</strong> ajouter avec succes");
    }

    public function storeImg(ProduitsRequest $request, int $id)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $url =  $image->store('produits', 'public');
                ProduitImg::create([
                    'url' => $url,
                    'id_produit' => $id
                ]);
            }
        }
    }
}
