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
        'branche_id'
    ];

    //Definition avec Branche (Un cours appartient à une seule branche)
    public function branche(){
        return $this->belongsTo(Branche::class);
    }
}
