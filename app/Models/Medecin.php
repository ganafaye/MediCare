<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Medecin extends Authenticatable
{
    use Notifiable;

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
