<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendu extends Model
{
    use HasFactory;

    protected $fillable = [
        'consignes',
        'date'
    ];


    public function cour(){
        return $this->belongsTo(Cour::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
