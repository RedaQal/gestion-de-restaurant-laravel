<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitImg extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_produit',
        'url',
    ];
}
