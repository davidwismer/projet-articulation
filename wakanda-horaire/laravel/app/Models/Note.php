<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'valeur',
        'coefficient',
        'description',
        'isExam',
        'user_id'
    ];

    //Définition de la relation avec User (une note est propre à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
