<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patiente;
use Illuminate\Support\Facades\Hash;

class PatienteRegisterController extends Controller
{
    public function register(Request $request)
    {
       // dd($request->all()); // ← Ajoute ceci pour tester

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:patientes,email',
            'groupe_sanguin' => 'required|string|max:10',
            'profession' => 'required|string|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $patiente = Patiente::create([
            'admin_id' => 1, // Assurez-vous que l'ID de l'administrateur est correct
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'groupe_sanguin' => $request->groupe_sanguin,
            'profession' => $request->profession,
            'password' => Hash::make($request->password),
        ]);

        // Authentification manuelle (exemple simple)
        session(['patiente_id' => $patiente->id]);

       return redirect('/')
    ->with('inscription_success', 'Votre inscription a été validée ! Connectez-vous pour accéder à votre espace.');
    }
}
