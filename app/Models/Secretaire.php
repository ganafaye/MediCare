<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Secretaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'telephone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
