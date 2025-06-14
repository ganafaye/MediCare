<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\RendezVous;
use App\Models\Medecin;

class DashboardPatienteController extends Controller
{
    public function index()
    {
        $medecins = Medecin::all();
        $rendezvous = RendezVous::where('patiente_id', Auth::id())->get();
        return view('espace_patiente.dashboard_patiente' , compact('rendezvous' , 'medecins'));
    }
}
