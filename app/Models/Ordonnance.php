<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    protected $fillable = ['medecin_id', 'patiente_id', 'contenu', 'date_prescription'];

    protected $casts = [
    'date_prescription' => 'date',
];

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function patiente()
    {
        return $this->belongsTo(Patiente::class);
    }
}
