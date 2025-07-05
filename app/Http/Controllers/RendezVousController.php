<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\RendezVous;
use App\Notifications\RendezVousCreePatiente;
use App\Notifications\RendezVousValidePatiente;
use App\Notifications\NouveauRendezVousNotification;
use App\Notifications\ConfirmationAnnulationPatiente;
use App\Notifications\RendezVousAnnuleParMedecin;
use App\Notifications\RendezVousAnnuleParAdminOuSecretaire;

class RendezVousController extends Controller
{
    // Afficher les rendez-vous pour chaque rôle
    public function index()
    {
        if (Auth::user()->role === 'secretaire') {
            $rendezvous = RendezVous::where('secretaire_id', Auth::id())->where('statut', '!=', 'annulé')->get();
        } elseif (Auth::user()->role === 'medecin') {
            $rendezvous = RendezVous::where('medecin_id', Auth::id())->where('statut', '!=', 'annulé')->get();
        } else {
            $rendezvous = RendezVous::where('patiente_id', Auth::id())->where('statut', '!=', 'annulé')->get();
        }

        return view('espace_secretaire.rendezvous', compact('rendezvous'));
    }

    // Créer un rendez-vous par la patiente ou le secrétaire
   public function store(Request $request)
{

    $request->validate([
        'medecin_id' => 'required|exists:medecins,id',
        'date_heure' => 'required|date|after:today',
        'motif' => 'nullable|string|max:255',
    ]);

    $rendezvous = RendezVous::create([
        'patiente_id' => Auth::id(),
        'medecin_id' => $request->medecin_id,
        'date_heure' => $request->date_heure,
        'statut' => 'en_attente',
        'motif' => $request->motif,
    ]);

// Envoi de la notification à la patiente
   $rendezvous->patiente->notify(new RendezVousCreePatiente($rendezvous));
    return back()->with('success', 'Rendez-vous programmé avec succès !');
}

    // Confirmer un rendez-vous (Médecin uniquement)
    public function confirm($id)
    {
        $rendezvous = RendezVous::where('id', $id)->where('medecin_id', Auth::id())->firstOrFail();
        $rendezvous->update(['statut' => 'confirmé']);

        if ($rendezvous->patiente) {
        $rendezvous->patiente->notify(new RendezVousValidePatiente($rendezvous));
    }

        return back()->with('success', 'Rendez-vous confirmé avec succès !');
    }

    // Annuler un rendez-vous (Secrétaire uniquement)
    public function cancel($id)
    {
        $rendezvous = RendezVous::where('id', $id)->where('secretaire_id', Auth::id())->firstOrFail();
        $rendezvous->update(['statut' => 'annulé']);
        $rendezvous->patiente->notify(new RendezVousAnnuleParAdminOuSecretaire($rendezvous, 'la secrétaire')); // ou 'l’administrateur'
        return back()->with('success', 'Rendez-vous annulé avec succès.');
    }

    public function cancelByPatiente($id)
{
    $rendezvous = RendezVous::where('id', $id)
                            ->where('patiente_id', Auth::id()) // 🔥 Vérifie que la patiente annule SON rendez-vous
                            ->firstOrFail();

    $rendezvous->update(['statut' => 'annulé']);
    $rendezvous->patiente->notify(new ConfirmationAnnulationPatiente($rendezvous));

    return back()->with('success', 'Votre rendez-vous a été annulé avec succès !');
}

public function cancelByMedecin($id)
{
    $rendezvous = RendezVous::where('id', $id)
                            ->where('medecin_id', Auth::id()) // 🔥 Vérifie que le médecin annule SON rendez-vous
                            ->firstOrFail();

    $rendezvous->update(['statut' => 'annulé']);

    $rendezvous->patiente->notify(new RendezVousAnnuleParMedecin($rendezvous));

    return back()->with('success', 'Rendez-vous annulé avec succès !');
}
public function deleteByAdmin($id)
{
    $rendezvous = RendezVous::findOrFail($id);
    $rendezvous->delete();
$rendezvous->update(['statut' => 'annulé']);

$rendezvous->patiente->notify(new RendezVousAnnuleParAdminOuSecretaire($rendezvous, 'l’administrateur')); // ou 'l’administrateur'
    return back()->with('success', 'Rendez-vous supprimé avec succès.');
}


public function updateByAdmin(Request $request, $id)
{
    $request->validate([
        'date_heure' => 'required|date',
        'motif' => 'required|string|max:255',
    ]);

    $rendezvous = RendezVous::findOrFail($id);
    $rendezvous->update([
        'date_heure' => $request->date_heure,
        'motif' => $request->motif,
    ]);

    return back()->with('success', 'Rendez-vous mis à jour avec succès !');
}

public function storeByAdmin(Request $request)
{
    $request->validate([
        'patiente_id' => 'required|exists:patientes,id',
        'medecin_id' => 'required|exists:medecins,id',
        'date_heure' => 'required|date',
        'motif' => 'required|string|max:255',
    ]);

    RendezVous::create([
        'patiente_id' => $request->patiente_id,
        'medecin_id' => $request->medecin_id,
        'date_heure' => $request->date_heure,
        'motif' => $request->motif,
        'statut' => 'en_attente',
    ]);

    return back()->with('success', 'Rendez-vous programmé avec succès !');
}

}
