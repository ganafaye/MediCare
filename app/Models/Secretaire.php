<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Secretaire extends Authenticatable
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
