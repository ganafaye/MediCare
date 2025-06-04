<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patiente;

class PatienteAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $patiente = \App\Models\Patiente::where('email', $request->email)->first();

        if ($patiente && $request->password === $patiente->mot_de_passe) {
            // Authentification manuelle (par exemple, stocker l'ID en session)
            session(['patiente_id' => $patiente->id]);
            return redirect('/dashboard_patiente')->with('success', 'Connexion réussie');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
    }
}
