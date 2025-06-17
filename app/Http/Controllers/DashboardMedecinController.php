<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patiente;
use App\Models\Medecin;
use App\Models\RendezVous;
use Illuminate\Support\Facades\DB;
use App\Models\DossierMedical;
use App\Models\Ordonnance;
use App\Models\Consultation;


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
// Consultations par mois du médecin connecté
$consultationsParMois = DB::table('rendez_vous')
    ->selectRaw("MONTH(date_heure) as mois, COUNT(*) as total")
    ->whereYear("date_heure", date("Y"))
    ->where("medecin_id", Auth::id()) // ✅ Filtrer par médecin connecté
    ->groupBy("mois")
    ->orderBy("mois", "ASC")
    ->pluck("total", "mois")
    ->toArray();

// Répartition des motifs de consultation du médecin connecté
$repartitionMotifs = DB::table('rendez_vous')
    ->selectRaw("motif, COUNT(*) as total")
    ->where("medecin_id", Auth::id()) // ✅ Filtrer par médecin connecté
    ->groupBy("motif")
    ->pluck("total", "motif")
    ->toArray();

    //🔥Retourner variables dossier medical
    // 🔥 Récupérer les dossiers médicaux du médecin
    $dossiers = DossierMedical::where('medecin_id', $medecin_id)
                              ->orderBy('created_at', 'desc')
                              ->get();
     $medecin = auth()->user(); // ✅ Récupère le médecin connecté
    $ordonnances = Ordonnance::where('medecin_id', auth()->user()->id)->latest()->get();
        // 🔥 Récupérer les consultations du médecin connecté
    $consultations = Consultation::where('medecin_id', $medecin->id)->latest()->get();
        return view('espace_medecin.dashboard_medecin' , compact('patientes' , 'rendezvous' , 'consultationsParMois', 'repartitionMotifs' , 'dossiers' ,'ordonnances' ,'consultations'));
    }
}
