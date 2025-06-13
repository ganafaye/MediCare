<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Secretaire;

class SecretaireAdminController extends Controller
{
    public function store(Request $request)
    {
        Secretaire::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return back()->with('success', 'Secrétaire créé avec succès !');
    }

    public function update(Request $request, $id)
    {
        $secretaire = Secretaire::findOrFail($id);
        $secretaire->update($request->only(['nom','prenom', 'telephone', 'email']));
        return back()->with('success', 'Secrétaire modifié avec succès !');
    }

    public function destroy($id)
    {
        $secretaire = Secretaire::findOrFail($id);
        $secretaire->delete();
        return back()->with('success', 'Secrétaire supprimé avec succès !');
    }
}
