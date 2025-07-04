<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Administrateur::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin, true);
            return redirect()->route('dashboard.admin');
        } else {
            return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
        }
    }

   public function update(Request $request)
{
    $admin = Auth::guard('admin')->user();

    $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|unique:administrateurs,email,' . $admin->id,
        'telephone' => 'nullable|string|max:20',
        'current_password' => 'nullable|string',
        'new_password' => 'nullable|string|min:8|confirmed',
    ]);

    // Mise à jour des infos de base
    $admin->update([
        'nom' => $request->nom,
        'email' => $request->email,
        'telephone' => $request->telephone,
    ]);

    // Si l'admin souhaite changer son mot de passe
    if ($request->filled('current_password') && $request->filled('new_password')) {
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.']);
        }

        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);
    }

    return redirect()->route('dashboard.admin')->with('success', 'Profil mis à jour avec succès.');
}


}
