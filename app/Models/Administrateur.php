<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrateur extends Authenticatable
{
    protected $fillable = [
        'prenom',
        'email',
        'password',
        'telephone',
        'niveau_acces',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
