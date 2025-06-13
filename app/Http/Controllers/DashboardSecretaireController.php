<?php

namespace App\Http\Controllers;
use App\Models\Patiente;
use App\Models\Medecin;
use Illuminate\Http\Request;

class DashboardSecretaireController extends Controller
{
       public function index()
    {
        $patientes = Patiente::all();
        $medecins = Medecin::all();
        return view('espace_secretaire.dashboard_secretaire' , ['patientes' => $patientes], ['medecins' => $medecins]);
    }
}
