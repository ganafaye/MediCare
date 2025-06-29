<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grossesse extends Model
{
    use HasFactory;

    protected $fillable = [
        'patiente_id',
        'medecin_id',
        'date_debut',
        'date_terme',
        'nombre_bebes',
        'notes_initiales',
    ];

    public function patiente()
    {
        return $this->belongsTo(Patiente::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function suivis()
    {
        return $this->hasMany(SuiviGrossesse::class);
    }

    public function echographies()
    {
        return $this->hasMany(Echographie::class);
    }
}
