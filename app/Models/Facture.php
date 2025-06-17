<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
     use HasFactory;

    protected $fillable = ['rendezvous_id', 'patiente_id', 'medecin_id', 'montant', 'type_facture', 'statut', 'methode_paiement'];


    public function rendezvous()
    {
        return $this->belongsTo(RendezVous::class);
    }

    public function patiente()
    {
        return $this->belongsTo(Patiente::class);
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}
