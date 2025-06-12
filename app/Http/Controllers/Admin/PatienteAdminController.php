<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patiente;
use Illuminate\Support\Facades\Hash;

class PatienteAdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:patientes,email',
            'telephone' => 'required',
            'groupe_sanguin' => 'required',
            'profession' => 'required',
            'password' => 'required|min:6',
        ]);

        Patiente::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'groupe_sanguin' => $request->groupe_sanguin,
            'profession' => $request->profession,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Patiente créée avec succès !');
    }
    public function destroy($id)
    {
        $patiente = \App\Models\Patiente::findOrFail($id);
        $patiente->delete();

        return back()->with('success', 'Patiente supprimée avec succès !');
    }
    public function update(Request $request, $id)
    {
        $patiente = \App\Models\Patiente::findOrFail($id);
        $patiente->update($request->only([
            'nom', 'prenom', 'date_naissance', 'email', 'telephone', 'groupe_sanguin', 'profession'
        ]));
        return back()->with('success', 'Patiente modifiée avec succès !');
    }
}
