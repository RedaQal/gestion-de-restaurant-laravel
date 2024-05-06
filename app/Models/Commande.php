<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'total',
    ];

    public function produit_commandes()
    {
        return $this->hasMany(ProduitCommande::class, 'id_commande', 'id');
    }
    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'id_client');
    }
    public function commande_status()
    {
        return $this->hasOne(CommandeStatus::class, 'id_commande', 'id');
    }
}
