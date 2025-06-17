<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Patiente;
use App\Models\RendezVous;
use App\Models\Medecin;
use Illuminate\Support\Facades\Hash;

class FactureController extends Controller
{
    // 📌 Afficher toutes les factures
    public function index()
    {
        $factures = Facture::latest()->get();
        return view('dashboard_secretaire', compact('factures'));
    }

    // 📌 Créer une nouvelle facture
    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric',
            'type_facture' => 'required|string',
            'statut' => 'required|string',
        ]);

        if ($request->patiente_id === "new") {
            $patiente = Patiente::create([
                'prenom' => $request->prenom_patiente,
                'nom' => $request->nom_patiente,
                'telephone' => $request->telephone_patiente,
                'email' => $request->email_patiente ?? 'patiente_' . time() . '@medicare.com',
                'password' => Hash::make('medicare') // Mot de passe temporaire
            ]);
        } else {
            $patiente = Patiente::find($request->patiente_id);
        }

        $facture = Facture::create([
            'rendezvous_id' => $request->rendezvous_id,
            'patiente_id' => $patiente->id,
            'medecin_id' => $request->medecin_id,
            'montant' => $request->montant,
            'type_facture' => $request->type_facture,
            'statut' => $request->statut,
        ]);

        return redirect()->back()->with('success', 'Facture enregistrée avec succès.');
    }

    // 📌 Mettre à jour une facture
    public function update(Request $request, $id)
    {
        $facture = Facture::find($id);
        if (!$facture) {
            return redirect()->back()->withErrors(['error' => 'Facture introuvable.']);
        }

        $facture->update([
            'statut' => $request->statut,
            'methode_paiement' => $request->methode_paiement,
        ]);

        return redirect()->back()->with('success', 'Facture mise à jour.');
    }

    // 📌 Télécharger une facture en PDF
    public function download($id)
    {
        $facture = Facture::find($id);
        if (!$facture) {
            return redirect()->back()->withErrors(['error' => 'Facture introuvable.']);
        }

        $pdf = \PDF::loadView('pdf.facture', compact('facture'));
        return $pdf->download('Facture_' . $facture->id . '.pdf');
    }

    // 📌 Supprimer une facture
    public function destroy($id)
{
    $facture = Facture::find($id);

    if (!$facture) {
        return redirect()->back()->withErrors(['error' => 'Facture introuvable.']);
    }

    $facture->delete();

    return redirect()->back()->with('success', 'Facture supprimée avec succès.');
}

}

