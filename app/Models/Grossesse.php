<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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

protected $casts = [
    'date_debut' => 'date',
    'date_terme' => 'date',
];


public function getDpaAttribute()
{
    return $this->date_terme
        ? \Carbon\Carbon::parse($this->date_terme)
        : ($this->date_debut ? \Carbon\Carbon::parse($this->date_debut)->addDays(280) : null);
}

public function getEtatGrossesseAttribute()
{
    if (!$this->date_debut) {
        return 'Inconnue';
    }

    $dpa = $this->date_terme
        ? \Carbon\Carbon::parse($this->date_terme)
        : \Carbon\Carbon::parse($this->date_debut)->addDays(280);

    $aujourdHui = now();
    $semaine = \Carbon\Carbon::parse($this->date_debut)->diffInWeeks($aujourdHui);

    if ($aujourdHui->lt($dpa) && $semaine < 37) {
        return 'En cours';
    }

    if ($semaine >= 37 && $semaine <= 40) {
        return 'À terme';
    }

    if ($semaine > 40 || $aujourdHui->gt($dpa)) {
        return 'Dépassée';
    }

    return 'Indéfinie';
}

public function getSemaineAttribute()
{
    return $this->date_debut
        ? \Carbon\Carbon::parse($this->date_debut)->diffInWeeks(now())
        : null;
}

}
