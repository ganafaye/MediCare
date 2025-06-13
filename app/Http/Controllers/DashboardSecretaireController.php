<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSecretaireController extends Controller
{
       public function index()
    {
        return view('espace_secretaire.dashboard_secretaire');
    }
}
