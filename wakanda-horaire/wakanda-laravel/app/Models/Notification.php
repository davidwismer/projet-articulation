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

    public function cour(){
        return $this->belongsTo(Cour::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}


