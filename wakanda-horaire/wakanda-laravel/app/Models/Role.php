<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
    ];

    //Définition de la relation avec User (un role peut avoir plusieur users)
    public function users(){
        return $this->hasMany(User::class);
    }
}
