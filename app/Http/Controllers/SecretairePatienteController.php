<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patiente;
use Illuminate\Support\Facades\Hash;

class SecretairePatienteController extends Controller
{
    public function index()
    {
        $patientes = Patiente::all(); // Récupère toutes les patientes
        $medecins = Medecin::all();
        return view('espace_secretaire.dashboard_secretaire', ['patientes' => $patientes] ,['medecins' => $medecins]);
    }

    public function store(Request $request)
    {

        Patiente::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'groupe_sanguin' => $request->groupe_sanguin,
            'profession' => $request->profession,
            'password' => Hash::make($request->password), // Cryptage du mot de passe
        ]);

        return back()->with('success', 'Compte patiente créé avec succès !');
    }

    public function update(Request $request, $id)
    {
        $patiente = Patiente::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'telephone' => 'required|string|max:20|unique:patientes,telephone,' . $id,
            'email' => 'required|email|unique:patientes,email,' . $id,
            'groupe_sanguin' => 'required|string|max:5',
            'profession' => 'required|string|max:100',
        ]);

        $patiente->update($request->all());

        return back()->with('success', 'Compte patiente mis à jour avec succès !');
    }

    public function destroy($id)
    {
        Patiente::findOrFail($id)->delete();
        return back()->with('success', 'Compte patiente supprimé avec succès !');
    }
}
