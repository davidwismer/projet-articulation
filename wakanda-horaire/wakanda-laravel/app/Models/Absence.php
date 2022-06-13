<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateDebut',
        'dateFin',
        'motif',
        'isValid',
        'user_id',
        'cour_id'
    ];

    //Definition avec user (une absence vaut pour un seul utilisateur)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Definition avec cours (une absence concerne un seul cours)
    public function cour(){
        return $this->belongsTo(Cour::class);
    }
}
