<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\DossierMedical;
use App\Models\Patiente;
class DossierMedicalController extends Controller
{
public function creerDossier(Request $request) {
    $request->validate([
        'patiente_id' => 'required|exists:patientes,id',
        'diagnostic' => 'required|string',
        'traitement' => 'nullable|string',
        'observations' => 'nullable|string',
        'grossesse' => 'required|string|in:oui,non', // ✅ Vérifie "oui" ou "non" au lieu de boolean
        'documents' => 'nullable',
    ]);

    DossierMedical::create([
        'patiente_id' => $request->patiente_id,
        'medecin_id' => auth()->guard('medecin')->user()->id,
        'diagnostic' => $request->diagnostic,
        'traitement' => $request->traitement,
        'observations' => $request->observations,
        'grossesse' => $request->grossesse === 'oui' ? 1 : 0, // ✅ Convertit "oui"/"non" en 1 ou 0
    ]);

      return redirect()->back()->with('success', 'Dossier médical créé avec succès.');
    }

public function update(Request $request, $id) {
    $request->validate([
        'diagnostic' => 'required|string',
        'traitement' => 'nullable|string',
        'observations' => 'nullable|string',
        'grossesse' => 'required|boolean',
    ]);

    $dossier = DossierMedical::findOrFail($id);
    $dossier->update([
        'diagnostic' => $request->diagnostic,
        'traitement' => $request->traitement,
        'observations' => $request->observations,
        'grossesse' => $request->grossesse, // ✅ Modifie l'état de grossesse
    ]);

    return redirect()->back()->with('success', 'Dossier médical mis à jour avec succès.');
}

public function delete($id) {
    DossierMedical::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Dossier médical supprimé avec succès.');
}

public function voirDossier($patienteId) {
    $dossier = DossierMedical::where('patiente_id', $patienteId)->latest()->first();

    if (!$dossier) {
        return redirect()->back()->with('error', 'Aucun dossier médical trouvé.');
    }

    return view('espace_patiente.dossier_medical', compact('dossier'));
}

}
