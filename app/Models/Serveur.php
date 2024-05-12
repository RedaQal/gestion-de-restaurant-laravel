<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Serveur extends Model
{
    use HasFactory;

    public function employe()
    {
        return $this->hasOne(Employe::class, 'id', 'id_employe');
    }
}
