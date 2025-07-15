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
use Illuminate\Support\Facades\Gate;

class DashboardPatienteController extends Controller
{
    public function index()
    {
        // 🔐 Vérifie la session
        if (!Auth::guard('patiente')->check()) {
            return redirect('/login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }
        $medecins = Medecin::all();
        $rendezvous = RendezVous::where('patiente_id', Auth::id())->get();
        $patiente = auth()->user(); // Récupère la patiente connectée
        $dossier = DossierMedical::where('patiente_id', $patiente->id)->latest()->first(); // Récupère le dernier dossier médical
        $ordonnances = Ordonnance::where('patiente_id', $patiente->id)->latest()->get();
         // 🏥 Récupérer les consultations de cette patiente
        $consultations = Consultation::where('patiente_id', $patiente->id)->latest()->get();
        $factures = Facture::where('patiente_id', $patiente->id)->latest()->get();
        // Récupérer les nouvelles notifications
    $notifications = collect();

    foreach ($rendezvous as $rdv) {
        if ($rdv->statut == "Confirmé" || $rdv->statut == "Annulé") {
            $notifications->push([
                'type' => 'Rendez-vous',
                'message' => "Votre rendez-vous avec Dr. {$rdv->medecin->nom} est désormais {$rdv->statut}.",
                'date' => $rdv->updated_at->format('d/m/Y à H:i'),
            ]);
        }
    }

    foreach ($factures as $facture) {
        $notifications->push([
            'type' => 'Facture',
            'message' => "Une nouvelle facture est disponible pour votre consultation du {$facture->created_at->format('d/m/Y')}.",
            'date' => $facture->created_at->format('d/m/Y à H:i'),
        ]);
    }

    foreach ($ordonnances as $ordonnance) {
        $notifications->push([
            'type' => 'Ordonnance',
            'message' => "Une nouvelle ordonnance vous a été prescrite par Dr. {$ordonnance->medecin->nom}.",
            'date' => $ordonnance->created_at->format('d/m/Y à H:i'),
        ]);
    }
        return response()->view('espace_patiente.dashboard_patiente' , compact('rendezvous' , 'medecins' , 'dossier' , 'ordonnances' , 'consultations' , 'factures' , 'notifications'))
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }
}
