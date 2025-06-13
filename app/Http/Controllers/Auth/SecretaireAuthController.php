<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Secretaire;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SecretaireAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $secretaire = Secretaire::where('email', $request->email)->first();

        if ($secretaire && Hash::check($request->password, $secretaire->password)) {
            Auth::guard('secretaire')->login($secretaire);
            return redirect()->route('dashboard.secretaire')->with('success', 'Connexion réussie !');
        } else {
            return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('secretaire')->logout();
        return redirect()->route('home')->with('success', 'Déconnexion réussie.');
    }
}
