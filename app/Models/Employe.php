<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','role','email','tel','salaire','password'
    ];

    public function serveur(){
        return $this->hasOne(Serveur::class,'id_employe','id');
    }

    public function cuisinier(){
        return $this->hasOne(Cuisinier::class,'id_employe','id');
    }

    public function caissiere(){
        return $this->hasOne(Caissiere::class,'id_employe','id');
    }
}
