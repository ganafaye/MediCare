<?php

namespace App\Http\Controllers;
use App\Models\Patiente;
use App\Models\Medecin;
use Illuminate\Http\Request;
use App\Models\RendezVous;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardSecretaireController extends Controller
{
     public function index()
{
    $patientes = Patiente::all();
    $medecins = Medecin::all();
    $rendezvous = RendezVous::orderBy('date_heure', 'asc')->get();
    // Rendez-vous par mois
$rdvParMois = DB::table('rendez_vous')
    ->selectRaw("MONTH(date_heure) as mois, COUNT(*) as total")
    ->whereYear("date_heure", date("Y")) // ✅ Filtrer uniquement les rendez-vous de l'année en cours
    ->groupBy("mois")
    ->orderBy("mois", "ASC")
    ->pluck("total", "mois")
    ->toArray();

// Statut des rendez-vous
$statutRdv = [
    "Confirmés" => DB::table('rendez_vous')->where("statut", "confirmé")->count(),
    "Annulés" => DB::table('rendez_vous')->where("statut", "annulé")->count(),
    "En attente" => DB::table('rendez_vous')->where("statut", "en_attente")->count(), // ✅ Assure que les RV en attente sont bien pris en compte
];

    return view('espace_secretaire.dashboard_secretaire', compact('patientes', 'medecins', 'rendezvous' , 'rdvParMois', 'statutRdv'));
}

}
