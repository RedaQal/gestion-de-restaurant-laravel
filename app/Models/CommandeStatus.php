<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'id_commande',
        'id_serveur',
        'id_cuisinier',
        'id_caissiere',
    ];

    public function commande()
    {
        return $this->hasOne(Commande::class, 'id', 'id_commande');
    }

    public function serveur()
    {
        return $this->hasOne(Serveur::class, 'id', 'id_serveur');
    }

    public function cuisinier()
    {
        return $this->hasOne(Cuisinier::class, 'id', 'id_cuisinier');
    }

    public function caissiere()
    {
        return $this->hasOne(Caissiere::class, 'id', 'id_caissiere');
    }
}
