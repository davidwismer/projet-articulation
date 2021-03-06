<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendu extends Model
{
    use HasFactory;

    protected $fillable = [
        'consignes',
        'date'
    ];

    //Définition de la relation avec Cours (un rendu est propre à un cours)
    public function cour(){
        return $this->belongsTo(Cour::class);
    }

    //Définition de la relation avec User (un rendu est créé par un utilisateur)
    public function user() {
        return $this->belongsTo(User::class);
    }
}
