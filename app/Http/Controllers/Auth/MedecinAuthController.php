<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MedecinAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $medecin = Medecin::where('email', $request->email)->first();

        if ($medecin && Hash::check($request->password, $medecin->password)) {
            Auth::guard('medecin')->login($medecin, true); // true pour "remember me"
            return redirect()->route('dashboard.medecin');
        } else {
            return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
        }
    }
}
