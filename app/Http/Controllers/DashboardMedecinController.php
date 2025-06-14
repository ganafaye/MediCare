<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patiente;
use App\Models\Medecin;
use App\Models\RendezVous;

class DashboardMedecinController extends Controller
{
    public function index()
    {
        $medecin_id = Auth::id();
        $patientes = Patiente::whereHas('rendezvous', function ($query) use ($medecin_id) { $query->where('medecin_id', $medecin_id);})->get();
         // 🔥 Récupérer les rendez-vous du médecin connecté
        $rendezvous = RendezVous::where('medecin_id', $medecin_id)
                            ->where('statut', '!=', 'annulé')
                            ->orderBy('date_heure', 'asc')
                            ->get();
        return view('espace_medecin.dashboard_medecin' , compact('patientes' , 'rendezvous'));
    }
}
