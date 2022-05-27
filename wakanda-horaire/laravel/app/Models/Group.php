<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'anneeDebut',
        'filiere_id'
    ];

    //Définition de la relation avec User (un group(classe) peut avoir plusieur users)
    public function users(){
        return $this->hasMany(User::class);
    }

    //Définition de la relation avec User (un group(classe) peut avoir plusieur users)
    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
}
