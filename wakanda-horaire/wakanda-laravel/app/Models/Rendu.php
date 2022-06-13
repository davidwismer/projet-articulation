<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendu extends Model
{
    use HasFactory;

    protected $fillable = [
        'consignes', 
    ];


    public function cour()
    {
        return $this->belongsTo(Cour::class);
    }
}
