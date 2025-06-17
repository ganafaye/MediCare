<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordonnance;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class OrdonnanceController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'patiente_id' => 'required|exists:patientes,id',
        'contenu' => 'required|string',
        'date_prescription' => 'required|date',
    ]);

    Ordonnance::create([
         'medecin_id' => auth()->guard('medecin')->user()->id,
        'patiente_id' => $request->patiente_id,
        'contenu' => $request->contenu,
        'date_prescription' => $request->date_prescription,
    ]);

    return redirect()->back()->with('success', 'Ordonnance créée avec succès.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'contenu' => 'required|string',
        'date_prescription' => 'required|date',
    ]);

    $ordonnance = Ordonnance::findOrFail($id);
    $ordonnance->update([
        'contenu' => $request->contenu,
        'date_prescription' => $request->date_prescription,
    ]);

    return redirect()->back()->with('success', 'Ordonnance mise à jour.');
}

public function download($id)
{
    $ordonnance = Ordonnance::find($id);

    if (!$ordonnance) {
        return redirect()->back()->withErrors(['error' => 'Ordonnance introuvable.']);
    }

    // Générer le PDF de l'ordonnance
    $pdf = \PDF::loadView('pdf.ordonnance', compact('ordonnance'));

    return $pdf->download('Ordonnance_'.$ordonnance->id.'.pdf');
}


}
