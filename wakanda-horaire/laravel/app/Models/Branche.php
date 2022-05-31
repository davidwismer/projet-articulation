<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;

    protected $primaryKey = 'dimin';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
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
}
