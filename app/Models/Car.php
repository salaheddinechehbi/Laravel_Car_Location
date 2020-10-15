<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Marque;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_achat',
        'matricule',
        //'marque_id',
        'cv',
        'color',
        'car_photo_path',
        'categorie_id'
    ];

    public function categorie() // <---
    {
        return $this->belongsTo(Categorie::class , 'categorie_id');
    }

    //public function marque() // <---
    //{
      //  return $this->belongsTo(Marque::class , 'marque_id');
    //}

}
