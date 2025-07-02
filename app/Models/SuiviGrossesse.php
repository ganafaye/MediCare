<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiviGrossesse extends Model
{
    use HasFactory;
    
    protected $table = 'suivis_grossesse';

    protected $fillable = [
        'grossesse_id',
        'date_visite',
        'poids',
        'tension',
        'age_gestationnel',
        'notes_medecin',
        'document',
    ];

    public function grossesse()
    {
        return $this->belongsTo(Grossesse::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class); // optionnel si tu veux suivre l'auteur
    }
}
