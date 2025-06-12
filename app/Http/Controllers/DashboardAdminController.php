<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $patientes = \App\Models\Patiente::all(); // récupère toutes les patientes
        $medecins = \App\Models\Medecin::all(); // <-- ajoute cette ligne
        return view('espace_admin.dashboard_admin', compact('patientes', 'medecins'));
    }
}
