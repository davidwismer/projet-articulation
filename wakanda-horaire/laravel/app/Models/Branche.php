<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;

    protected $fillable = [
        'dimin',
        'coefficient',
        'nom',
        'description',
        'annee',
        'anneeFormation'
    ];

    //Definition avec module (une branche appartient à un module)
    public function module(){
        return $this->belongsTo(Module::class);
    }

    //Definition avec note (une branche est définie par plusieur notes)
    public function notes(){
        return $this->hasMany(Note::class);
    }
}
