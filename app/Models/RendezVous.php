<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

   protected $table = 'rendez_vous'; // 🔥 Assure-toi que le nom est correct

    protected $fillable = [
        'patiente_id', 'medecin_id', 'date_heure', 'statut', 'motif'
    ];

    public function patiente()
    {
        return $this->belongsTo(Patiente::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function secretaire()
    {
        return $this->belongsTo(Secretaire::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
