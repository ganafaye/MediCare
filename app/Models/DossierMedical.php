<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    use HasFactory;
    protected $table = 'dossiers_medicaux';

    protected $fillable = ['patiente_id', 'medecin_id', 'diagnostic', 'traitement', 'observations', 'grossesse' , 'documents'];
    protected $casts = [
        'grossesse' => 'boolean',
        'documents' => 'array', // Assurez-vous que les documents sont stockés en tant que tableau
    ];


    public function patiente() {
        return $this->belongsTo(Patiente::class);
    }

    public function medecin() {
        return $this->belongsTo(Medecin::class);
    }
    public function documents() {
    return $this->hasMany(Document::class);
}

}
