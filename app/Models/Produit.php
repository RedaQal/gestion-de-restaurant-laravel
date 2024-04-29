<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'label', 'description', 'id_categorie', 'prix', 'image'
    ];

    public function categorie()
    {
        return $this->hasOne(Categorie::class, 'id', 'id_categorie');
    }

    public function images()
    {
        return $this->hasMany(ProduitImg::class, 'id_produit', 'id');
    }
}
