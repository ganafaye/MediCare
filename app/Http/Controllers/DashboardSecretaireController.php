<?php

namespace App\Http\Controllers;
use App\Models\Patiente;
use App\Models\Medecin;
use Illuminate\Http\Request;
use App\Models\RendezVous;

class DashboardSecretaireController extends Controller
{
     public function index()
{
    $patientes = Patiente::all();
    $medecins = Medecin::all();
    $rendezvous = RendezVous::orderBy('date_heure', 'asc')->get();

    return view('espace_secretaire.dashboard_secretaire', compact('patientes', 'medecins', 'rendezvous'));
}

}
