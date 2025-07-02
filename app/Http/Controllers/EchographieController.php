<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Echographie;
use Illuminate\Support\Facades\Storage;

class EchographieController extends Controller
{
    /**
     * Stocker une échographie liée à une grossesse.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grossesse_id' => 'required|exists:grossesses,id',
            'titre'        => 'required|string|max:255',
            'date_examen'  => 'required|date|before_or_equal:today',
            'fichier'      => 'required|file|max:10240', // 10MB max
            'observation'  => 'nullable|string|max:2000',
        ]);

        // Sauvegarder le fichier dans le dossier "echographies"
        $path = $request->file('fichier')->store('echographies', 'public');

        // Créer l'enregistrement
        Echographie::create([
            'grossesse_id' => $validated['grossesse_id'],
            'titre'        => $validated['titre'],
            'date_examen'  => $validated['date_examen'],
            'fichier'      => $path,
            'observation'  => $validated['observation'],
        ]);

        return back()->with('success', 'Échographie envoyée avec succès.');
    }

    /**
     * Supprimer une échographie.
     */
    public function destroy(Echographie $echographie)
    {
        // Supprimer le fichier du stockage
        if (Storage::disk('public')->exists($echographie->fichier)) {
            Storage::disk('public')->delete($echographie->fichier);
        }

        $echographie->delete();

        return back()->with('success', 'Échographie supprimée avec succès.');
    }

    // Tu veux que je t’ajoute show() ou index() pour afficher les échographies liées à chaque grossesse ?
}
