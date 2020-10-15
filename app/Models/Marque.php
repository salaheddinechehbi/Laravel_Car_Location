<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Marque extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];


    public function cars()
    {
        return $this->hasMany(Car::class);
        //return $this->hasMany(Todo::class)->todos()->orderBy('completed');
    }
}
