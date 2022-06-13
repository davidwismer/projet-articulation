<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'label',
        'room',
        'start',
        'end',
        'hasRendu',
        'periodeStart',
        'periodeDuree',
        'branche_id',
        'module_id'
    ];

    //Definition avec Branche (Un cours appartient à une seule branche)
    public function branche()
    {
        return $this->belongsTo(Branche::class);
    }

    //Definition avec Module (Un cours appartient à un seul module)
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    //Definition avec Absences (Un cours est concerné par plusieur absences)
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    //Definition avec Commentaire (Un cours est concerné par plusieur commentaires)
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    //Definition avec Classe (Un cours est donné à un classe)
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    //Définition de la relation avec User (une filière peut avoir plusieur users)
    public function rendus()
    {
        return $this->hasMany(Rendu::class);
    }
}
