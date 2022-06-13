<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'anneeDebut',
        'filiere_id'
    ];

    //Définition de la relation avec User (un classe peut avoir plusieur users)
    public function users(){
        return $this->hasMany(User::class);
    }

    //Définition de la relation avec Filiere (un classe appartient à une filiere)
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }

    //Définition de la relation avec Cours (un classe peut avoir plusieur cours)
    public function cours(){
        return $this->hasMany(Cour::class);
    }
}
