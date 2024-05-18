<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'label','img_id'
    ];

    public function img()
    {
        return $this->hasOne(CategorieImg::class, 'id', 'img_id');
    }
}
