<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $primaryKey = 'dimin';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'dimin',
        'nom',
        'annee',
        'nbCredits',
        'anneeFormation',
    ];

    //Definition avec branche (un module a 1 ou plusieur branches)
    public function branches(){
        return $this->hasMany(Branche::class);
    }
}
