<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use PDF;

class ConsultationController extends Controller
{
    // 📌 Voir toutes les consultations du médecin
    public function index()
    {
        $medecin = auth()->user();
        $consultations = Consultation::where('medecin_id', $medecin->id)->latest()->get();
        return view('dashboard_medecin', compact('medecin', 'consultations'));
    }

    // ➕ Créer une consultation
    public function store(Request $request)
    {
        $request->validate([
            'patiente_id' => 'required|exists:patientes,id',
            'date_consultation' => 'required|date',
            'heure_consultation' => 'required|date_format:H:i',
            'motif' => 'nullable|string',
            'diagnostic' => 'nullable|string',
            'prescription' => 'nullable|string',
            'poids' => 'nullable|numeric',
            'tension' => 'nullable|string',
            'nombre_grossesses' => 'nullable|integer',
            'antecedents' => 'nullable|string',
        ]);

        Consultation::create([
            'medecin_id' => auth()->guard('medecin')->user()->id,
            'patiente_id' => $request->patiente_id,
            'date_consultation' => $request->date_consultation,
            'heure_consultation' => $request->heure_consultation,
            'motif' => $request->motif,
            'diagnostic' => $request->diagnostic,
            'prescription' => $request->prescription,
            'poids' => $request->poids,
            'tension' => $request->tension,
            'nombre_grossesses' => $request->nombre_grossesses,
            'antecedents' => $request->antecedents,
        ]);

        return redirect()->back()->with('success', 'Consultation créée avec succès.');
    }

    // ✏️ Modifier une consultation
    public function update(Request $request, $id)
    {
        $consultation = Consultation::find($id);
        if (!$consultation) {
            return redirect()->back()->withErrors(['error' => 'Consultation introuvable.']);
        }

        $request->validate([
            'date_consultation' => 'required|date',
            'heure_consultation' => 'required|date_format:H:i',
            'motif' => 'nullable|string',
            'diagnostic' => 'nullable|string',
            'prescription' => 'nullable|string',
            'poids' => 'nullable|numeric',
            'tension' => 'nullable|string',
            'nombre_grossesses' => 'nullable|integer',
            'antecedents' => 'nullable|string',
        ]);

       $consultation->update([
    'date_consultation' => $request->date_consultation,
    'heure_consultation' => $request->heure_consultation,
    'motif' => $request->motif,
    'diagnostic' => $request->diagnostic,
    'prescription' => $request->prescription,
    'poids' => $request->poids,
    'tension' => $request->tension,
    'nombre_grossesses' => $request->nombre_grossesses,
    'antecedents' => $request->antecedents,
]);
        $consultation->save();

        return redirect()->back()->with('success', 'Consultation mise à jour avec succès.');
    }

    // ❌ Supprimer une consultation
    public function destroy($id)
    {
        $consultation = Consultation::find($id);
        if (!$consultation) {
            return redirect()->back()->withErrors(['error' => 'Consultation introuvable.']);
        }

        $consultation->delete();
        return redirect()->back()->with('success', 'Consultation supprimée avec succès.');
    }

    // 📄 Télécharger une consultation en PDF
    public function download($id)
    {
        $consultation = Consultation::find($id);
        if (!$consultation) {
            return redirect()->back()->withErrors(['error' => 'Consultation introuvable.']);
        }

        $pdf = PDF::loadView('pdf.consultation', compact('consultation'));
        return $pdf->download('Consultation_' . $consultation->id . '.pdf');
    }
}

