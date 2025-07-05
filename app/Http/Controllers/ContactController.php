<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function envoyer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Message::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', '✅ Votre message a bien été envoyé. Merci !');
    }
}
