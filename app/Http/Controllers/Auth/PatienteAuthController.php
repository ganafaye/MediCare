<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patiente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PatienteAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $patiente = Patiente::where('email', $request->email)->first();

        if ($patiente && Hash::check($request->password, $patiente->password)) {
            Auth::guard('patiente')->login($patiente);
            return redirect()->route('dashboard.patiente');
        } else {
            return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
        }
    }
}
