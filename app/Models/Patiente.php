<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Grossesse;
use Illuminate\Notifications\Notifiable;


class Patiente extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'nom', 'prenom', 'date_naissance', 'telephone', 'email', 'groupe_sanguin', 'profession', 'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

     public function rendezvous()
    {
        return $this->hasMany(RendezVous::class, 'patiente_id');
    }

    // app/Models/Patiente.php
     public function grossesses()
{
    return $this->hasMany(Grossesse::class);
}




}
