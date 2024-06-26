<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_commande',
        'id_produit',
        'quantite',
    ];

    public function produit()
    {
        return $this->hasOne(Produit::class,'id', 'id_produit');
    }
}
