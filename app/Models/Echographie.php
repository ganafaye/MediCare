<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echographie extends Model
{
    use HasFactory;

    protected $fillable = [
        'grossesse_id',
        'titre',
        'date_examen',
        'fichier',
        'observations',
    ];

    public function grossesse()
    {
        return $this->belongsTo(Grossesse::class);
    }
}
