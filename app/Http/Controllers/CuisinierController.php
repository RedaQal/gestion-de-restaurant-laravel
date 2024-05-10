<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\CommandeStatus;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitImg;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitsRequest;

class CuisinierController extends Controller
{
    public function index()
    {
        $commandes = CommandeStatus::where('status', '=', 'valide')->orderby('updated_at', 'asc')->get();
        return view('cuisinier.commande.index', compact('commandes'));
    }

    public function preparer(CommandeStatus $commandeStatus)
    {
        $cuisinier = Employe::find(Auth::user()->id)->cuisinier;
        $commandeStatus->update([
            'id_cuisinier' => $cuisinier->id,
            'status' => 'preparer',
        ]);
        return to_route('cuisinier.index')->with('success', 'Commande est en cours de preparation');
    }

    public function enCours()
    {
        $cuisinier = Employe::find(Auth::user()->id)->cuisinier;
        $commandes = CommandeStatus::where('status', '=', 'preparer')->where('id_cuisinier', '=', $cuisinier->id)->orderby('updated_at', 'asc')->get();
        return view('cuisinier.commande.enCours', compact('commandes'));
    }

    public function aServir(CommandeStatus $commandeStatus)
    {
        $cuisinier = Employe::find(Auth::user()->id)->cuisinier;
        $commandeStatus->update([
            'id_cuisinier' => $cuisinier->id,
            'status' => 'a servir',
        ]);
        return to_route('cuisinier.enCours')->with('success', 'Le serveur est bien notifié');
    }

    public function listPlat()
    {
        $produits = Produit::paginate(12);
        return view('cuisinier.menu.index', compact('produits'));
    }

    public function ajouterPlat()
    {
        $categories = Categorie::all();
        return view('cuisinier.menu.create', compact('categories'));
    }

    public function modifierPlat(Request $request, Produit $produit)
    {
        $produit->update(["prix" => $request->input('prix')]);
        return to_route('cuisinier.listPlat')->with('success', "Produit <strong> $produit->label</strong> est modifié avec succes");
    }

    public function supprimerPlat(Produit $produit)
    {
        $this->deleteImg($produit->images);
        $produit->delete();
        return back()->with('success', "Produit <strong> $produit->label</strong> supprimer avec succes");
    }

    public function enregisterPlat(ProduitsRequest $request)
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
