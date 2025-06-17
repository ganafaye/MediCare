<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    use Notifiable; //

    protected $fillable = ['patiente_id', 'medecin_id', 'secretaire_id', 'admin_id', 'type', 'message', 'is_read'];

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
