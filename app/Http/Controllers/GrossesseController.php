<?php

namespace App\Http\Controllers;

use App\Models\Grossesse;
use App\Models\Patiente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GrossesseController extends Controller
{
    /**
     * Afficher la liste des grossesses
     */
    public function index()
    {
        $grossesses = Grossesse::with('patiente')->latest()->get();
        $patientes = Patiente::all();

        return view('espace_medecin.dashboard_medecin', compact('grossesses', 'patientes'));
    }

    /**
     * Stocker une nouvelle grossesse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patiente_id'     => 'required|exists:patientes,id',
            'date_debut'      => 'required|date',
            'date_terme'      => 'nullable|date|after_or_equal:date_debut',
            'notes_initiales' => 'nullable|string|max:1000',
        ]);

        $dpa = $validated['date_terme']
            ? Carbon::parse($validated['date_terme'])
            : Carbon::parse($validated['date_debut'])->addDays(280);

        Grossesse::create([
            'patiente_id' => $validated['patiente_id'],
            'date_debut'  => $validated['date_debut'],
            'dpa'         => $dpa,
            'notes'       => $validated['notes_initiales'],
        ]);

        return back()->with('success', 'Grossesse enregistrée avec succès.');
    }

    /**
     * Mettre à jour une grossesse existante
     */
   public function update(Request $request, Grossesse $grossesse)
{
    $validated = $request->validate([
        'date_debut'   => 'required|date',
        'date_terme'   => 'nullable|date|after_or_equal:date_debut',
        'notes'        => 'nullable|string|max:1000',
    ]);

    // Calculer une DPA si date_terme est absente
    $dateTerme = $validated['date_terme']
        ? Carbon::parse($validated['date_terme'])
        : Carbon::parse($validated['date_debut'])->addDays(280);

    $grossesse->update([
        'date_debut'     => $validated['date_debut'],
        'date_terme'     => $dateTerme,
        'notes_initiales'=> $validated['notes'],
    ]);

    return back()->with('success', 'Grossesse mise à jour avec succès.');
}

    /**
     * Supprimer une grossesse
     */
    public function destroy(Grossesse $grossesse)
    {
        $grossesse->delete();

        return back()->with('success', 'Grossesse supprimée.');
    }
}
