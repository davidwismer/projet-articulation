<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'cour_id',
        'user_id'
    ];

    //Definition avec Cours (Un commentaire apparait pour un seul cours)
    public function cour(){
        return $this->belongsTo(Cour::class);
    }

    //Definition avec User (Un commentaire est écrit par un seul user)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
