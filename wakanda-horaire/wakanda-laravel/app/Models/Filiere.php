<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'orientation',
        'modeFormation',
        'niveau',
    ];

    //Définition de la relation avec User (une filière peut avoir plusieur users)
    public function users(){
        return $this->hasMany(User::class);
    }

    //Définition de la relation avec Group (une filière peut avoir plusieur groups)
    public function groups(){
        return $this->hasMany(Group::class);
    }

    //Définition de la relation avec Modules (une filière peut avoir plusieur modules)
    public function modules(){
        return $this->belongsToMany(Module::class);
    }
}
