<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Consultation extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'medecin_id', 'patiente_id', 'date_consultation', 'heure_consultation',
        'motif', 'diagnostic', 'prescription', 'poids', 'tension',
        'nombre_grossesses', 'antecedents'
    ];

     protected $dates = ['deleted_at']; // ✅ Pour gérer automatiquement les dates


    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function patiente()
    {
        return $this->belongsTo(Patiente::class);
    }
}
