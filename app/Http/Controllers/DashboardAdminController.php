<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RendezVous;
use App\Models\Patiente;
use App\Models\Medecin;
use App\Models\Facture;
use Illuminate\Support\Facades\DB;
use App\Models\Message;


class DashboardAdminController extends Controller
{
    public function index()
    {
        $patientes = \App\Models\Patiente::all(); // récupère toutes les patientes
        $medecins = \App\Models\Medecin::all(); // <-- ajoute cette ligne
        $secretaires = \App\Models\Secretaire::all(); // récupère toutes les secrétaires
        $rendezvous = RendezVous::orderBy('date_heure', 'asc')->get();
    $nombrePatientes = \App\Models\Patiente::count();
    $nombreMedecins = \App\Models\Medecin::count();
    $rendezVousDuJour = RendezVous::whereDate('date_heure', now()->format('Y-m-d'))->count();
   // Rendez-vous par mois
  $rendezvousParMois = DB::table('rendez_vous')
    ->selectRaw("MONTH(date_heure) as mois, COUNT(*) as total")
    ->whereYear("date_heure", date("Y")) // ✅ Filtrer uniquement les rendez-vous de l'année en cours
    ->groupBy("mois")
    ->orderBy("mois", "ASC") // ✅ Trier les mois dans l'ordre
    ->pluck("total", "mois")
    ->toArray();

    // Répartition des âges des patientes
    $repartitionAgePatientes = Patiente::selectRaw("YEAR(CURDATE()) - YEAR(date_naissance) AS age, COUNT(*) AS total")
        ->groupBy("age")
        ->pluck("total", "age")
        ->toArray(); // 🔥 Convertir en tableau

    // Consultations par médecin
  $consultationsParMedecin = DB::table('rendez_vous')
    ->join('medecins', 'rendez_vous.medecin_id', '=', 'medecins.id')
     ->selectRaw("CONCAT('Dr.',medecins.prenom, ' ', medecins.nom) AS medecin, COUNT(*) AS total")
    ->groupBy('medecin')
    ->pluck('total', 'medecin')
    ->toArray();



    // Taux de rendez-vous honorés vs annulés
    $tauxRendezVous = [
        "confirmés" => RendezVous::where("statut", "confirmé")->count(),
        "annulés" => RendezVous::where("statut", "annulé")->count(),
    ];

    // Revenus par mois (année en cours)
$revenusParMois = Facture::selectRaw('MONTH(created_at) as mois, SUM(montant) as total')
    ->whereYear('created_at', date('Y'))
    ->groupBy('mois')
    ->orderBy('mois')
    ->pluck('total', 'mois')
    ->toArray();

// Revenu total cumulé
$revenuTotal = Facture::sum('montant');

// Nombre total de factures émises
$nombreFactures = Facture::count();

$messages = Message::latest()->take(10)->get(); // ou paginate si tu veux
        return view('espace_admin.dashboard_admin', compact('patientes', 'medecins' , 'secretaires' , 'rendezvous' , 'nombrePatientes', 'nombreMedecins', 'rendezVousDuJour' , 'rendezvousParMois', 'repartitionAgePatientes', 'consultationsParMedecin', 'tauxRendezVous' , 'revenusParMois', 'revenuTotal', 'nombreFactures' ,'messages'));
    }




}
