<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'motif',
        'date'
    ];

    //Définition de la relation avec cours (une notif est propre à un cours)
    public function cour(){
        return $this->belongsTo(Cour::class);
    }

    //Définition de la relation avec User (une notif est créée par un utilisateur)
    public function user() {
        return $this->belongsTo(User::class);
    }
}


