<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'dimin',
        'nom',
        'annee',
        'nbCredits',
        'semestreFormation',
        'couleur'
    ];

    //Definition avec branche (un module a 1 ou plusieur branches)
    public function branches()
    {
        return $this->hasMany(Branche::class);
    }

    //Définition de la relation avec Filieres (un module peut avoir plusieur filieres)
    public function filieres()
    {
        return $this->belongsToMany(Filiere::class);
    }

    //Définition de la relation avec Users (un module accueil plusieurs users)
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
