<?php

namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'dateNaissance',
        'email',
        'password',
        'noTel',
        'adresse',
        'photo',
        'filiere_id',
        'role_id',
        'classe_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Permet d'encoder le mot de passe
     * @param type $password Le mot de passe
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    //Définition de la relation avec Filière (un utilisateur n'a qu'une filière)
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    //Définition de la relation avec Role (un utilisateur n'a qu'un role)
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //Définition de la relation avec Classe (un utilisateur n'a qu'une classe)
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    //Définition de la relation avec Absence (un utilisateur a plusieurs absences)
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    //Définition de la relation avec Note (un utilisateur à plusieur notes)
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    //Définition de la relation avec Commentaire (un utilisateur peut écrire plusieurs commentaires)
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    //Définition de la relation avec Modules (un utilisateur participe à plusieurs modules)
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    //Définition de la relation avec Branche (un utilisateur participe à plusieurs branches)
    public function branches()
    {
        return $this->belongsToMany(Branche::class);
    }

    //Définition de la relation avec Rendus (un utilisateur peut creer plusieurs rendus)
    public function rendus()
    {
        return $this->hasMany(Rendu::class);
    }

    //Définition de la relation avec Rendus (un utilisateur peut creer plusieurs rendus)
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
