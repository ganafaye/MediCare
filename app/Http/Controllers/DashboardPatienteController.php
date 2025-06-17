<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\RendezVous;
use App\Models\Medecin;
use App\Models\DossierMedical;
use App\Models\Patiente;
use App\Models\Ordonnance;
use App\Models\Consultation;
use App\Models\Facture;

class DashboardPatienteController extends Controller
{
    public function index()
    {
        $medecins = Medecin::all();
        $rendezvous = RendezVous::where('patiente_id', Auth::id())->get();
        $patiente = auth()->user(); // Récupère la patiente connectée
        $dossier = DossierMedical::where('patiente_id', $patiente->id)->latest()->first(); // Récupère le dernier dossier médical
        $ordonnances = Ordonnance::where('patiente_id', $patiente->id)->latest()->get();
         // 🏥 Récupérer les consultations de cette patiente
        $consultations = Consultation::where('patiente_id', $patiente->id)->latest()->get();
        $factures = Facture::where('patiente_id', $patiente->id)->latest()->get();
        return view('espace_patiente.dashboard_patiente' , compact('rendezvous' , 'medecins' , 'dossier' , 'ordonnances' , 'consultations' , 'factures'));
    }
}
