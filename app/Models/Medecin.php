<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Medecin extends Authenticatable
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'specialite',
        'numeros_professionel',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
