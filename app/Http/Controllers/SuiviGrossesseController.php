<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Grossesse;
use App\Models\Echographie;
class SuiviGrossesseController extends Controller
{
   public function index()
{
    $patiente = auth('patiente')->user();

    $grossesse = $patiente->grossesses()
        ->with('echographies')
        ->latest('date_debut')
        ->first();

        if (!$grossesse) {
        return redirect()->route('dashboard.patiente') // ou route précédente
            ->with('error', 'Aucun suivi de grossesse n’a encore été enregistré pour vous.');
    }

    $semaine = $grossesse
        ? \Carbon\Carbon::parse($grossesse->date_debut)->diffInWeeks(now())
        : null;

$echographies = $grossesse
    ? Echographie::where('grossesse_id', $grossesse->id)
        ->orderByDesc('date_examen')
        ->get()
    : collect();

    return view('espace_patiente.suivi_grossesse', compact('grossesse', 'semaine','patiente', 'echographies' ));

}

}
