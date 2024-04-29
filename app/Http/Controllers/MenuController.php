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

    public function update(Request $request, Produit $produit)
    {
        $produit->update(["prix" => $request->input('prix')]);
        return to_route('dashboard.menu.index')->with('success', "Produit <strong> $produit->label</strong> est modifié avec succes");
    }

    public function destroy(Produit $produit)
    {
        $this->deleteImg($produit->images);
        $produit->delete();
        return back()->with('success', "Produit <strong> $produit->label</strong> supprimer avec succes");
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

    public function deleteImg($images)
    {
        foreach ($images as $image) :
            $path = public_path("storage/" . $image->url);
            if (file_exists($path)) {
                unlink($path);
            }
        endforeach;
    }
}
