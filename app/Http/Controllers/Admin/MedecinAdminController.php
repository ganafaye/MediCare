<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medecin;

class MedecinAdminController extends Controller
{
    public function store(Request $request)
    {
        Medecin::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'specialite' => $request->specialite,
            'password' => bcrypt($request->password),
        ]);
        return back()->with('success', 'Médecin créé avec succès !');
    }

    public function update(Request $request, $id)
    {
        $medecin = Medecin::findOrFail($id);
        $medecin->update($request->only(['nom','prenom', 'telephone', 'email', 'specialite']));
        return back()->with('success', 'Médecin modifié avec succès !');
    }

    public function destroy($id)
    {
        $medecin = Medecin::findOrFail($id);
        $medecin->delete();
        return back()->with('success', 'Médecin supprimé avec succès !');
    }
}
