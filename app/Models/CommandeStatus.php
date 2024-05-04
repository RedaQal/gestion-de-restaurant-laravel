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
}
