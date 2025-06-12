<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPatienteController extends Controller
{
    public function index()
    {
        return view('espace_patiente.dashboard_patiente');
    }
}
